<?php

class Review_controller extends Frontend_Controller{

    private $rev_factory;

    /**
     *
     */
    public function __construct() {
        parent::__construct();
        $this->rev_factory = \super_classes\ReviewFactory::get_instance();

        $this->load->module('template/template_controller');
    }

    public  function  view_order(){
        $orders = $this->rev_factory->load_order();
        $data['orders'] = $orders;
//      $this->load->module('template/template_controller');
        $this->template_controller->demo_template('reviewer', 'orders', $data);
    }

    public  function  view_order_detail($order_id){
        $order_detail = $this->rev_factory->load_order($order_id);
        $data['order'] = $order_detail;
        $data['order_id'] = $order_id;
//        $this->load->module('template/template_controller');
        $this->template_controller->demo_template('reviewer', '/order_detail', $data);
    }

    public function image_detail($image_id){
        $data['image'] = $this->rev_factory->load_file_detail($image_id);
        $data['image_id'] = $image_id;
        $this->render('reviewer', '/image_detail', $data);
    }

    /**
     * @param $controller
     * @param $method
     * @param $data
     */
    private function render($controller, $method, $data) {
        $this->template_controller->demo_template($controller, $method, $data);
    }
}
