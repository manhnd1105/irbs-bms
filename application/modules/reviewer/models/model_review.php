<?php


class Model_review extends CI_Model{

    /**
     * @var mixed
     */
    private static $db;


    /**
     * @construct
     */
    public function __construct(){
        parent::__construct();
        self::$db = &get_instance()->db;
    }

//    /**
//     *
//     */
//    public function read($where = NULL, $required_fields = '*', $return_type = 'all') {
//        if ($where !== NULL) {
//            $this->db->where($where);
//        }
//        $this->db->select($required_fields);
//        $this->db->from('order_detail');
//        $this->db->join('file', 'file.id = order_detail.file_id');
//        $result = array();
//        switch ($return_type) {
//            case 'all':
//                $result = $this->db->get()->result_array();
//                break;
//            case 'one':
//                $result = $this->db->get()->row_array();
//        }
//        return $result;
//    }

    public function read_order($where = NULL, $required_fields = '*', $return_type = 'all')
    {
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $this->db->select($required_fields);
        $this->db->from('irbs.order');
        //$this->db->join('order_detail', 'irbs.order.id = order_detail.order_id');
        $result = array();
        switch ($return_type) {
            case 'all':
                $result = $this->db->get()->result_array();
                break;
            case 'one':
                $result = $this->db->get()->row_array();
        }
        return $result;
    }

    public function read_order_detail($where = NULL, $required_fields = '*', $return_type = 'all')
    {
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $this->db->select($required_fields);
        $this->db->from('irbs.order');
        $this->db->join('order_detail', 'irbs.order.id = order_detail.order_id');
        //$this->db->join('file', 'order_detail.file_id = file.id');
        $result = array();
        switch ($return_type) {
            case 'all':
                $result = $this->db->get()->result_array();
                break;
            case 'one':
                $result = $this->db->get()->row_array();
        }
        return $result;
    }
}