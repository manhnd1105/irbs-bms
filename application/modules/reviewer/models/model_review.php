<?php


class Model_review extends CI_Model{

    /**
     * @var mixed
     */
    private static $db;


    /**
     * @construct
     */
    public function __construct(){
        parent::__construct();
        self::$db = &get_instance()->db;
    }

    public function read_file_details($where = NULL, $required_fields = '*', $return_type = 'all') {
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $this->db->select($required_fields);
        $this->db->from('file');
        $this->db->join('order_detail', 'file.id = order_detail.file_id');
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

    public function read_order($where = NULL, $required_fields = '*', $return_type = 'all')
    {
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $this->db->select($required_fields);
        $this->db->from('irbs.order');
        //$this->db->join('order_detail', 'irbs.order.id = order_detail.order_id');
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

    public function read_order_detail($where = NULL, $required_fields = '*', $return_type = 'all')
    {
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $this->db->select($required_fields);
        $this->db->from('irbs.order');
        $this->db->join('order_detail', 'irbs.order.id = order_detail.order_id');
        //$this->db->join('file', 'order_detail.file_id = file.id');
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
}