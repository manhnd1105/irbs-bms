<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/28/2014
 * Time: 12:39 PM
 */
namespace super_classes;

/**
 * Class Comment
 * @package  super_classes
*/

abstract class Comment{

    /**
     * @var
    */
    var $id;

    /**
     * @var
     */
    var $content;
    /**
     * @var
     */
    var $time_commented;

    /**
     *
     */
    public function __construct() {

    }

    /**
     * @param $info
     * @param $field
     * @param string $result
     * @return string
     */
    protected function init_set($info, $field, $result = '')
    {
        if (is_array($info) && isset($info[$field])) {
            $result = $info[$field];
        } else if (is_string($info)) {
            $result = $info;
        }
        return $result;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getTimeCommented()
    {
        return $this->time_commented;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $info
     */
    public function setContent($info)
    {
        $this->content = $this->init_set($info, 'content');
    }

    /**
     * @param mixed $info
     */
    public function setTimeCommented($info)
    {
        $this->time_commented = $this->init_set($info, 'time_commented');
    }

    /**
     * @param mixed $info
     */
    public function setId($info)
    {
        $this->id = $this->init_set($info, 'id');
    }

    /**
     * @return array
     */
    public function get_props()
    {
        $props = array(
            'id' => $this->id,
            'content' => $this->content,
            'time_commented' => $this->time_commented
        );
        return $props;
    }



}