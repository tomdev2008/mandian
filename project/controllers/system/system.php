<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class System extends CI_Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->BLL('system_bll');
        $this->is_login();
        $this->init_header();
    }

    public function index()
    {

    }

    function nav_tree()
    {
        $this->lib('json');
        $r = $this->system_bll->get_nav_tree_list();
        exit($this->json->encode($r));
    }

    function restoresql_act($sql)
    {
        $r = $this->system_bll->restore_back($sql);

        if ($r) {
            show_message('恢复数据成功', '点击跳转', for_url('system', 'system', 'dumpsql'));
        } else {
            show_message('恢复数据失败');
        }

    }

    /**
     * 数据库操作 备份
     */
    function dumpsql()
    {
        $this->is_valiate();
        $data['type'] = 'backup';
        $data['file_list'] = $this->system_bll->get_backup_list();
        $this->view('/system/public/pager_header', $this->_sys);
        $this->view('/system/system/system_sqldump', $data);
        $this->view('/system/public/pager_footer');
    }

    function system_sqldump_act()
    {

        $dump = $this->input->post('dump');
        $this->system_bll->backup($dump);
        show_message('备份数据库成功', '点击跳转', base_url() . '/system/system/dumpsql');

    }

    /**
     * 角色编辑
     * @param null $id
     */
    function system_role($id = null)
    {
        //用户权限验证
        $this->is_valiate();


        $this->BLL('user_bll');
        $user = $this->user_bll->get_user_by_id($id);
        if (!$user) {
            show_message('获取用户失败');
        }
        $data['user'] = $user;
        $data['roles'] = $this->user_bll->get_role_list();
        $this->view('/system/public/pager_header', $this->_sys);
        $this->view('/system/system/system_role', $data);
        $this->view('/system/public/pager_footer');
    }

    function system_role_act()
    {

        $this->BLL('user_bll');
        $role_id = $this->input->post('role_id');
        $user_id = $this->input->post('user_id');
        $r = $this->user_bll->user_role_edit($user_id, $role_id);
        if ($r) {
            show_message('用户角色编辑成功', '点击跳转', base_url() . '/system/system/system_role/' . $user_id);
        } else {
            show_message('用户角色编辑失败');
        }
    }


    /**
     * 权限编辑
     * @param null $id
     */
    function role_access($id = null)
    {
        //用户权限验证
        $this->is_valiate();

        $r = $this->system_bll->get_system_tree_list();
        //获取当前角色
        $this->BLL('system_bll');
        if (($user = $this->user_bll->get_role_by_id($id)) == false) {
            show_message('出错了');
        }
        $data['current_sys'] = $this->system_bll->get_sys_by_role_id($id);
        $data['role'] = $user;
        $data['syslist'] = $r;
        $data['role_id'] = $id;
        $this->view('/system/public/pager_header', $this->_sys);
        $this->view('/system/system/system_access', $data);
        $this->view('/system/public/pager_footer');
    }

    function role_access_act()
    {

        $sys = $this->input->post('sys');
        $role_id = $this->input->post('role_id');
        $r = $this->system_bll->system_role_edit($sys, $role_id);
        if ($r) {
            show_message('权限编辑成功', '点击跳转', base_url() . '/system/system/role_access/' . $role_id);
        } else {
            show_message('权限编辑失败');
        }
    }

    public function system_list_json()
    {
        $this->lib('json');
        $r = $this->system_bll->get_system_tree_list();
        exit($this->json->encode($r));
    }

    public function system_list()
    {
        //用户权限验证
        $this->is_valiate();

        $r['data'] = $this->system_bll->get_system_tree_list();
        $this->view('/system/public/pager_header', $this->_sys);
        $this->view('/system/system/system_list', $r);
        $this->view('/system/public/pager_footer');
    }

    public function system_add()
    {
        //用户权限验证
        $this->is_valiate();

        $user = array(
            'sys_parent_id' => '',
            'sys_name' => '',
            'sys_id' => '',
            'sys_module' => '',
            'sys_controller' => '',
            'sys_action' => '',
            'sys_order_id' => 0,
            'enabled' => 1,
            'visiabled' => 1
        );
        $data['data'] = $user;
        $data['syslist'] = $this->system_bll->get_system_list(array('sys_parent_id' => 0));
        $this->view('/system/public/pager_header', $this->_sys);
        $this->view('/system/system/system_edit', $data);
        $this->view('/system/public/pager_footer');
    }

    public function system_edit($id = null)
    {
        //用户权限验证
        $this->is_valiate();

        $user = $this->system_bll->get_system_by_id($id);
        if ($user) {
            $data['data'] = $user;
            $data['syslist'] = $this->system_bll->get_system_list(array('sys_parent_id' => 0));
            $this->view('/system/public/pager_header', $this->_sys);
            $this->view('/system/system/system_edit', $data);
            $this->view('/system/public/pager_footer');
        } else {
            show_message('获取模块失败');
        }

    }

    public function system_save()
    {

        $system = $this->input->post('system');
        if (empty($system['sys_name'])) {
            show_message('模块名不能为空');
        }

        if (empty($system['sys_id'])) {
            $r = $this->system_bll->insert_system($system);
        } else {
            $r = $this->system_bll->save_system($system);
        }
        if ($r) {
            show_message('模块保存成功', '点击跳转', base_url() . '/system/system/system_list');
        } else {
            show_message('模块保存失败');
        }
    }

    public function system_del($id = null)
    {
        //用户权限验证
        $this->is_valiate();

        if (!empty($id)) {
            $r = $this->system_bll->del_system($id);
        }
        if ($r) {
            show_message('模块删除成功', '点击跳转', base_url() . '/system/system/system_list');
        } else {
            show_message('模块删除失败');
        }
    }

}