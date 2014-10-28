<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/28/2014
 * Time: 12:37 PM
 */
/**
 * Class Comment_controller
 * @property super_classes\InkiuCommentFactory comment_factory
 * @property Template_controller template_controller
 */

class Comment_controller extends  Frontend_Controller{


    private $comment_factory;

    function __construct()
    {
        parent::__construct();
        $this->load->module('template/template_controller');
        $this->comment_factory = \super_classes\InkiuCommentFactory::get_instance();
    }

    /**
     * @param      $module
     * @param      $method
     * @param null $data
     */
    private function render($module, $method, $data = NULL)
    {
        $this->template_controller->demo_template($module, $method, $data);
    }

    public function index($data = NULL){
        $data['controller'] = 'comment_controller';
        $data['action'] = 'show_comments';
        $data['module'] = 'comment';
        $this->render('comment','/test',$data);
    }

    public  function show_comments(){
        $img_id = $_POST['img_id'];
        $data['comment'] = $this->comment_factory->load_comments($img_id);
        $data['img_id'] = $img_id;
        $this->index($data);
    }

}