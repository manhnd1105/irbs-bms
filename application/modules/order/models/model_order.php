<?php

/**
 * Class Model_order
 */
class Model_order
{
    /**
     * Just to implement Singleton
     * @var mixed
     */
    private $db;

    /**
     * Construct function
     */
    function __construct()
    {
        $this->db = & get_instance()->db;
    }

    /**
     * Get order information from database
     * @param null $where
     * Type: array
     *        Desc: content of WHERE statement in query
     *        Example: $where = array('Name' => 'manhnd')
     *        Default: NULL (query has no where statement)
     * @param string $required_fields
     * Type: string
     *        Desc: Table columns that you want to select in query
     *        Example: $required_fields = 'RoleName, RoleDescription'
     *    Default: '*' to select all columns
     * @param string $return_type
     *     *        Type: string
     *        Desc: number of rows that you want to take in query
     *        Example: $return_type = 'one'
     *        Values:
     *            'all': select all rows in result
     *            'one': select one row in result (first row)
     *        Default: 'all'
     * @return mixed
     */
    public function get_order($where = NULL, $required_fields = '*', $return_type = 'all')
    {
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $this->db->select($required_fields);
        $this->db->from('irbs.order');
        $this->db->join('irbs.inkiu_order', 'order.id = inkiu_order.id');
        $result = array();
        switch ($return_type) {
            case 'all':
                $result = $this->db->get()->result_array();
                break;
            case 'one':
                $result = $this->db->get()->row_array();
        }
        return $result;
    }

    public function read_multi_tables(
        $tables,
        $where = null,
        $required_fields = '*',
        $return_type = 'all'
    ) {
        if ($where !== null) {
            foreach ($where as $row) {
                $this->db->where($row);
            }
        }
        $this->db->select($required_fields);
        $this->db->from($tables);
        $result = array();
        switch ($return_type) {
            case 'all':
                $result = $this->db->get()->result_array();
                break;
            case 'one':
                $result = $this->db->get()->row_array();
        }
        return $result;
    }
    /**
     * Insert new record
     * @param $info
     * @return mixed
     * @throws Exception
     */
    public function insert_order($info)
    {
        try
        {
            $this->db->trans_start();
            //Insert into primary table
            $order_data = new order_table($info);
            $this->db->insert('irbs.order', $order_data);

            //Get inserted id and then insert into other joined tables
            $id = $this->db->insert_id();
            $info['id'] = $id;
            $inkiu_order_data = new inkiu_order_table($info);
            $this->db->insert('irbs.inkiu_order', $inkiu_order_data);

            //Insert into order_detail table
            foreach ($info['img_links'] as $row) {
                $this->db->insert('irbs.order_detail', array(
                    'order_id' => $id,
                    'status_id' => '1',
                    'file_path' => $row
                ));
            }
            $this->db->trans_complete();
        } catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
        return $id;
    }

    /**
     * Edit existing record
     * @param $info
     * @return bool
     * @throws Exception
     */
    public function edit_order($info)
    {
        try
        {
            //Parse data from passed information
            $order_data = new order_table($info);
            $inkiu_order_data = new inkiu_order_table($info);

            //Update two tables
            $this->db->trans_start();
            $this->db->update('irbs.order', $order_data, array('order.id' => $info['id']));
            $this->db->update('irbs.inkiu_order', $inkiu_order_data, array('inkiu_order.id' => $info['id']));
            $this->db->trans_complete();
        } catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
        return true;

    }


    /**
     * Delete a record
     * @param $id
     * @return bool
     * @throws Exception
     */
    public function delete_order($id)
    {
        try
        {
            $this->db->trans_start();
            $this->db->delete('irbs.inkiu_order', array('inkiu_order.id' => $id));
            $this->db->delete('irbs.order', array('order.id' => $id));
            $this->db->delete('irbs.order_detail', array('order_detail.order_id' => $id));
            $this->db->trans_complete();
        } catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
        return true;
    }

