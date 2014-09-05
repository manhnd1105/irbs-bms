<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require_once APPPATH . '/libraries/REST_Controller.php';

/**
 * Class Api_controller
 */
class Api_controller extends REST_Controller
{
    /**
     * @var super_classes\InkiuAccountFactory
     */
    private $account_factory;

    /**
     * @var super_classes\RestrictAccessFactory
     */
    private $restrict_factory;

    /**
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->account_factory = \super_classes\InkiuAccountFactory::get_instance();
        $this->restrict_factory = \super_classes\RestrictAccessFactory::get_instance();
    }

    /**
     * Return information of all accounts
     */
    function accounts_get()
    {
        $info = $this->account_factory->load_accounts_info();
        if ($info) {
            $this->response($info, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'Could not find any accounts!'), 404);
        }
    }

    /**
     * Return information of an account
     */
    function account_get()
    {
        $id = $this->get('id');
        $info = $this->account_factory->load_accounts_info($id);
        if ($info) {
            $this->response($info, 400);
        } else {
            $this->response(array('error' => 'Account could not be found'), 404);
        }
    }

    /**
     * Update information of an account and respond with status/errors
     */
    function account_post()
    {
        $info = $this->post();
        $status = $this->account_factory->update_account($info);
        if ($status) {
            $this->response(array('success' => 'Account created'), 200);
        } else {
            $this->response(array('error' => 'Account could not be created'), 404);
        }
    }

    /**
     * Create an account with provided information and respond with status/errors
     */
    function account_put()
    {
        $info = $this->put();
        $status = $this->account_factory->create_account($info);
        if ($status) {
            $this->response(array('success' => 'Account created'), 200);
        } else {
            $this->response(array('error' => 'Account could not be created'), 404);
        }
    }

    /**
     * Delete an account with provided id and respond with status/errors
     */
    function account_delete()
    {
        $id = $this->delete('id');
        $status = $this->account_factory->remove_account($id);
        if ($status) {
            $message = array('id' => $id, 'message' => 'DELETED!');
            $this->response($message, 200);
        } else {
            $this->response(array('error' => 'Can not delete this account'), 404);
        }

    }

    /**
     * Get account validation result
     */
    function validation_get()
    {
        //Get information from GET method of Restful standard
        $info = $this->get();

        //Ask factory to validate account information
        $status = $this->account_factory->validate($info['acc_name'], $info['password']);

        //Send response to client according to validating result
        if ($status) {
            $message = array(
                'status' => 'account credentials are correct'
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'status' => 'account credentials are incorrect'
            );
            $this->response($message, 404);
        }
    }


    function check_permission_get()
    {
        //Get information from GET method of Restful standard
        $info = $this->get();

        //Ask factory to check whether this account be allowed to do this action (permission)
        $status = $this->restrict_factory->check_access($info['acc_id'], $info['perm_path']);

        //Send response to client according to validating result
        if ($status) {
            $message = array(
                'status' => 'you are allowed to perform this action'
            );
            $this->response($message, 200);
        } else {
            $message = array(
                'status' => 'you are forbid to perform this action'
            );
            $this->response($message, 404);
        }
    }
}