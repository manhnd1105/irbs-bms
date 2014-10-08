<?php

class Model_price
{
    /**
     * @var CI_DB_active_record
     */
    private $_db;

    /**
     * @var CI_DB_active_record
     */
    private $db_test;

    /**
     * @var CI_Controller
     */
    private  $CI;

    function __construct(){

        $this->CI=&get_instance();
        if(defined('PHPUNIT_TEST')){
            $db_testing_name = $this->CI->db->database.'_testing';
            $host = $this->CI->db->hostname;
            $username = $this->CI->db->username;
            $password = $this->CI->db->password;
            $db_driver = $this->CI->db->dbdriver;
            $dsn = $db_driver.'://'.$username.':'.$password.'@'.$host.'/'.$db_testing_name;
            $this->db_test = $this->CI->load->database($dsn,true);
        }else {
            $this->_db= $this->CI->db;
        }

    }

    /**
     * Get price information form database
     * @param null $where
     * @param string $required_fields
     * @param string $return_type
     * @return array
     */
    public function get_price($where = NULL, $required_fields = '*', $return_type = 'all'){
        //$db=null;
        if(defined('PHPUNIT_TEST')){
            if($where!==null){
                $this->db_test->where($where);
            }
            $this->db_test->select($required_fields);
            $this->db_test->from('price_list');
            $result=array();
            switch($return_type){
                case 'all';
                    $result= $this->db_test->get()->result_array();
                    break;
                case 'one';
                    $result= $this->db_test->get()->row_array();
            }
            return $result;
        }else{
            if($where!==null){
                $this->_db->where($where);
            }
            $this->_db->select($required_fields);
            $this->_db->from('price_list');
            $result=array();
            switch($return_type){
                case 'all';
                    $result=  $this->_db->get()->result_array();
                    break;
                case 'one';
                    $result=  $this->_db->get()->row_array();
            }
            return $result;
        }

    }


    public function get_price_by_order_id($id){

    }

}