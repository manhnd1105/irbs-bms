<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/1/2014
 * Time: 9:42 AM
 */
class Upload_controller extends Frontend_Controller{
    function __construct()
    {
        parent::__construct(); // TODO: Change the autogenerated stub
        $this->load->module('template/template_controller');
    }


    //create view upload
    public function view_upload(){
        $data['controller'] = 'upload_controller';
        $data['action'] = 'upload';
        $data['module'] = 'order';

        $this->load->module('template/template_controller');
        $this->template_controller->demo_template('order', '/upload',$data);
    }

    //create view upload_mobile

    public function view_mobile_upload(){
        $data['controller'] = 'upload_controller';
        $data['action'] = 'mobile_upload';
        $data['module'] = 'order';

        $this->load->module('template/template_controller');
        $this->template_controller->demo_template('order', '/upload_mobile',$data);
    }

    //upload image file
    public function upload(){
        echo'dsdadasdadsa';
//        if (isset($_POST['submit'])) {
//            if (!empty($_FILES['upload']['name'])) {
//                $ch = curl_init();
//                $localfile = $_FILES['upload']['tmp_name'];
//                $fp = fopen($localfile, 'r');
//                curl_setopt($ch,CURLOPT_USERPWD,"email@email.org:password");
//                curl_setopt($ch, CURLOPT_URL, 'ftp://ftp_login:password@ftp.domain.com/'.$_FILES['upload']['name']);
//                curl_setopt($ch, CURLOPT_UPLOAD, 1);
//                curl_setopt($ch, CURLOPT_INFILE, $fp);
//                curl_setopt($ch, CURLOPT_INFILESIZE, filesize($localfile));
//
//                //echo $localfile;
//                curl_exec ($ch);
//                $error_no = curl_errno($ch);
//                curl_close ($ch);
//                if ($error_no == 0) {
//                    $error = 'File uploaded succesfully.';
//                } else {
//                    $error = 'File upload error.';
//                }
//            } else {
//                $error = 'Please select a file.';
//            }
//        }

//=====================================================================
        //$url = 'http://localhost/ajaximageupload/uploaded_file.php';
//        $url = 'http://localhost/irbs-fms/index.php/file/image_controller/view_crud';
//        set_time_limit(0);
//        if (isset($_FILES['upload']))
//        {
//            $tmpfile = $_FILES['upload']['tmp_name'];
//            //$filename = basename($_FILES['upload']['name']);
//            $type = basename($_FILES['upload']['type']);
//            $data = array(
//                //'uploaded_file' => '@'.$tmpfile.';filename='.$filename.';type='.$type,
//                'uploaded_file' => '@'.$tmpfile,
//            );
//            $build_data = http_build_query($data, NULL, '&');
//            //print $build_data;
//            $ch = $this->Curl->post($data,array());
////            curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'POST');
////            curl_setopt($ch, CURLOPT_POST, true);
////            curl_setopt($ch, CURLOPT_POSTFIELDS, $build_data);
//
//            //curl_setopt($ch, CURLOPT_FILE, $data);
//            $ch->post($data,array());
////            curl_exec($ch);
////            curl_close($ch);
//
//        }

//=====================================================================

//        $localFile = $_FILES['upload']['tmp_name'];
//
//        $fp = fopen($localFile, 'r');
//
//// Connecting to website.
//        $ch = curl_init();
//
////        curl_setopt($ch, CURLOPT_USERPWD, "email@email.org:password");
////        curl_setopt($ch, CURLOPT_URL, 'ftp://@ftp.website.net/audio/' . $_FILES['upload']['name']);
//        curl_setopt($ch, CURLOPT_URL, 'http://localhost/ajaximageupload/uploaded_file.php'. $_FILES['upload']['name']);
//        curl_setopt($ch, CURLOPT_UPLOAD, 1);
//        curl_setopt($ch, CURLOPT_TIMEOUT, 86400); // 1 Day Timeout
//        curl_setopt($ch, CURLOPT_INFILE, $fp);
//        //curl_setopt($ch, CURLOPT_NOPROGRESS, false);
//        //curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'CURL_callback');
//        curl_setopt($ch, CURLOPT_BUFFERSIZE, 128);
//        curl_setopt($ch, CURLOPT_INFILESIZE, filesize($localFile));
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_exec ($ch);

//        if (curl_errno($ch)) {
//
//            $msg = curl_error($ch);
//        }
//        else {
//
//            $msg = 'File uploaded successfully fafsfds.';
//        }
//
//        curl_close ($ch);
//
//        $return = array('msg' => $msg);
//
//        echo json_encode($return);

   }

    //mobile upload images
    public function  mobile_upload(){

    }

}