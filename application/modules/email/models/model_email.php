<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/21/2014
 * Time: 10:43 AM
 */

class Model_email{

    /**
     * Just to implement Singleton
     * @var mixed
     */
    private $db;

    /**
     * Construct function
     */
    function __construct()
    {
        $this->db = & get_instance()->db;
    }

    /**
     * select information email config by email address
     * @param $where
     * @param $required_fields
     * @param $return_type
     * @return array
    */
    public function read($where = NULL, $required_fields = '*', $return_type = 'all'){
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $this->db->select($required_fields);
        $this->db->from('inkiu_email');
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

    /**
     * insert new inkiu email config
     * @param $info
     * @return int
    */
    public  function insert($info){
        try{
            $this->db->trans_start();
            $inkiu_email = new Inkiu_Email_Table($info);
            $this->db->insert('inkiu_email',$inkiu_email);
            $inserted_id = $this->db->insert_id();
            $this->db->trans_complete();
            return $inserted_id;
        }
        catch (Exception $e){
            print $e->getMessage();
            return -1;
        }
    }

    /**
     * modify information email config into database
     * @param $info
     * @return bool
    */
    public function modify($info){
        try{
            $this->db->trans_start();
            $inkiu_email = new Inkiu_Email_Table($info);
            $email = $info['email'];
            $this->db->update('inkiu_email', $inkiu_email, array('email' => $email));
            $this->db->trans_complete();
            return true;
        }
        catch (Exception $e){
            print $e->getMessage();
            return false;
        }

    }

    /**
     * delete email into database by email address
     * @param $email
     * @return bool
    */
    public function remove($email){
        try{
            $this->db->trans_start();
            $this->db->delete('inkiu_email', array('email' => $email));
            $this->db->trans_complete();
            return true;
        }catch (Exception $e){
            print $e->getMessage();
            return false;
        }
    }

}

class Inkiu_Email_Table{

    /**
     * @var
    */
    var $id;
    /**
     * @var
     */
    var $email;

    /**
     * @var
     */
    var $name;

    /**
     * @var
     */
    var $password;

    /**
     * @var
     */
    var $permission;

    /**
     * @var
     */
    var $description;

    function __construct($info)
    {
        $this->description = $info['description'];
        $this->email = $info['email'];
        $this->name = $info['name'];
        $this->password = $info['password'];
        $this->permission = $info['permission'];
    }


}