<?php
namespace super_classes;

/**
 * Class InkiuOrderFactory
 * @package super_classes
 */
class InkiuOrderFactory implements ISingleton
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @var \Model_order;
     */
    private $model_order;

    /**
     * Private constructor so nobody else can instance it
     *
     */
    private function __construct()
    {
        $CI = &get_instance();
        $CI->load->model('order/Model_order');

        $this->model_order = $CI->Model_order;
    }

    /**
     * Call this method to get singleton
     *
     * @return InkiuOrderFactory
     */
    public static function get_instance()
    {
        try {
            if (!self::$instance) {
                self::$instance = new InkiuOrderFactory();
            }
            return self::$instance;

        } catch (\Exception $e) {
            echo 'error: ' . $e->getMessage();
        }
    }

    /**
     * @param $info
     * @return bool
     */
    public function update_order($info)
    {
        //Do the same steps as create_oder()
        return $this->create_order($info);
    }

    /**
     * @param $info
     * @return bool
     */
    public function create_order($info)
    {
        //Create an object with above information
        $order = $this->create_order_obj($info);

        //Save changes to database
        return $this->map_db($order);
    }

    /**
     * Create InkiuOrder object with passed information
     * @param $info
     * @return InkiuOrder
     */
    public function create_order_obj($info)
    {
        //Create new obj and fill its properties
        $order = new InkiuOrder();
        $order->set_description($info);
        $order->set_creation_date($info);
        $order->set_creator($info);
        $order->set_id($info);

        if (isset($info['img_links'])) {
            $order->set_img_links(json_decode($info['img_links']));
        }
        //Setup its components
        /* 		$component_image = Order_component_image_factory::create_component_image($info);
                $component_feedback = Order_component_feedback_factory::create_component_feedback($info);
                $component_level = Order_component_level_factory::create_component_level($info);
                $component_status = Order_component_status_factory::create_component_status($info);

                $inkiu_order->add_component($component_image);
                $inkiu_order->add_component($component_feedback);
                $inkiu_order->add_component($component_level);
                $inkiu_order->add_component($component_status); */
        return $order;
    }

    /**
     * Map all changes of order instance to database
     * @param InkiuOrder $obj
     * @return bool
     * @throws \Exception
     */
    public function map_db($obj)
    {
        //Collect information of that object
        $id = $obj->get_id();
        $info = $obj->get_props();

        //If has id => Update
        if ($id) {
            $status = $this->map_db_has_id($info);
            if (!$status) {
                throw new \Exception('Error while updating in map_db');
            }
        } //If has no id => Create
        else {
            $status = $this->map_db_has_no_id($info);
            if (!$status) {
                throw new \Exception('Error while creating in map_db');
            }
        }
        return true;
    }

    /**
     * @param $info
     * @return bool
     */
    private function map_db_has_id($info)
    {
        return $this->model_order->edit_order($info);
    }

    /**
     * @param $info
     * @return mixed
     */
    private function map_db_has_no_id($info)
    {
        return $this->model_order->insert_order($info);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete_order($id)
    {
        return $this->model_order->delete_order($id);
    }

    /**
     * @param $ids
     * @return bool
     */
    public function delete_orders($ids)
    {
        return $this->model_order->delete_orders($ids);
    }

    /**
     * @return mixed
     */
    public function load_orders()
    {
        $orders = $this->load_orders_info();
        $result = array();
        foreach ($orders as $row) {
            $result[] = $this->create_order_obj($row);
        }
        return $result;
    }

    /**
     * @param bool $load_detail
     * @return mixed
     */
    public function load_orders_info($load_detail = false)
    {
            $tables = 'irbs.order AS t1, irbs.inkiu_order AS t2';
            $where = array(
                't1.id = t2.id'
            );
        if ($load_detail === true) {
            $tables .= ', irbs.order_detail AS t3';
            $where[] = 't2.id = t3.order_id';
        }
//        return $this->model_order->get_order();
        return $this->model_order->read_multi_tables($tables, $where);
    }

    /**
     * @param null $id
     * @return array
     */
    public function load_order_imgs($id = null)
    {
        $where = array(
//            't1.id = t2.order_id',
            't2.status_id = t3.id'
        );
        $return_type = 'all';
        if ($id !== null) {
            $where[] = "t2.id = {$id}";
            $return_type = 'one';
        }
        return $this->model_order->get_joined_tables(
            $where,
            't2.file_path, t3.name, t2.id, t2.file_changed_path',
            $return_type,
            'irbs.order_detail AS t2, irbs.order_component_status AS t3'
        );
    }

    public function load_order_img($id)
    {
        return $this->model_order->get_joined_tables(
            array(
                't2.status_id = t3.id',
                "t2.id = {$id}"
            ),
            '*',
            'one',
            'irbs.order_detail AS t2, irbs.order_component_status AS t3'
        );
    }
    public function get_img_links($order_id)
    {
        $rows = $this->model_order->get_joined_tables(
            array(
                "t3.order_id = {$order_id}"
            ),
            '*',
            'all',
            'irbs.order_detail AS t3'
        );
        $links = array();
        foreach ($rows as $row) {
            $links[] = $row['file_path'];
        }
        return $links;
    }

    public function load_order_info($order_id)
    {
        return $this->model_order->read_multi_tables(
            'irbs.order AS t1, irbs.order_detail AS t3, irbs.inkiu_order AS t2',
            array(
                't1.id = t2.id',
                't2.id = t3.order_id',
                "t1.id = {$order_id}"
            ),
            '*',
            'one'
        );
    }

    public function add_progress($info)
    {
        $result = array();
        foreach ($info as $row) {
            //Get quantity of total images of this order
            $img = $this->model_order->get_joined_tables(
                array(
                    "t1.order_id = {$row['id']}"
                ),
                '*',
                'all',
                'irbs.order_detail AS t1'
            );

            //Get quantity of done images of this order
            $done_img = $this->model_order->get_joined_tables(
                array(
                    't1.status_id = t2.id',
                    't2.name = "done"',
                    "t1.order_id = {$row['id']}"
                ),
                '*',
                'all',
                'irbs.order_detail AS t1, irbs.order_component_status AS t2'
            );

            //Calculate the progress percentage
            $done = count($done_img);
            $total = count($img);
            if ($done == 0 || $total == 0) {
                $row['progress'] = '0%';
            } else {
                $row['progress'] = (count($done_img) / count($img)). '%';
            }
            $result[] = $row;
        }
        return $result;
    }

    public function update_img_path($info)
    {
        return $this->model_order->update_img_path($info['id'], $info['file_changed_path']);
    }

    public function update_img_status($id, $status_id)
    {
        return $this->model_order->update_img_status($id, $status_id);
    }
    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * @param $info
     * @return array
     */
    public function filter($info)
    {
        return $this->model_order->filter($info);
    }

    /**
     * Assign a worker to handle an order
     * @param $order_id
     * @param $acc_id
     * @return bool
     */
    public function assign_worker($order_id, $acc_id)
    {
        return $this->model_order->assign_worker($order_id, $acc_id);
    }

    /**
     * Get information of all orders created by an account (customer)
     * @param $acc_id
     * @return array
     */
    public function load_acc_orders_info($acc_id)
    {
        return $this->model_order->get_order(
            array(
                'creator_id' => $acc_id
            )
        );
    }
}