<?php

/**
 * Class Order_controller
 * @property super_classes\InkiuOrderFactory order_factory
 * @property Template_controller template_controller
 */
class Order_controller extends Frontend_Controller
{

    /**
     * @var super_classes\InkiuOrderFactory
     */
    private $order_factory;

    /**
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->order_factory = \super_classes\InkiuOrderFactory::get_instance();
        $this->load->module('template/template_controller');
    }

    /**
     *
     */
    public function create()
    {
        $post = $this->input->post();

 		//Ask factory to create obj
        $status = $this->order_factory->create_order($post);
    }

    /**
     *
     */
    public function update()
    {
        //Get information from POST
        $post = $this->input->post();

 		//Ask factory to load obj
        $status = $this->order_factory->load_orders($post['order_id']);

        $this->index();
    }

    /**
     * @param $order_id
     */
    public function delete($order_id)
    {
        //Ask factory to perform delete orders
        $status = $this->order_factory->remove_orders($order_id);
        $this->index();
    }

    /**
     *
     */
    public function view_create()
    {
        //Ask view to render data
        $data['controller'] = 'order_controller';
        $data['action'] = 'create';
        $data['module'] = 'order';

        $this->render('order', '/order_create', $data);
    }

    private function render($module, $method, $data = NULL)
    {
        $this->template_controller->demo_template($module, $method, $data);
    }

    /**
     *
     */
    public function index()
    {
 		//Get all orders information for displaying
        $info = $this->order_factory->load_orders_info();

        //Ask view to render with obtained data
        $data['info'] = $info;
        $this->render('order', '/index', $data);
    }

    /**
     * @param $order_id
     */
    public function view_update($order_id)
    {
        //Get all saved information according to this account id
        $info = $this->order_factory->load_orders_info($order_id);

        //Load view with above data
        $data['order_info'] = $info;
        $data['controller'] = 'order_controller';
        $data['action'] = 'create';
        $data['module'] = 'order';

        $this->render('order', '/order_update', $data);
    }

    public function view_progress()
    {
        $this->render('order', '/order_progress');
    }

    public function view_payment()
    {
        $this->render('order', '/payment');
    }

    public function view_add_payment()
    {
        $this->render('order', '/add_payment');
    }

    public function view_crud_custom()
    {
        $this->template_controller->demo_template('order', '/order_crud_custom_view');
    }

    public function view_order_tracking()
    {
        $this->template_controller->demo_template('order', '/order_tracking');
    }



}
