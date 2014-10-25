<?php

namespace super_classes;

class Review
{
    /**
     * @var
     */
    var $_id;
    /**
     * @var
     */
    var $_order_id;
    /**
     * @var
     */
    var $_file_id;
    /**
     * @var
     */
    var $_worker_id;
    /**
     * @var
     */
    var $_file_status;
    /**
     * @var
     */
    var $_file_changed_path;
    /**
     * @var
     */
    var $_deleted;


    protected  function init_set($info,$field,$result=''){
        if(is_array($info)&& isset($info[$field])){
            $result =$info[$field];
        }else if(is_string($info)){
            $result=$info;
        }
        return $result;
    }

    public function set_id($info){
        $this->_id=$this->init_set($info,'id');
    }

    public function get_id(){
        return $this->_id;
    }

    public function set_order_id($info){
        $this->_order_id=$this->init_set($info,'order_id');
    }

    public function get_order_id(){
        return $this->_order_id;
    }

    public function set_file_id($info){
        $this->_file_id=$this->init_set($info,'file_id');
    }

    public function get_file_id(){
        return $this->_file_id;
    }

    public function set_worker_id($info){
        $this->_worker_id=$this->init_set($info,'worker_id');
    }

    public function get_worker_id(){
        return $this->_worker_id;
    }

    public function set_file_status($info){
        $this->_file_status=$this->init_set($info,'file_status');
    }

    public function get_file_status(){
        return $this->_file_status;
    }

    public function set_file_changed_path($info){
        $this->_file_changed_path=$this->init_set($info,'file_changed_path');
    }

    public function get_file_changed_path(){
        return $this->_file_changed_path;
    }

    public function set_deleted($info){
        $this->_deleted=$this->init_set($info,'deleted');
    }

    public function get_deleted(){
        return $this->_deleted;
    }


}
