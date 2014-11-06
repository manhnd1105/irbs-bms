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
//       print_r(json_decode($post['img_links']));
 		//Ask factory to create obj
        $status = $this->order_factory->create_order($post);

        print($status);
    }

//create view upload
    public function view_upload()
    {
        $post = $this->input->post();
        if (isset($post['desc'])) {
            $data['desc'] = $post['desc'];
        }
        $data['creator'] = $this->session->userdata('acc_name');

        $this->template_controller->demo_template('order', '/upload', $data);
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
        $status = $this->order_factory->delete_order($order_id);
        $this->index();
    }

    /**
     *
     */
    public function view_create()
    {
        //Ask view to render data
        $data['controller'] = 'order_controller';
        $data['action'] = 'view_upload';
        $data['module'] = 'order';

        $this->render('order', '/order_create', $data);
    }

    /**
     * @param      $module
     * @param      $method
     * @param null $data
     */
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
        $info = $this->order_factory->load_order_info($order_id);

        //Load view with above data
        $data['order_info'] = $info;
        $data['controller'] = 'order_controller';
        $data['action'] = 'create';
        $data['module'] = 'order';

        $this->render('order', '/order_update', $data);
    }

    /**
     * Do prepare data for order list based on certain conditions
     * Called by ajax from index view
     */
    public function filter()
    {
        //Get information from POST
        $post = $this->input->post();

        //Filter orders of customers managed by a logged manager
        //Check whether a manager has authorized
        $acc_name = $this->session->userdata('acc_name');
        if ($acc_name !== false) {
            //Check manager role in external system
            $req = new \super_classes\RestfulRequestMaker();
            $role_id = $req->make_request('get', 'role_id', array(
                'role_name' => 'manager'
            ));
            if (!$role_id)
            {
                throw new Exception('Role name is not valid');
            }

            //Get id of this account
            $acc_id = $req->make_request('get', 'acc_id', array(
                'acc_name' => $acc_name
            ));
            if (!$acc_id) {
                throw new Exception('Cannot retrieve account id');
            }

            //Check whether this authenticated account has role of manager
            $result = $req->make_request('get', 'check_role', array(
                'acc_id' => $acc_id,
                'role_id' => $role_id
            ));
            //If is manager => do list all orders created by customers managed by this manager
            if ($result) {
                //List all customers managed by this manager
                $cuss = $req->make_request('get', 'children', array(
                    'id' => $acc_id
                ));
                if (!$cuss) {
                    throw new Exception('Cannot retrieve customers managed by this manager');
                }

                //List all orders created by those customers
                $info = array();
                foreach ($cuss as $cus) {
                    $info[] = $this->order_factory->load_acc_orders_info($cus['id']);
                }
            }
            //If is not manager => list all orders or filtered orders
            else {
                //Ask factory to perform filter data
                //If has info from POST => Load filtered data
                if ($post !== null) {
                    $info = $this->order_factory->filter($post);
                } //If has no info from POST => Load all orders data
                else {
                    $info = $this->order_factory->load_orders_info();
                }
            }
        }
        else {
            throw new Exception('You are not logged in');
        }

        //Transform data to html format for displaying as a partial view
        $html = $this->convert_grid_html($info);

        //Return filtered information to view
        print($html);
    }

    /**
     * Convert orders information into html table format
     * @param $info
     * @return string
     */
    private function convert_grid_html($info){
        $html = '';
        if (is_array($info)) {
            foreach ($info as $row) {
                $html .= '<tr>';
                $html .= '<td >' . $row['id'] . '</td>';
                $html .= '<td >' . $row['description'] . '</td>';
                $html .= '<td>' . $row['creation_date'] . '</td>';
                $html .= '<td>' . $row['creator'] . '</td>';
                $html .= '<td>' . anchor('order/order_controller/view_create', 'Create');
                $html .= anchor('order/order_controller/view_update/' . $row['id'], 'Edit');
                $html .= anchor('order/order_controller/delete/' . $row['id'], 'Remove') . '</td>';
                $html .= '</tr>';
            }
        }
        return $html;
    }

    /**
     *
     */
    public function view_progress()
    {
        $this->render('order', '/order_progress');
    }

    /**
     *
     */
    public function view_payment()
    {
        $this->render('order', '/payment');
    }

    /**
     *
     */
    public function view_add_payment()
    {
        $this->render('order', '/add_payment');
    }

    /**
     *
     */
    public function view_crud_custom()
    {
        $this->template_controller->demo_template('order', '/order_crud_custom_view');
    }

    /**
     *
     */
    public function view_order_tracking()
    {
        $this->template_controller->demo_template('order', '/order_tracking');
    }



}
