<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package        CodeIgniter
 * @subpackage    Rest Server
 * @category    Controller
 * @author        Phil Sturgeon
 * @link        http://philsturgeon.co.uk/code/
 */

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require_once APPPATH . '/libraries/REST_Controller.php';

/**
 * Class Api_controller
 */
class Api_controller extends REST_Controller
{
    /**
     *
     */
    function __construct()
    {
        parent::__construct();
        //Load all super classes
        foreach (glob(APPPATH . "libraries/super_classes1/*.php") as $filename) {
            require_once($filename);
        }
        $this->load->model('account/Model_account');
        $this->load->model('account/Model_role');
    }

    /* 	public function send_post()
        {
            var_dump($this->request->body);
        }
        public function send_put()
        {
            var_dump($this->put('foo'));
        } */
    //Read all accounts information
    /**
     *
     */
    function accounts_get()
    {
        $accounts = Inkiu_account_factory::load_account();
        if ($accounts) {
            $this->response($accounts, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'Could not find any accounts!'), 404);
        }
    }

    /**
     *
     */
    function account_get()
    {
        $account_id = $this->get('id');
        if (!$account_id) {
            //Get an account with its id provided
            $account = Inkiu_account_factory::load_account($account_id);
            if ($account) {
                $this->response($account->get_props(), 400);
            } else {
                $this->response(array('error' => 'Accounts could not be found'), 404);
            }
        } else {
            //Get all accounts
            $accounts = Inkiu_account_factory::load_account();
            if ($accounts) {
                $accounts_info = array();
                foreach ($accounts as $account) {
                    $accounts_info[] = $account->get_props();
                }
                $this->response($accounts_info, 200);
            } else {
                $this->response(array('error' => 'Accounts could not be found'), 404);
            }

        }
    }
    //Update information of an account and respond with status/errors
    /**
     *
     */
    function account_post()
    {
        /*        $model_account = $this->Model_account;
                $account_id = $this->post('account_id');
                $account_name = $this->post('account_name');
                $staff_name = $this->post('staff_name');
                $password = $this->post('password');
                $address = $this->post('address');*/
        //$this->some_model->updateUser( $this->get('id') );
        $message = array(
            'id' => $this->get('id'),
            'name' => $this->post('name'),
            'email' => $this->post('email'),
            'message' => 'ADDED!');

        $this->response($message, 200); // 200 being the HTTP response code
    }
    //Create an account with provided information and respond with status/errors
    /**
     *
     */
    function account_put()
    {

    }
    //Delete an account with provided id and respond with status/errors
    /**
     *
     */
    function account_delete()
    {
        //$this->some_model->deletesomething( $this->get('id') );
        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');

        $this->response($message, 200); // 200 being the HTTP response code
    }
}