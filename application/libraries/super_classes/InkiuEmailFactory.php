<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/22/2014
 * Time: 10:59 AM
 */
namespace super_classes;

class InkiuEmailFactory implements IEmail{

    /**
     * @var
     */
    private static $instance;


    /**
     * implements method get_instance
     * @return InkiuEmailFactory
     */
    public static function get_instance()
    {
        try {
            if (!self::$instance) {
                self::$instance = new InkiuEmailFactory();
            }

        } catch (\Exception $e) {
            echo 'error: ' . $e->getMessage();
        }

        return self::$instance;
    }

    /**
     * @var \Model_email
    */
    private $model_email;

    /***
     * @var \CI_Email
    */
    private $email;

    /**
     *
     */
    private function __construct()
    {
        $CI = &get_instance();
        $CI->load->model('email/Model_email');
        $this->model_email = $CI->Model_email;
        $this->email = $CI->load->library('email');
    }

    /**
     *
     */
    function __clone()
    {

    }

    /**
     * Load information email config by its email address
    */
    public function load_inkiu_email_config($email = null){
        if($email != null){
            $data = $this->model_email->read(array('email'=>$email),'*','one');
            return $data;
        }
        return $this->model_email->read();
    }

    /**
     * Save all changes to database
     */
    private function map_db(\InkiuEmail $inkiuEmail) {
        //Get properties of this object
        $info = $inkiuEmail->get_props();
        try
        {
            //If object has no id => Insert new record to database
            if ($info['id']== NULL || $info['id'] == '') {
                $inserted_id =  $this->model_email->insert($info);
                $status = $inserted_id > 0;
            }

            //If object has id => Update record to database
            else {
                $status = $this->model_email->modify($info);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return $status;
    }

    /**
     * Create new inkiu email config
     * @param $info
     * @return  boolean
     */
    public function create_inkiu_email($info) {
        try{
            $email_config = $this ->create_inkiu_email_obj($info);
            $status = $this->map_db($email_config);
        }catch (\Exception $e){
            echo $e->getMessage();
            return false;
        }
        return $status;
    }

    /**
     * @param $info
     * @return  \InkiuEmail - object
     */
    private function create_inkiu_email_obj($info) {
        $email_config = new \InkiuEmail();
        $email_config->setId($info);
        $email_config->setEmail($info);
        $email_config->setPassword($info);
        $email_config->setName($info);
        $email_config->setPermission($info);
        $email_config->setDescription($info);
        return $email_config;
    }

    /**
     *
     * @param $info
     * @return  boolean
     */
    public function update_inkiu_email($info) {
        try{
            //Update object by passed information
            $email_config = $this ->create_inkiu_email_obj($info);

            //Save changes to database
            $status = $this ->map_db($email_config);
        }catch(\Exception $e){
            echo $e->getMessage();
            return false;
        }
        return $status;
    }

    /**
     * @param $email
     * @return bool
     */
    public function delete_inkiu_email($email) {
        try {
            $status = $this->model_email->remove($email);
        } catch (\Exception $e) {
            log_message($e->getMessage());
            return false;
        }
        return $status;
    }


    /**
     * implements method send_email
     * @param $msg
     * @return bool
     */
    public function send_email($msg)
    {
        $from = $msg['from'];
        $to = $msg['to'];
        $subject = $msg['subject'];
        $message = $msg['message'];
        $mail_type = $msg['mail_type'];
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
            return true;
        } else {
            show_error($this->email->print_debugger());
            return false;
        }
    }

    /**
     * Get email address of an account on external system
     * @param $id
     */
    public function get_acc_email($id)
    {
        //Initialize a request to default account server
        $req = new RestfulRequestMaker();

        //Return result
        return $req->make_request('get', 'account', array(
            'id' => $id
        ))['email'];
    }

    /**
     * Get all email addresses of all accounts on external system
     */
    public function get_acc_emails()
    {
        //Initialize a request to default account server
        $req = new RestfulRequestMaker();

        //Return result
        $accs = $req->make_request('get', 'accounts');
        $emails = array();
        foreach ($accs as $row) {
            $emails[] = $row['email'];
        }
        return $emails;
    }

}
