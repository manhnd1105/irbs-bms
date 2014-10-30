<?php

/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/16/2014
 * Time: 9:42 AM
 */
class Email_controller extends Frontend_Controller
{

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
        $this->email_factory = \super_classes\InkiuEmailFactory::get_instance();
        $this->load->module('template/template_controller');
    }

    /**
     * @param $box_msg
     */
    private function sender($box_msg)
    {
        $status = $this->email_factory->send_email($box_msg);
        if($status){
            echo 'your email was sent !';
        }
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

    /**
     * @param $param
     * @param $end
     * @return bool
     */
    private function endsWith($param, $end)
    {
        return $end === "" || substr($param, - strlen($end)) === $end;
    }

    /**
     *
     */
    public function view_email()
    {
        $data['controller'] = 'email_controller';
        $data['action'] = 'send_email';
        $data['module'] = 'email';
        $this->template_controller->demo_template('email', '/email', $data);
    }

    /**
     *
     */
    public function view_config()
    {
        $data['controller'] = 'email_controller';
        $data['action'] = 'send_email';
        $data['module'] = 'email';
        $this->template_controller->demo_template('email', '/config', $data);
    }

    /**
     *
     */
    public function send_email()
    {
        //fix $message html data
        //$message = 'http://localhost/irbs-fms/index.php/order/order_controller/view_order_detail/4';
        //fix inkiu email for test function send_email
        $from = $this->email_factory->load_inkiu_email_config('inkiutest@gmail.com');

        $message = $_POST['message'];
        $to = $_POST['to'];
        $cc = $_POST['cc'];
        $bcc = $_POST['bcc'];
        $subject = $_POST['subject'];
        if ($this->startsWith($message, 'http')) {
            $msg = file_get_contents($message);
            $mail_type = 'html';
        } else {
            $msg = $message;
            $mail_type = 'text';
        }

        $box_msg = array(
            'from'      => $from,
            //test with data fixed
            'to'        => array(
                'to'  => $to,
                'cc'  => $cc,
                'bcc' => $bcc,
            ),
            'subject'   => $subject,
            'message'   => $msg,
            'mail_type' => $mail_type
        );
        //var_dump($from);
        $this->sender($box_msg);
    }

    /**
     * Get email address of an account on external system
     */
    public function get_email()
    {
        var_dump($this->email_factory->get_acc_emails());
    }

}