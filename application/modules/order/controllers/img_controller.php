<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 11/1/14
 * Time: 3:05 AM
 */

class Img_controller extends Frontend_Controller {

    /**
     * @var super_classes\InkiuOrderFactory
     */
    private $order_factory;

    /**
     *
     */
    function __construct() {
        parent::__construct();
        $this->order_factory = \super_classes\InkiuOrderFactory::get_instance();
        $this->load->module('template/template_controller');
    }

    /**
     * @param      $module
     * @param      $method
     * @param null $data
     */
    private function render($module, $method, $data = null)
    {
        $this->template_controller->demo_template($module, $method, $data);
    }

    /**
     * Display all image items in orders
     */
    public function index() {
        $info = $this->order_factory->load_order_imgs();
        $data['info'] = $info;
//        $data['module'] = 'order';
//        $data['controller'] = 'img_controller';
        $this->render('order', 'list_items', $data);
    }

    /**
     * @param int $id Image item id
     */
    public function view_approve($id)
    {
        $info = $this->order_factory->load_order_imgs($id);
        $data['action'] = 'order/img_controller/approve';
        $data['info'] = $info;
        $this->render('order', 'approve', $data);
    }

    public function approve()
    {

    }
} 