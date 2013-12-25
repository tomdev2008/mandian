<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
        $this->set_module('system');

        $this->BLL('user_bll');
        $this->is_login();

        //初始化头部
        $this->init_header();
    }

    public function index()
    {

    }

    public function user_list_json()
    {
        $this->lib('json');

        $page = $this->input->get_post('page');
        $rows = $this->input->get_post('rows');
        $r['rows'] = $this->user_bll->get_user_list($page, $rows);
        $r['total'] = $this->user_bll->get_user_list_count();
        exit($this->json->encode($r));
    }

    public function user_list()
    {
        //用户权限验证
        $this->is_valiate();
        $page = $this->input->get_post('p');
        $rows = 20;
        $r['rows'] = $this->user_bll->get_user_list($page, $rows);
        $r['total'] = ceil( $this->user_bll->get_user_list_count() / $rows);

        $this->view( '/tpl/pager_header', $this->_sys);
        $this->view( '/tpl/user_list', $r);
        $this->view( '/tpl/pager_footer');
    }

    public function user_add()
    {
        //用户权限验证
        $this->is_valiate();

        $user = array('user_id' => '', 'user_name' => '', 'password' => '', 'email' => '', 'enabled' => 1);
        $data['data'] = $user;
        $this->view( '/tpl/pager_header', $this->_sys);
        $this->view( '/tpl/user_edit', $data);
        $this->view( '/tpl/pager_footer');
    }

    public function user_edit($id = null)
    {
        //用户权限验证
        $this->is_valiate();

        $user = $this->user_bll->get_user_by_id($id);
        if ($user) {
            $data['data'] = $user;
            $this->view( '/tpl/pager_header', $this->_sys);
            $this->view( '/tpl/user_edit', $data);
            $this->view( '/tpl/pager_footer');
        } else {
            show_message('获取用户失败');
        }

    }

    public function user_save()
    {
        $user = $this->input->post('user');
        if (empty($user['user_id'])) {
            if (empty($user['user_name']) || empty($user['password'])) {
                show_message('用户名、密码不能为空');
            }
        } else {
            if (empty($user['user_name'])) {
                show_message('用户名不能为空');
            }
        }

        if (empty($user['user_id'])) {
            $r = $this->user_bll->insert_user($user);
        } else {
            $r = $this->user_bll->save_user($user);
        }
        if ($r) {
            show_message('用户保存成功', '点击跳转', base_url() . '/default/user/user_list');
        } else {
            show_message('用户保存失败');
        }
    }

    public function user_del($id = null)
    {
        //用户权限验证
        $this->is_valiate();

        if (!empty($id)) {
            $r = $this->user_bll->del_user($id);
        }
        if ($r) {
            show_message('用户删除成功', '点击跳转', base_url() . '/default/user/user_list');
        } else {
            show_message('用户删除失败');
        }
    }

    /**
     * 角色管理
     */
    public function role_list()
    {
        //用户权限验证
        $this->is_valiate();

        $this->view( '/tpl/pager_header', $this->_sys);
        $this->view( '/tpl/role_list');
        $this->view( '/tpl/pager_footer');
    }

    public function role_list_json()
    {
        $this->lib('json');

        $page = $this->input->get_post('page');
        $rows = $this->input->get_post('rows');
        $r['rows'] = $this->user_bll->get_role_list($page, $rows);
        $r['total'] = $this->user_bll->get_role_list_count();
        exit($this->json->encode($r));
    }

    public function role_add()
    {
        //用户权限验证
        $this->is_valiate();

        $user = array('role_id' => '', 'role_name' => '', 'enabled' => '');
        $data['data'] = $user;
        $this->view( '/tpl/pager_header', $this->_sys);
        $this->view( '/tpl/role_edit', $data);
        $this->view( '/tpl/pager_footer');
    }

    public function role_edit($id = null)
    {
        //用户权限验证
        $this->is_valiate();

        $user = $this->user_bll->get_role_by_id($id);
        if ($user) {
            $data['data'] = $user;
            $this->view( '/tpl/pager_header', $this->_sys);
            $this->view( '/tpl/role_edit', $data);
            $this->view( '/tpl/pager_footer');
        } else {
            show_message('获取用户失败');
        }

    }

    public function role_save()
    {

        $role = $this->input->post('role');
        if (empty($role['role_name'])) {
            show_message('角色名不能为空');
        }

        if (empty($role['role_id'])) {
            $r = $this->user_bll->insert_role($role);
        } else {
            $r = $this->user_bll->save_role($role);
        }
        if ($r) {
            show_message('角色保存成功', '点击跳转', base_url() . '/default/user/role_list');
        } else {
            show_message('角色保存失败');
        }
    }
}