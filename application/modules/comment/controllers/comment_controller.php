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
class Comment_controller extends Frontend_Controller
{
    /**
     * @var \super_classes\InkiuCommentFactory
     */
    private $comment_factory;
    /**
     * @var int
     */
    private $img_id;
    /**
     * @var string
     */
    private $reviewer_id;

    /**
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->module('template/template_controller');
        $this->comment_factory = \super_classes\InkiuCommentFactory::get_instance();

        if (isset($_POST["img_id"]) && !empty($_POST["img_id"])) {
            $this->img_id = $_POST['img_id'];
        } else {
            $this->img_id = 0;
        }

        //fixed $reviewer_id data
        //$acc_name = $this->session->userdata('acc_name');
        //$acc_id = $this->session->userdata('acc_id');

        $this->reviewer_id = $this->session->userdata('acc_id');
    }

    /**
     * @param      $module
     * @param      $method
     * @param null $data
     */
    private function render($module, $method, $data = null)
    {
        $this->template_controller->demo_template($module, $method, $data);
    }

    /**
     * @param null $data
     */
    public function index($data = null)
    {
        $data['controller'] = 'comment_controller';
        $data['action'] = 'show_comments';
        $data['module'] = 'comment';
        $this->render('comment', '/test', $data);
    }

    /**
     *
     */
    public function show_comments()
    {
        $data['comment'] = $this->comment_factory->load_comments($this->img_id);
        $data['img_id'] = $this->img_id;
        $this->index($data);
    }

    /**
     *
     */
    public function create_comment()
    {
        if ($this->is_ajax()) {
            //Checks if action value exists
            if (isset($_POST["action"]) && !empty($_POST["action"])) {
                $action = $_POST["action"];
                //Switch case for value of action
                switch ($action) {
                    case "save":
                        //$this->save_comment();
                        if ($this->save_comment()) {
                            echo $_POST['comment'];
                        } else {
                            echo 'Save comment was failure !!';
                        };
                        break;
                }
            }
        }
    }

    //Function to check if the request is an AJAX request
    /**
     * @return bool
     */
    private function is_ajax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    /**
     * @return bool
     */
    private function save_comment()
    {
        $content = $_POST['comment'];
        $info = array(
            'content' => $content,
            'img_id' => $this->img_id,
            'reviewer_id' => $this->reviewer_id
        );
        $status = $this->comment_factory->create_comment($info);
        return $status;
    }

}