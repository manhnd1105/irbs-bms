<?php

/**
 * Class Template_controller
 */
class Template_controller extends MX_Controller
{
    /**
     * @param $module_name
     * @param $file_uri
     * @param null $data
     */
    function demo_template($module_name, $file_uri, $data = NULL)
    {
        $data['module_name'] = $module_name;
        $data['file_uri'] = $file_uri;
        $this->load->view('/demo_template/' . 'index', $data);
    }

    /**
     * @param $data
     */
    function admin($data)
    {
        $this->load->view('admin', $data);
    }
}
