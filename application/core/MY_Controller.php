<?php
require_once APPPATH . "third_party/MX/Controller.php";

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package        CodeIgniter
 * @subpackage    Libraries
 * @category    Libraries
 * @author        ExpressionEngine Dev Team
 * @link        http://codeigniter.com/user_guide/general/controllers.html
 */
class MY_Controller extends MX_Controller
{
    /**
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->check_authentication();
        /* 		$user_id = $this->session->userdata('user_id');
                $this->data['user'] = $this->user_lib->get($user_id); */
    }

    private function check_authentication()
    {
        $acc_name = $this->session->userdata['acc_name'];
        //If not yet logged in => force redirect to authentication system
        if (!$acc_name) {
            redirect($this->config->item('ams_path'));
        }
    }
}