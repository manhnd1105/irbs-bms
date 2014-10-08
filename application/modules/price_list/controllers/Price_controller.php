<?php

class Price_controller extends Frontend_Controller{

    /**
     * @var super_classes\PriceListFactory
     */
    private $pricelist_factory;

    public function __construct(){
        //parent::_construct();
        $this->pricelist_factory=\super_classes\PriceListFactory::get_instance();
        $this->load->module('template/template_controller');
    }


    public function view_price(){
        //Get all price list information form database
        $all_info=$this->pricelist_factory->load_prices();
        $data['price_info']=$all_info;
        $this->render('price_list','/price_info',$data);
    }

    private function render($controller, $method, $data) {
        $this->template_controller->demo_template($controller, $method, $data);
    }

}