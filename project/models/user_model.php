<?php
/**
 * 用户表
 * User: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class User_model extends CI_Model
{

    var $title = '';
    var $content = '';
    var $date = '';

    function __construct()
    {
        parent::__construct();
    }

    public function del_role($id = null){
        return $this->db->delete('crm_roles', array('role_id' => intval($id)));
    }

    /**
     * 获取档期用户权限组
     * @param null $role_id
     * @return bool
     */
    function get_user_role_access($role_id = null){
        if(empty($role_id)){
            return false;
        }

        $this->db->where('crm_system_roles.sr_role_id', $role_id);
        $this->db->where('crm_system.visiabled', 1);
        $this->db->where('crm_system.enabled', 1);
        $this->db->select('*');
        $this->db->from('crm_system_roles');
        $this->db->join('crm_system', 'crm_system.sys_id = crm_system_roles.sr_sys_id', 'left');
        $this->db->order_by('crm_system.sys_order_id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * 角色
     * @param int $page
     * @param int $rows
     * @return mixed
     */

    function get_role_list($page = null, $rows = null)
    {
        if(empty($page) || empty($rows)){
            $query = $this->db->get('crm_roles');
        }else{
            $offset = ($page - 1) * $rows;
            $query = $this->db->get('crm_roles', $rows, $offset);
        }
        return $query->result_array();
    }

    function get_role_list_count()
    {
        $this->db->select('count(*) as acount');
        $this->db->from('crm_roles');
        $query = $this->db->get();
        $r = $query->row_array();
        return $r['acount'];
    }

    function insert_role($post = array())
    {
        return $this->db->insert('crm_roles', $post);
    }

    function save_role($post = array())
    {

        foreach ($post as $key => $val) {
            if ($key != 'role_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('role_id', $post['role_id']);
        return $this->db->update('crm_roles', $data);
    }

    function get_role_by_id($id = null)
    {
        $this->db->where('role_id', intval($id));
        $this->db->select('*');
        $this->db->from('crm_roles');
        $query = $this->db->get();
        return $query->row_array();
    }

    /**
     * 用户
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_user_list($page = null, $rows = null)
    {
        $this->db->select('*');
        $this->db->join('crm_roles', 'crm_roles.role_id = crm_users.role_id', 'left');
        $this->db->from('crm_users');
        $this->db->order_by("reg_time", "desc");
        if(!empty($rows) && !empty($offset)){
            $offset = ($page - 1) * $rows;
            $this->db->limit($rows, $offset);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_user_list_count()
    {
        $this->db->select('count(*) as acount');
        $this->db->from('crm_users');
        $query = $this->db->get();
        $r = $query->row_array();
        return $r['acount'];
    }

    function get_user_by_id($id = null)
    {
        $this->db->where('user_id', intval($id));
        $this->db->select('*');
        $this->db->join('crm_roles', 'crm_roles.role_id = crm_users.role_id', 'left');
        $this->db->from('crm_users');
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_user($user_name = null, $pwd = null){
        if(empty($user_name)){
            return false;
        }
        $this->db->where('user_name', $user_name);
        $this->db->where('password', $pwd);
        $this->db->select('*');
        $this->db->join('crm_roles', 'crm_roles.role_id = crm_users.role_id', 'left');
        $this->db->from('crm_users');
        $query = $this->db->get();
        return $query->row_array();
    }

    function insert_user($post = array())
    {
        $time = time();
        $data = array(
            'email' => '',
            'user_name' => '',
            'password' => '',
            'question' => '',
            'answer' => '',
            'sex' => 0,
            'birthday' => date('Y-m-d', $time),
            'address_id' => 0,
            'reg_time' => date('Y-m-d H:i:s', $time),
            'last_login' => 0,
            'last_time' => '',
            'last_ip' => '',
            'visit_count' => 0,
            'is_special' => 0,
            'msn' => '',
            'qq' => '',
            'office_phone' => '',
            'home_phone' => '',
            'mobile_phone' => '',
            'is_validated' => 0,
            'passwd_question' => '',
            'passwd_answer' => '',
            'enabled' => 1,
        );

        foreach ($post as $key => $val) {
            if (isset($data[$key])) {
                $data[$key] = $val;
            }
        }
        return $this->db->insert('crm_users', $data);
    }

    function save_user($post = array())
    {

        foreach ($post as $key => $val) {
            if ($key != 'user_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('user_id', $post['user_id']);
        return $this->db->update('crm_users', $data);
    }

    public function del_user($id = null){
        return $this->db->delete('crm_users', array('user_id' => intval($id)));
    }

}