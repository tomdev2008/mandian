<?php
/**
 * 用户表
 * User: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class system_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_db(){
        return $this->db;
    }

    /**
     * 站点设置
     */
    function get_site_setting()
    {
        $this->db->select('*');
        $this->db->from('crm_site_settings');
        $query = $this->db->get();
        return $query->row_array();
    }
    function set_site_setting($post = array()){
        return $this->db->insert('crm_site_settings', $post);
    }
    function del_site_setting(){
        return $this->db->empty_table('crm_site_settings');
    }

    /**
     * 获取所有表
     * @return mixed
     */
    function get_all_table(){
        $query = $this->db->query("SHOW TABLES LIKE 'crm_%'");
        $r = array();
        foreach ($query->result_array() as $key => $row)
        {
            $r[] = array_shift($row);
        }
        return $r;
    }
    /**
     * 删除权限关联表
     * @param null $id
     * @return mixed
     */
    function del_system_role($id = null)
    {
        return $this->db->delete('crm_system_roles', array('sr_role_id' => intval($id)));
    }
    /**
     * 删除权限关联表
     * @param null $id
     * @return mixed
     */
    function del_system($id = null)
    {
        return $this->db->delete('crm_system', array('sys_id' => intval($id)));
    }

    function get_system_by_role_id($id = null)
    {
        $query = $this->db->get_where('crm_system_roles', array('sr_role_id' => intval($id)));
        return $query->result_array();
    }

    /**
     * 插入权限
     * @param array $post
     * @return mixed
     */
    function insert_system_role($post = array())
    {
        $data['sr_role_id'] = $post['role_id'];
        $data['sr_sys_id'] = $post['sys_id'];
        return $this->db->insert('crm_system_roles', $data);
    }

    function get_sys_by_action($m = null, $c = null, $a = null){

        $this->db->order_by("c1.sys_order_id", "asc");

        if(!empty($m)){
            $this->db->where('c1.sys_module', $m);
        }
        if(!empty($c)){
            $this->db->where('c1.sys_controller', $c);
        }
        if(!empty($a)){
            $this->db->where('c1.sys_action', $a);
        }

        $this->db->select('c1.*,c2.sys_name as p_name');
        $this->db->from('crm_system c1');
        $this->db->join('crm_system c2', 'c2.sys_id = c1.sys_parent_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * 角色
     * @param int $page
     * @param int $rows
     * @return mixed
     */

    function get_system_list($params = array(), $page = null, $rows = null)
    {
        $offset = ($page - 1) * $rows;
        $this->db->order_by("sys_order_id", "asc");
        foreach($params as $key => $val){
            $this->db->where($key, $val);
        }
        $this->db->select('*');
        $this->db->from('crm_system');
        if (!empty($page) && !empty($rows)) {
            $this->db->limit($rows, $offset);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_system_list_count()
    {
        $this->db->select('count(*) as acount');
        $this->db->from('crm_system');
        $query = $this->db->get();
        $r = $query->row_array();
        return $r['acount'];
    }

    function insert_system($post = array())
    {
        return $this->db->insert('crm_system', $post);
    }

    function save_system($post = array())
    {

        foreach ($post as $key => $val) {
            if ($key != 'sys_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('sys_id', $post['sys_id']);
        return $this->db->update('crm_system', $data);
    }

    function get_system_by_id($id = null)
    {
        $this->db->where('sys_id', intval($id));
        $this->db->select('*');
        $this->db->from('crm_system');
        $query = $this->db->get();
        return $query->row_array();
    }

}