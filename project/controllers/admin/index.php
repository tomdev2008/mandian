<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * ---------------------------------------------------
     * 用户管理
     * ---------------------------------------------------
     */
    public function user_list()
    {
        $this->load->bll('user_bll');
        //用户权限验证
        $page = $this->input->get_post('p');
        $rows = 20;
        $r['rows'] = $this->user_bll->get_user_list($page, $rows);
        $r['total'] = ceil( $this->user_bll->get_user_list_count() / $rows);

        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/index/user_list', $r);
        $this->view( '/admin/public/pager_footer');
    }

    public function user_add()
    {

        $user = array('user_id' => '', 'user_name' => '', 'password' => '', 'email' => '', 'enabled' => 1);
        $data['data'] = $user;
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/index/user_edit', $data);
        $this->view( '/admin/public/pager_footer');
    }

    public function user_edit($id = null)
    {
        $this->load->bll('user_bll');
        $user = $this->user_bll->get_user_by_id($id);
        if ($user) {
            $data['data'] = $user;
            $this->view( '/admin/public/pager_header');
            $this->view( '/admin/index/user_edit', $data);
            $this->view( '/admin/public/pager_footer');
        } else {
            showmessage('获取用户失败');
        }

    }

    public function user_save()
    {
        $this->load->bll('user_bll');
        $user = $this->input->post('user');
        if (empty($user['user_id'])) {
            if (empty($user['user_name']) || empty($user['password'])) {
                showmessage('用户名、密码不能为空');
            }
        } else {
            if (empty($user['user_name'])) {
                showmessage('用户名不能为空');
            }
        }

        if (empty($user['user_id'])) {
            $r = $this->user_bll->insert_user($user);
        } else {
            $r = $this->user_bll->save_user($user);
        }
        if ($r) {
            showmessage('用户保存成功',for_url('admin','index','user_list'));
        } else {
            showmessage('用户保存失败');
        }
    }

    public function user_del($id = null)
    {
        $this->load->bll('user_bll');
        if (!empty($id)) {
            $r = $this->user_bll->del_user($id);
        }
        if ($r) {
            showmessage('用户删除成功',for_url('admin','index','user_list'));
        } else {
            showmessage('用户删除失败');
        }
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
            showmessage('角色保存成功', for_url('admin','index','role_list'));
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
            showmessage('删除成功', for_url('admin','index','role_list'));
        } else {
            showmessage('删除失败');
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
            showmessage('权限编辑成功', for_url('admin','index','role_access', array($role_id)));
        } else {
            showmessage('权限编辑失败');
        }
    }

    /**
     * ---------------------------------------------------
     * 角色编辑
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
            showmessage('用户角色编辑成功', for_url( 'admin','index','system_role', array($user_id) ));
        } else {
            showmessage('用户角色编辑失败');
        }
    }

    /**
     * ---------------------------------------------------
     * 系统管理
     * ---------------------------------------------------
     */
    public function system_list()
    {
        $this->load->bll('system_bll');

        $r['data'] = $this->system_bll->get_system_tree_list();
        $this->view('/admin/public/pager_header');
        $this->view('/admin/index/system_list', $r);
        $this->view('/admin/public/pager_footer');
    }

    public function system_add()
    {

        $this->load->bll('system_bll');
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
        $this->view('/admin/public/pager_header');
        $this->view('/admin/index/system_edit', $data);
        $this->view('/admin/public/pager_footer');
    }

    public function system_edit($id = null)
    {

        $this->load->bll('system_bll');
        $user = $this->system_bll->get_system_by_id($id);
        if ($user) {
            $data['data'] = $user;
            $data['syslist'] = $this->system_bll->get_system_list(array('sys_parent_id' => 0));
            $this->view('/admin/public/pager_header');
            $this->view('/admin/index/system_edit', $data);
            $this->view('/admin/public/pager_footer');
        } else {
            showmessage('获取模块失败');
        }

    }

    public function system_save()
    {

        $this->load->bll('system_bll');
        $system = $this->input->post('system');
        if (empty($system['sys_name'])) {
            showmessage('模块名不能为空');
        }

        if (empty($system['sys_id'])) {
            $r = $this->system_bll->insert_system($system);
        } else {
            $r = $this->system_bll->save_system($system);
        }
        if ($r) {
            showmessage('模块保存成功', for_url('admin','index','system_list'));
        } else {
            showmessage('模块保存失败');
        }
    }

    public function system_del($id = null)
    {
        $this->load->bll('system_bll');

        if (!empty($id)) {
            $r = $this->system_bll->del_system($id);
        }
        if ($r) {
            show_message('模块删除成功', for_url('admin','index','system_list'));
        } else {
            show_message('模块删除失败');
        }
    }


    /**
     * ---------------------------------------------------
     * 数据库操作 备份 恢复
     * ---------------------------------------------------
     */
    function dumpsql()
    {
        $this->load->bll('system_bll');
        $data['type'] = 'backup';
        $data['file_list'] = $this->system_bll->get_backup_list();
        $this->view('/admin/public/pager_header');
        $this->view('/admin/index/system_sqldump', $data);
        $this->view('/admin/public/pager_footer');
    }

    function restoresql_act($sql)
    {
        $this->load->bll('system_bll');
        $r = $this->system_bll->restore_back($sql);

        if ($r) {
            showmessage('恢复数据成功', for_url('admin', 'index', 'dumpsql'));
        } else {
            showmessage('恢复数据失败');
        }

    }

    function system_sqldump_act()
    {

        $this->load->bll('system_bll');
        $dump = $this->input->post('dump');
        $this->system_bll->backup($dump);
        showmessage('备份数据库成功', for_url('admin', 'index', 'dumpsql'));

    }

    /**
     * ---------------------------------------------------
     * 视图
     * ---------------------------------------------------
     */
    function index(){
        $this->view('/admin/public/index');
    }
    function home(){
        $this->view('/admin/public/home');
    }
    function top(){
        $data['user_name'] = $this->session->userdata('user_name');
        $data['role_name'] = $this->session->userdata('role_name');
        $this->view('/admin/public/top',$data);
    }
    function left(){
        $this->view('/admin/public/left');
    }

    function get_admin_menu(){
        $r = parent::admin_menu();
        $this->lib('json');
        exit($this->json->encode($r));
    }


    /**
     * ---------------------------------------------------
     * 登陆 注销登陆 操作
     * ---------------------------------------------------
     */
    public function login()
    {
        $this->view();
    }
    function logout()
    {
        $this->load->bll('user_bll');
        $this->user_bll->logout();
        showmessage('登录退出，正在跳转……', for_url('admin', 'index', 'login'));
    }
    public function login_act()
    {
        $this->load->bll('user_bll');
        $user_name = $this->input->get_post('user_name');
        $password = $this->input->get_post('password');
        if (empty($user_name) || empty($password)) {
            showmessage('用户名、密码不能为空');
        }
        $r = $this->user_bll->login($user_name, $password);
        if (!$r) {
            showmessage('登录失败，请重新登录。');
        }
        showmessage('登录成功，正在跳转……', for_url('admin', 'index', 'index'));
    }
}