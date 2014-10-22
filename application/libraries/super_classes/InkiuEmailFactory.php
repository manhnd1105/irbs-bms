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


    private function __construct()
    {
        $CI = &get_instance();
        $CI->load->model('order/Model_email');
        $this->model_email = $CI->Model_email;

    }

    function __clone()
    {

    }

    /**
     * Load information email config by its email address
    */
    public function load_email_config($email = null){
        if($email != null){
            $data = $this->model_email->read(array('email'=>$email));
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
     * @return InkiuEmailFactory
     */
    public static function send_email($msg)
    {

    }



}
