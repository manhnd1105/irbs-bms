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
        $this->load->library('email');
    }

    /**
     * @param $box_msg
     */
    private function sender($box_msg)
    {

        //Email data
        $from = $box_msg['from'];
        $to = $box_msg['to'];
        $subject = $box_msg['subject'];
        $message = $box_msg['message'];
        $mail_type = $box_msg['mail_type'];

        // Email configuration
        $config = Array(
            'protocol'       => 'smtp',
            //'mailpath' => '/usr/sbin/sendmail',
            'smtp_host'      => 'ssl://smtp.googlemail.com',
            'smtp_user'      => $from['email'],
            'smtp_pass'      => $from['password'],
            'smtp_port'      => 465,
            'smtp_timeout'   => 5,
            'wordwrap'       => true,
            'wrapchars'      => 76,
            'mailtype'       => $mail_type,
            'charset'        => 'utf-8',
            'validate'       => false,
            'priority'       => 3,
            'crlf'           => "\r\n",
            'newline'        => "\r\n",
            'bcc_batch_mode' => false,
            'bcc_batch_size' => 200,
        );
        $this->email->initialize($config);

        $this->email->from($from['email'], $from['name']);
        $this->email->to($to['to']);
        $this->email->cc($to['cc']);
        $this->email->bcc($to['bcc']);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your email was sent.';
        } else {
            show_error($this->email->print_debugger());
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
    public function send_email()
    {
        //fix $message data
//        $message = '
//                Dear John,
//                This is test email message
//                Best regards,
//                Inkiu company
//            ';

        //$message = 'http://localhost/irbs-fms/index.php/order/order_controller/view_order_detail/4';
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
            'from'      => array(
                //fixed email
                'email'    => 'inkiutest@gmail.com',
                'password' => 'inkiu123456',
                //name => $_POST['name']
                'name'     => 'Inkiu Company Service'
            ),
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