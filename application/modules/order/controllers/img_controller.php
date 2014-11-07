<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 11/1/14
 * Time: 3:05 AM
 */

class Img_controller extends Frontend_Controller {
    /**
     * @var \super_classes\InkiuCommentFactory
     */
    private $comment_factory;
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
        $this->comment_factory = \super_classes\InkiuCommentFactory::get_instance();
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
        $info = $this->order_factory->load_order_img($id);
        $data['description'] = $this->order_factory->load_order_info($info['order_id'])['description'];
        $data['action'] = 'order/img_controller/approve';
        $data['info'] = $info;
        $data['id'] = $id;
        $result = $this->comment_factory->load_comments($id);
        $comments = array();
        foreach ($result as $com) {
            //find reviewer's name
            $req = new \super_classes\RestfulRequestMaker();
            $acc = $req->make_request('get', 'account', array(
                'id' => $com['reviewer_id']
            ));
            $com['reviewer'] = $acc['account_name'];
            $comments[] = $com;
        }

        $data['comment'] = $comments;
        $this->render('order', 'approve', $data);
    }

//    public function approve()
//    {
//
//    }

    public function view_upload($id)
    {
        $info = $this->order_factory->load_order_img($id);
        $data['description'] = $this->order_factory->load_order_info($info['order_id'])['description'];
        $data['id'] = $id;
        $data['info'] = $info;
        $this->render('order', 'refine_upload', $data);
    }

    public function upload()
    {
        $post = $this->input->post();
        $status = $this->order_factory->update_img_path($post);
        echo $status;
    }

    public function create_comment()
    {
        $post = $this->input->post();
        $status = $this->comment_factory->create_comment($post);

        switch ($post['approve']) {
            case 'agree':
                $status = $this->order_factory->update_img_status($post['img_id'], '4');
                break;
            case 'disagree':
                $status = $this->order_factory->update_img_status($post['img_id'], '3');
                break;
            case 'finish':
                $status = $this->order_factory->update_img_status($post['img_id'], '5');
                break;
        }
        $response = array(
            'reviewer' => $this->session->userdata('acc_name'),
            'time_commented' => date('Y-m-d H:i:s'),
            'content' => $post['content']
        );
        echo json_encode($response);
    }
} 