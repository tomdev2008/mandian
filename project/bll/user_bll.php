<?php
/**
 * 用户表业务逻辑层
 * User: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class User_bll extends CI_Bll
{


    function __construct()
    {
        parent::__construct();
        //加载用户模型
        $this->load->model('user_model');
        $this->_model = $this->user_model;
    }

    /**
     * 用户登录处理
     * @param null $post
     */
    function login($user_name = null, $pwd = null)
    {
        if (empty($user_name) || empty($pwd)) {
            return false;
        }

        //用户是否存在
        $pwd = substr(md5($pwd), 0, 7);
        $r = $this->_model->get_user($user_name, $pwd);
        if (!$r) {
            return false;
        }

        //写入权限
        $session['user_name'] = $r['user_name'];
        $session['user_id'] = $r['user_id'];
        $session['role_id'] = $r['role_id'];
        $session['role_name'] = $r['role_name'];
        $session['action_list'] = serialize($this->get_user_role_access($r['role_id']));

        //更新登录时间、ip、次数
        $data = array(
            'user_id' => $r['user_id'],
            'last_login' => 1,
            'last_time' => date('Y-m-d H:i:s', time()),
            'last_ip' => get_ip(),
            'visit_count' => (++$r['visit_count']),
        );
        $this->_model->save_user($data);

        $this->session->set_userdata($session);
        return true;
    }

    /**
     * 退出
     */
    function logout(){
        $session['user_name'] = '';
        $session['user_id'] = '';
        $session['role_id'] = '';
        $session['role_name'] = '';
        $session['action_list'] = '';
        $this->session->set_userdata($session);
    }


    /**
     * 档期用户 的权限
     * @param $role_id
     * @return array
     */
    function get_user_role_access_header($role_id){
        $rights = $this->_model->get_user_role_access($role_id);
        $result = array();
        $result_sub = array();
        foreach ($rights as $val) {
            if (intval($val['sys_parent_id']) === 0) {
                $result[$val['sys_id']] = array(
                    'sys_id' => $val['sys_id'],
                    'sys_name' => $val['sys_name'],
                    'sys_module' => $val['sys_module'],
                    'sys_controller' => $val['sys_controller'],
                    'sys_action' => $val['sys_action'],
                    'enabled' => $val['enabled'],
                    'visiabled' => $val['visiabled'],
                    'sys_order_id' => $val['sys_order_id'],
                    'children' => array(),
                    "state" => "closed"
                );
            } else {
                $result_sub[$val['sys_parent_id']][] = array(
                    'sys_id' => $val['sys_id'],
                    'sys_name' => $val['sys_name'],
                    'sys_module' => $val['sys_module'],
                    'sys_controller' => $val['sys_controller'],
                    'sys_action' => $val['sys_action'],
                    'sys_order_id' => $val['sys_order_id'],
                    'enabled' => $val['enabled'],
                    'visiabled' => $val['visiabled'],
                );
            }
        }
        $r = array();
        foreach ($result as $key => $val) {
            if(isset($result_sub[$key])){
                $val['children'] = $result_sub[$key];
            }
            $r[] = $val;
        }
        return $r;
    }

    /**
     * 档期用户 的权限
     * @param $role_id
     * @return array
     */
    function get_user_role_access($role_id){
        $rights = $this->_model->get_user_role_access($role_id);
        $current_rights = array();
        foreach($rights as $val){
            if(empty($val['sys_controller']) || empty($val['sys_action'])){
                continue;
            }
            $current_rights[] = $val['sys_id'] ;
        }
        return $current_rights;
    }

    /**
     * 登录验证机制
     */
    function is_login()
    {
        $user_id = $this->session->userdata('user_id');
        $crm_session_id = $this->session->userdata('user_name');

        if (empty($user_id) || empty($crm_session_id)) {
            return false;
        }

        return true;
    }

    function user_role_edit($user_id, $role_id)
    {
        $post['user_id'] = $user_id;
        $post['role_id'] = $role_id;
        return $this->_model->save_user($post);
    }

    /**
     * 获取用户数据
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_user_list($page = null, $rows = null)
    {
        return $this->_model->get_user_list($page, $rows);
    }

    function get_user_list_count()
    {
        return $this->_model->get_user_list_count();
    }

    function get_user_by_id($id = null)
    {
        return $this->_model->get_user_by_id($id);
    }

    function insert_user($post = array())
    {
        $post['password'] = substr(md5($post['password']), 0, 7);
        return $this->_model->insert_user($post);
    }

    function save_user($post = array())
    {
        return $this->_model->save_user($post);
    }

    public function del_user($id = null)
    {
        return $this->_model->del_user($id);
    }

    /**
     * 获取角色
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_role_list($page = null, $rows = null)
    {
        $roles = $this->_model->get_role_list($page, $rows);
        $this->load->model('system_model');
        $system_count = $this->system_model->get_system_list_count();
        foreach ($roles as & $role) {
            $roles_count = $this->system_model->get_system_by_role_id($role['role_id']);
            $role['rights_per'] = number_format((count($roles_count) / $system_count) * 100, 2);
        }
        return $roles;
    }

    function get_role_list_count()
    {
        return $this->_model->get_role_list_count();
    }

    function insert_role($post = array())
    {
        return $this->_model->insert_role($post);
    }

    function save_role($post = array())
    {
        return $this->_model->save_role($post);
    }

    function get_role_by_id($id = null)
    {
        return $this->_model->get_role_by_id($id);
    }
    public function del_role($id = null)
    {
        return $this->_model->del_role($id);
    }

}