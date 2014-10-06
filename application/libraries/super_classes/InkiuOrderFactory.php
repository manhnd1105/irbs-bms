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
            $status = self::map_db_has_id($info);
            if (!$status) {
                throw new \Exception('Error while updating in map_db');
            }
        } //If has no id => Create
        else {
            $status = self::map_db_has_no_id($info);
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
     * @return mixed
     */
    public function load_orders_info()
    {
        return $this->model_order->get_order();
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
}