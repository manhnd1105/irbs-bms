<?php

namespace super_classes;

class PriceList{
    /**
     * @var
     */
    var $_id;
    /**
     * @var
     */
    var $_price;
    /**
     * @var
     */
    var $_description;

    /**
     * @var
     */
    var $_order_id;

    /**
     * @var
     */
    var $_quantity;

    /**
     * @var
     */
    var $_total;


    protected  function init_set($info,$field,$result=''){
        if(is_array($info)&& isset($info[$field])){
            $result=$info[$field];
        }else if(is_string($info)){
            $result=$info;
        }
        return $result;
    }

    public function set_price($info){
        $this->_price=$this->init_set($info,'price');
    }

    public function get_price(){
        return $this->_price;
    }

    public function set_description($info){
        $this->_description=$this->init_set($info,'description');
    }

    public function get_description(){
        return $this->_description;
    }

    public function set_order_id($info){
        $this->_order_id=$this->init_set($info,'order_id');
    }

    public function get_order_id(){
        return $this->_order_id;
    }

    public function set_quantity($info){
        $this->_quantity=$this->init_set($info,'quantity');
    }

    public function get_quantity(){
        return $this->_quantity;
    }

    public function set_total($info){
        $this->_total=$this->init_set($info,'total');
    }

    public function get_total(){
        return $this->_total;
    }

    public function get_props(){
        $props=array(
            'id' =>$this->_id,
            'price' =>$this->_price,
            'description' =>$this->_description,
            'order_id' => $this->_order_id,
            'quantity' =>$this->_quantity,
            'total' =>$this->_total
        );

        return $props;
    }
}