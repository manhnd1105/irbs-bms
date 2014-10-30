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
     * Construct function
     */
    function __construct()
    {
        parent::__construct();
        $this->check_authentication();
    }

    /**
     * Force user to login before accessing this system
     */
    private function check_authentication()
    {
        //Check whether user has logged in by getting account name from session
        $acc_name = $this->session->userdata['acc_name'];

        //If not yet logged in => force redirect to authentication system
        $current_encoded_url = urlencode(urlencode(urlencode(current_url())));
        if (!$acc_name) {
            redirect($this->config->item('ams_path') .
                '/authentication/authentication_controller/view_login/' .
                $current_encoded_url
            );
        }
    }
}