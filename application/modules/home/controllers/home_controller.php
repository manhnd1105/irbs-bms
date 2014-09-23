<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Home_controller
 * @property Template_controller template_controller
 */
class Home_controller extends Backend_Controller
{
    /**
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->module('template/template_controller');
    }

    /**
     * Steps of making site layout:
     * 1. In method of current controller: load Template Controller and pass it the URI of desired view that you want to display
     * 2. In Template Controller of Template Module: Add new method (template name)
     * 3. In view of Template Module: load view of desired controller
     */
    public function index()
    {
        //Call the layout (as method of template controller) that you want to display
        $this->template_controller->demo_template('home', 'index');
    }
}