    /**
     * Delete some records or all records
     * @param null $ids
     * @return bool
     * @throws Exception
     */
    public function delete_orders($ids = NULL)
    {
        try
        {
            $this->db->trans_start();
            //If has no id => delete all records
            if ($ids == NULL)
            {
                $this->db->delete('irbs.inkiu_order');
                $this->db->delete('irbs.order');
            }
            //If has some ids => delete each id
            else
            {
                foreach ($ids as $id)
                {
                    self::delete_order($id);
                }
            }
            $this->db->trans_complete();
        } catch (Exception $e)
        {
            throw new Exception($e->getMessage());
        }
        return true;
    }

    /**
     * @param $info
     * @return array
     */
    public function filter($info)
    {
        try {
            if (isset($info['id']) && $info['id'] !== "") {
                $this->db->where(array('order.id' => $info['id']));
            }
            if (isset($info['desc']) && $info['desc'] !== "") {
                $this->db->where('desc', $info['desc']);
            }
            if (isset($info['creation_date']) && $info['creation_date'] !== "") {
                $this->db->where('creation_date', $info['creation_date']);
            }
            if (isset($info['creator']) && $info['creator'] !== "") {
                $this->db->where('creator', $info['creator']);
            }
            $this->db->select('*');
            $this->db->from('irbs.order');
            $this->db->join('irbs.inkiu_order', 'order.id = inkiu_order.id');
            $result = $this->db->get()->result_array();
        } catch (Exception $e) {
            \super_classes\IrbsException::write_log('error', $e);
            return false;
        }
        return $result;
    }

    /**
     * Assign worker to selected order
     * @param $order_id
     * @param $acc_id
     * @return bool
     */
    public function assign_worker($order_id, $acc_id)
    {
        try {
            //Insert into table order_component_worker
            $this->db->insert(
                'order_component_worker',
                array(
                    'order_id' => $order_id,
                    'acc_id' => $acc_id
            ));
        } catch (Exception $e) {
            \super_classes\IrbsException::write_log('error', $e);
            return false;
        }
        return true;
    }

    public function get_joined_tables(
        $where = null,
        $required_fields = '*',
        $return_type = 'all',
        $tables
    ) {
        if ($where !== null) {
            foreach ($where as $row) {
                $this->db->where($row);
            }
        }
        $this->db->select($required_fields);
        $this->db->from($tables);
        $result = array();
        switch ($return_type) {
            case 'all':
                $result = $this->db->get()->result_array();
                break;
            case 'one':
                $result = $this->db->get()->row_array();
        }
        return $result;
    }

    public function update_img_path($id, $file_changed_path)
    {
        return $this->db->update(
            'irbs.order_detail',
            array(
                'file_changed_path' => $file_changed_path,
                'status_id' => '3'
            ),
            array('id' => $id)
        );
    }

    public function update_img_status($id, $status_id)
    {
        return $this->db->update(
            'irbs.order_detail',
            array(
                'status_id' => $status_id
            ),
            array('id' => $id)
        );
    }

    public function find_order_id($file_id)
    {
        $sql = "SELECT order_id FROM irbs.order_detail WHERE id={$file_id}";
        return $this->db->query($sql)->row_array()['order_id'];
    }

    public function find_creator($order_id)
    {
        $sql = "SELECT creator FROM irbs.inkiu_order WHERE id={$order_id}";
        return $this->db->query($sql)->row_array()['creator'];
    }
}

/**
 * Class inkiu_order_table
 */
class inkiu_order_table
{
    /**
     * @var
     */
    var $id;
    /**
     * @var
     */
    var $creator;

    /**
     * @param $info
     */
    function __construct($info)
    {
        $this->id = $info['id'];
        $this->creator = $info['creator'];
    }
}

/**
 * Class order_table
 */
class order_table
{
    /**
     * @var
     */
    var $description;
    /**
     * @var
     */
    var $creation_date;

    /**
     * @param $info
     */
    function __construct($info)
    {
        $this->description = $info['description'];
        $this->creation_date = $info['creation_date'];
    }
}