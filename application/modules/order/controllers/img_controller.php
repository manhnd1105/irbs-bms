<?php

/**
 * Created by PhpStorm.
 * User: manh
 * Date: 11/1/14
 * Time: 3:05 AM
 */
class Img_controller extends Frontend_Controller
{
    /**
     * @var \super_classes\InkiuCommentFactory
     */
    private $comment_factory;
    /**
     * @var super_classes\InkiuOrderFactory
     */
    private $order_factory;

    /**
     * @var super_classes\InkiuEmailFactory
     */
    private $email_factory;

    /**
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->order_factory = \super_classes\InkiuOrderFactory::get_instance();
        $this->comment_factory = \super_classes\InkiuCommentFactory::get_instance();
        $this->email_factory = \super_classes\InkiuEmailFactory::get_instance();
        $this->load->module('template/template_controller');
    }

    /**
     * Display all image items in orders
     */
    public function index()
    {
        $info = $this->order_factory->load_order_imgs();
        $data['info'] = $info;
//        $data['module'] = 'order';
//        $data['controller'] = 'img_controller';
        $this->render('order', 'list_items', $data);
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
                //find email address of this order's creator
                //find order id associated with this file item id
                $order_id = $this->order_factory->find_order_id($post['img_id']);
                $creator = $this->order_factory->find_creator($order_id);
                //find creator name associated with found order id
                $req = new \super_classes\RestfulRequestMaker();
                $creator_id = $req->make_request('get', 'acc_id', array(
                    'acc_name' => $creator
                ));
                //query ams to find creator email
                $to = $req->make_request('get', 'account', array(
                    'id' => $creator_id
                ))['email'];

                //send email to inform users
                $from = $this->email_factory->load_inkiu_email_config('inkiutest@gmail.com');

                $message = 'Here is the link: ' . $post['file_changed_path'];
//                $cc = $_POST['cc'];
//                $bcc = $_POST['bcc'];
                $subject = "Your image id {$post['img_id']} is ready to download";
                if ($this->startsWith($message, 'http')) {
                    $msg = file_get_contents($message);
                    $mail_type = 'html';
                } else {
                    $msg = $message;
                    $mail_type = 'text';
                }

                $box_msg = array(
                    'from' => $from,
                    //test with data fixed
                    'to' => array(
                        'to' => $to
//                        'cc'  => $cc,
//                        'bcc' => $bcc,
                    ),
                    'subject' => $subject,
                    'message' => $msg,
                    'mail_type' => $mail_type
                );
                $status = $this->email_factory->send_email($box_msg);
                break;
        }
        $response = array(
            'reviewer' => $this->session->userdata('acc_name'),
            'time_commented' => date('Y-m-d H:i:s'),
            'content' => $post['content']
        );
        echo json_encode($response);
    }

    /**
     * @param $param
     * @param $start
     * @return bool
     */
    private function startsWith($param, $start)
    {
        return $start === "" || strpos($param, $start) === 0;
    }
}