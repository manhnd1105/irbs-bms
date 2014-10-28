<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/28/2014
 * Time: 12:37 PM
 */

class Model_comment{

    /**
     * @var mixed
    */
    private $db;

    /**
     * construct
    */
    function __construct()
    {
       $this->db = &get_instance()->db;
    }

    /**
     * @param null $where
     * Type: array
     *        Desc: content of WHERE statement in query
     *        Example: $where = array('Id' => '1')
     *        Default: NULL (query has no where statement)
     * @param string $required_fields
     * Type: string
     *        Desc: Table columns that you want to select in query
     *        Example: $required_fields = 'Name, Path'
     *    Default: '*' to select all columns
     * @param string $return_type
     *     *        Type: string
     *        Desc: number of rows that you want to take in query
     *        Example: $return_type = 'one'
     *        Values:
     *            'all': select all rows in result
     *            'one': select one row in result (first row)
     *        Default: 'all'
     * @return mixed
     */

    public  function read($where = NULL, $required_fields = '*', $return_type = 'all') {
        if ($where !== Null) {
            $this->db->where($where);
        }
        $this->db->select($required_fields);

        $this->db->from('inkiu_comment');
        $this->db->order_by('time_commented','desc');
        $result = array();
        switch ($return_type) {
            case 'all' :
                $result = $this->db->get()->result_array();
                break;
            case 'one':
                $result = $this->db->get()->row_array();
                break;
        }
        return $result;
    }

    /**
     * Insert new comment
     * @param $info
     * @return mixed
     */
    public function insert($info) {
        try{
            $this->db->trans_start();

            //insert into table 'file'
            $comment = new Comment($info);

            $this->db->insert('inkiu_comment',$comment);

            //Get inserted id and then insert into file table
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
     * Update comment
     * @param $info
     * @return bool
     */
    public function update($info) {
        try{
            $this->db->trans_start();
            $comment = new Comment($info);
            $id = $info['id'];
            $this->db->update('inkiu_comment', $comment, array('id' => $id));
            $this->db->trans_complete();
            return true;
        }
        catch (Exception $e){
            print $e->getMessage();
            return false;
        }

    }

    /**
     * Remove comment
     * @param $id
     * @return bool
     *
     */
    public function remove($id) {
        try{
            $this->db->trans_start();
            $this->db->delete('inkiu_comment', array('id' => $id));
            $this->db->trans_complete();
            return true;
        }catch (Exception $e){
            print $e->getMessage();
            return false;
        }

    }

}

class Comment {

    /**
     * @var
     */
    public  $id;
    /**
     * @var
     */
    public $img_id;
    /**
     * @var
     */
    public $reviewer_id;
    /**
     * @var
     */
    public $content;


    function __construct($info) {
        if($info['id'] != '' || $info['id'] != null){
            $this->_id = $info['id'];
        }
        $this->img_id = $info['img_id'];
        $this->reviewer_id = $info['reviewer_id'];
        $this->content = $info['content'];
    }


}