<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * ---------------------------------------------------
     * 角色管理
     * ---------------------------------------------------
     */
    public function role_list()
    {
        $this->load->bll('user_bll');
        $page = $this->input->get_post('p');
        $rows = 20;
        $r['rows'] = $this->user_bll->get_role_list($page, $rows);
        $r['total'] = ceil( $this->user_bll->get_role_list_count() / $rows);

        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/index/role_list', $r);
        $this->view( '/admin/public/pager_footer');
    } 

    public function role_add()
    {

        $user = array('role_id' => '', 'role_name' => '', 'enabled' => '');
        $data['data'] = $user;
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/index/role_edit', $data);
        $this->view( '/admin/public/pager_footer');
    }

    public function role_edit($id = null)
    {
        $this->load->bll('user_bll');
        $user = $this->user_bll->get_role_by_id($id);
        if ($user) {
            $data['data'] = $user;
            $this->view( '/admin/public/pager_header');
            $this->view( '/admin/index/role_edit', $data);
            $this->view( '/admin/public/pager_footer');
        } else {
            showmessage('获取用户失败');
        }

    }

    public function role_save()
    {

        $this->load->bll('user_bll');
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
            showmessage('角色保存成功', for_url('admin','role','role_list'));
        } else {
            showmessage('角色保存失败');
        }
    }


    public function role_del($id = null)
    {
        $this->load->bll('user_bll');
        if (!empty($id)) {
            $r = $this->user_bll->del_role($id);
        }
        if ($r) {
            showmessage('删除成功', for_url('admin','role','role_list'));
        } else {
            showmessage('删除失败');
        }
    }


    /**
     * ---------------------------------------------------
     * 用户与角色关联编辑
     * @param null $id
     * ---------------------------------------------------
     */
    function system_role($id = null)
    {

        $this->load->bll('user_bll');
        $user = $this->user_bll->get_user_by_id($id);
        if (!$user) {
            show_message('获取用户失败');
        }
        $data['user'] = $user;
        $data['roles'] = $this->user_bll->get_role_list();
        $this->view( '/admin/public/pager_header');
        $this->view('/admin/index/system_role', $data);
        $this->view( '/admin/public/pager_footer');
    }

    function system_role_act()
    {

        $this->load->bll('user_bll');
        $role_id = $this->input->post('role_id');
        $user_id = $this->input->post('user_id');
        $r = $this->user_bll->user_role_edit($user_id, $role_id);
        if ($r) {
            showmessage('用户角色编辑成功', for_url( 'admin','role','system_role', array($user_id) ));
        } else {
            showmessage('用户角色编辑失败');
        }
    }

    /**
     * ---------------------------------------------------
     * 权限编辑
     * @param null $id
     * ---------------------------------------------------
     */
    function role_access($id = null)
    {

        $this->load->bll('system_bll');
        $this->load->bll('user_bll');
        $r = $this->system_bll->get_system_tree_list();
        //获取当前角色
        $this->BLL('system_bll');
        if (($user = $this->user_bll->get_role_by_id($id)) == false) {
            showmessage('出错了');
        }
        $data['current_sys'] = $this->system_bll->get_sys_by_role_id($id);
        $data['role'] = $user;
        $data['syslist'] = $r;
        $data['role_id'] = $id;

        $this->view( '/admin/public/pager_header');
        $this->view('/admin/index/system_access', $data);
        $this->view( '/admin/public/pager_footer');
    }

    function role_access_act()
    {

        $this->load->bll('system_bll');
        $sys = $this->input->post('sys');
        $role_id = $this->input->post('role_id');
        $r = $this->system_bll->system_role_edit($sys, $role_id);
        if ($r) {
            showmessage('权限编辑成功', for_url('admin','role','role_access', array($role_id)));
        } else {
            showmessage('权限编辑失败');
        }
    }
}