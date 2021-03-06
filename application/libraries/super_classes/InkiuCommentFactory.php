<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/28/2014
 * Time: 12:39 PM
 */

namespace super_classes;

use Exception;

/**
 * Class InkiuCommentFactory
 * @package  super_classes
 */
class InkiuCommentFactory implements ISingleton
{
    private $ci;

    /**
     *
     */
    private static $instance;
    /**
     * @var \Model_comment
     */

    private $model_comment;

    private function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('comment/Model_comment');
        $this->model_comment = $this->ci->Model_comment;
    }

    /**
     * Call this method to get singleton
     *
     * @return InkiuCommentFactory
     */
    public static function get_instance()
    {
        try {
            if (!self::$instance) {
                self::$instance = new InkiuCommentFactory();

            }

        } catch (Exception $e) {
            echo 'error: ' . $e->getMessage();
        }
        return self::$instance;
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * Create a InkiuComment object
     * @param $info
     * @return  boolean
     */
    public function create_comment($info)
    {
        try {
            $comment = $this->create_comment_obj($info);
            $status = $this->map_db($comment);
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return $status;
    }

    /**
     * @param $info
     * @return InkiuComment
     *
     */
    private function create_comment_obj($info)
    {
        $comment = new InkiuComment();
        $comment->setId($info);
        $comment->setContent($info);
        $comment->setImgId($info);
        //find reviewer id
        $req = new RestfulRequestMaker();
        $acc_id = $req->make_request('get', 'acc_id', array(
            'acc_name' => $this->ci->session->userdata('acc_name')
        ));
        $comment->setReviewerId($acc_id);
        $comment->setTimeCommented(date('Y-m-d H:i:s'));
        $comment->setStatus($info);
        return $comment;
    }

    /**
     * Save all changes to database
     */
    private function map_db(InkiuComment $comment)
    {
        //Get properties of this object
        $info = $comment->get_props();
        try {
            //If object has no id => Insert new record to database
            if ($info['id'] == null || $info['id'] == '') {
                $inserted_id = $this->model_comment->insert($info);
                $status = $inserted_id > 0;
            } //If object has id => Update record to database
            else {
                $status = $this->model_comment->update($info);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return $status;
    }

    /**
     * Update a InkiuComment object
     * @param $info
     * @return  boolean
     */
    public function update_comment($info)
    {
        try {
            //Update object by passed information
            $comment = $this->create_comment_obj($info);

            //Save changes to database
            $status = $this->map_db($comment);
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return $status;
    }


    /**
     * @param $id
     * @return bool
     */
    public function delete_comment($id)
    {
        try {
            $status = $this->model_comment->remove($id);
        } catch (\Exception $e) {
            log_message($e->getMessage());
            return false;
        }
        return $status;
    }

    /**
     * load comments for an image
     * @param $img_id
     * @return array
     */
    public function load_comments($img_id = null)
    {
        if ($img_id != null) {
            $data = $this->model_comment->read(
                array('inkiu_comment.image_id' => $img_id)
            );
            return $data;
        }
        return false;
    }

}