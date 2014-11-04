<?php

/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/1/2014
 * Time: 9:42 AM
 */
class Upload_controller extends Frontend_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->module('template/template_controller');
    }


    //create view upload
    public function view_upload()
    {
        $post = $this->input->post();
        if (isset($post['name'])&&isset($post['email'])&&isset($post['phone'])&&isset($post['address'])){
            $data['name'] = $post['name'];
            $data['email'] = $post['email'];
            $data['phone'] = $post['phone'];
            $data['address'] = $post['address'];
        }

        $data['controller'] = 'upload_controller';
        $data['action'] = 'upload';
        $data['module'] = 'order';

        $this->template_controller->demo_template('order', '/upload', $data);
    }

    //create view upload_mobile

    public function upload()
    {
        if (!empty($_FILES['files'])) {
            $status = $this->save_files();
            if ($status) {
                $this->view_payment();
            }
        } else {
            echo 'Please choose your images !';
        }

    }

    //upload image file

    private function  save_files()
    {
        $status = false;
        foreach ($_FILES['files']['name'] as $key => $name) {
            if ($_FILES['files']['error'][$key] == 0) {
                $status = $this->fms_sender($key, $name);
            }
        }
        return $status;
    }

    //mobile upload images

    /**
     * @param $key
     * @param $name
     * @return bool
     */
    private function fms_sender($key, $name)
    {
        $this->load->library('curl');
        $customer = $this->session->userdata('acc_name');
        if ($customer != null || $customer != '') {
            $box_message = array(
                'image' => '@'
                    . $_FILES['files']['tmp_name'][$key]
                    . ';filename=' . $name
                    . ';type=' . $_FILES['files']['type'][$key],
                'customer' => $customer
            );
            //$data = http_build_query($image, NULL, '&');
            $url = $this->get_config_url_fms_receiver();

            //initialise the curl request
            $request = curl_init();
            curl_setopt($request, CURLOPT_URL, $url);
            curl_setopt($request, CURLOPT_HEADER, true);
            curl_setopt($request, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
//            curl_setopt($request, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; rv:2.2) Gecko/20110201");

            //send a file
            curl_setopt($request, CURLOPT_INFILESIZE, filesize($_FILES['files']['tmp_name'][$key]));
            curl_setopt($request, CURLOPT_BUFFERSIZE, 128);
            curl_setopt($request, CURLOPT_POST, true);
            curl_setopt($request, CURLOPT_POSTFIELDS, $box_message);
            curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);
            //output the response
            curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
            $status = curl_exec($request);

            //close curl request
            curl_close($request);

//            $this->curl->create($url);
//            $this->curl->options(array(CURLOPT_BUFFERSIZE => 128));
//            $this->curl->post($box_message);
//            $status = $this->curl->execute();
            return $status;
//            return true;
        }
        return false;

    }

    //function send file to irbs-fms

    private function get_config_url_fms_receiver()
    {
        $result = '';
        $base_url = base_url();
        $base_url_array = explode('/', $base_url);
        for ($i = 0; $i < sizeof($base_url_array); $i++) {
            $str = $base_url_array[$i];
            if ($str != 'irbs-bms') {
                if ($result != '') {
                    $result = $result . '/' . $str;
                } else {
                    $result = $result . $str;
                }

            }
        }
        $result = $result . 'irbs-fms/index.php/file/image_controller/fms_receiver';
        return $result;
    }

    public function  mobile_upload()
    {
        if (!empty($_FILES['files'])) {
            $status = $this->save_files();
            //var_dump($status);
            if($status){
                $this->view_payment();
            }
        } else {
            $this->view_mobile_upload();
        }
    }

    public function view_mobile_upload()
    {
        $data['controller'] = 'upload_controller';
        $data['action'] = 'mobile_upload';
        $data['module'] = 'order';

        $this->template_controller->demo_template('order', '/upload_mobile', $data);
    }

    public function bms_receiver()
    {
        $msg = $_POST['fms_reply'];
        var_dump($msg);
    }

    public function view_payment(){
//        $post = $this->input->post();
//        if (isset($post['name'])&&isset($post['email'])&&isset($post['phone'])&&isset($post['address'])){
//            $data['name'] = $post['name'];
//            $data['email'] = $post['email'];
//            $data['phone'] = $post['phone'];
//            $data['address'] = $post['address'];
//        }

        $data['controller'] = 'upload_controller';
        $data['action'] = 'upload';
        $data['module'] = 'order';

        $this->template_controller->demo_template('order', '/payment', $data);
    }

}