<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/22/2014
 * Time: 11:15 AM
 */
class InkiuEmail{

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
     * @return mixed
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * @param mixed $info
     */
    public function setPermission($info)
    {
        $this->permission = $this->init_set($info, 'permission');
    }

    /**
     * @var
     */
    var $description;
    /**
     * @var
     */
    var $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $info
     */
    public function setDescription($info)
    {
        $this->description = $this->init_set($info, 'description');
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $info
     */
    public function setEmail($info)
    {
        $this->email = $this->init_set($info, 'email');
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $info
     */
    public function setName($info)
    {
        $this->name = $this->init_set($info, 'name');
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $info
     */
    public function setPassword($info)
    {
        $this->password = $this->init_set($info, 'password');
    }



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
     * @return array
     */
    public function get_props()
    {
        $props = array(
            'email' => $this->email,
            'name' => $this->name,
            'password' => $this->password,
            'permission' => $this->permission,
            'description' => $this->description
        );
        return $props;
    }

    function __construct()
    {

    }

}