<?php

/**
 * Created by PhpStorm.
 * User: manh
 * Date: 10/22/14
 * Time: 9:22 PM
 */
class Detail_controller extends Frontend_Controller
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

    public function index()
    {
        //List orders
        $orders = $this->order_factory->load_orders_info();

        //List workers
        $request = new \super_classes\RestfulRequestMaker($this->config->item('ams_path') . '/api/api_controller/');
        $workers = $request->make_request(
            'get',
            'children',
            array(
                'acc_id' => '8'
            )
        );

        //Load view
        $data['orders'] = $orders;
        $data['workers'] = $workers;
        $data['module'] = 'order';
        $data['controller'] = 'detail_controller';
        $data['action'] = 'assign_worker';
        $this->render('order', 'assign_worker', $data);
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

    public function assign_worker()
    {
        //Get information from POST
        $post = $this->input->post();
        //Ask factory to perform assigning worker
        $status = $this->order_factory->assign_worker($post['order_id'], $post['acc_id']);

        //Response to request
        if ($status)
        {
            $message = array(
                'status' => $status,
                'message' => 'Assigned',
                'info' => $post
            );
            print_r($message);
        }
        else
        {
            $message = array(
                'status' => $status,
                'message' => 'Error',
                'info' => $post
            );
            print_r($message);
        }
    }
} 