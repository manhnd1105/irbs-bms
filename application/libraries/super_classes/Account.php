<?php
namespace super_classes;

/**
 * Class Account
 * @package super_classes1
 */
abstract class Account
{ //TODO consider turn this class not extending Controller anymore
    /**
     * @var
     */
    var $_roles;
    /**
     * @var
     */
    var $_account_name;
    /**
     * @var
     */
    var $_staff_name;
    /**
     * @var
     */
    var $_password;
    /**
     * @var
     */
    var $_id;

    /**
     *
     */
    function __construct()
    {
        $this->init_roles();
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
     *
     */
    function init_roles()
    {
        $this->_roles = array();
    }

    /**
     * @param $info
     */
    public function set_account_name($info)
    {
        $this->_account_name = $this->init_set($info, 'account_name');
    }

    /**
     * @param $info
     */
    public function set_staff_name($info)
    {
        $this->_staff_name = $this->init_set($info, 'staff_name');
    }

    /**
     * @param $info
     */
    public function set_password($info)
    {
        $this->_password = $this->init_set($info, 'password');
    }

    /**
     * @return mixed
     */
    public function get_account_name()
    {
        return $this->_account_name;
    }

    /**
     * @return mixed
     */
    public function get_staff_name()
    {
        return $this->_staff_name;
    }

    /**
     * @return mixed
     */
    public function get_password()
    {
        return $this->_password;
    }

    /**
     * @return mixed
     */
    public function get_roles()
    {
        return $this->_roles;
    }

    /**
     * @param $info
     */
    public function set_id($info)
    {
        $this->_id = $this->init_set($info, 'id');
    }

    /**
     * @return mixed
     */
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * @return array
     */
    public function get_props()
    {
        $props = array(
            'account_name' => $this->_account_name,
            'staff_name' => $this->_staff_name,
            'password' => $this->_password,
            'roles' => $this->_roles
        );
        return $props;
    }

    /**
     * @param $role_obj
     */
    public function assign_role($role_obj)
    {
        //Push directly selected role object into roles array of this instance
        array_push($this->_roles, $role_obj);
    }

    /**
     * @param null $role_obj
     */
    public function unassign_role($role_obj = NULL)
    {
        if ($role_obj === NULL) {
            $this->_roles = array();
        } else {
            //Search whether the selected role exists in roles array of this instance
            foreach ($this->_roles as $existing_role) {
                if ($role_obj->_role_id === $existing_role->_role_id) {
                    unset($this->_roles[$role_obj]);
                }
            }
        }
    }
}
