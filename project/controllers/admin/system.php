<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class System extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 站点设置
     */
    function site_setting()
    {
        $this->load->bll('system_bll');
        $r['data'] = $this->system_bll->get_site_setting();
        $this->view('/admin/public/pager_header');
        $this->view('/admin/index/site_setting', $r);
        $this->view('/admin/public/pager_footer');
    }

    function save_site_setting()
    {
        $this->load->bll('system_bll');
        $system = $this->input->post('system');
        $r = $this->system_bll->set_site_setting($system);
        if ($r) {
            showmessage('站点设置成功', for_url('admin', 'system', 'site_setting'));
        } else {
            showmessage('站点设置失败');
        }
    }

    function site_setting_cache()
    {
        $this->load->helper('file');
        $this->load->bll('system_bll');
        $r = $this->system_bll->site_setting_cache();
        if ($r) {
            showmessage('缓存成功', for_url('admin', 'system', 'site_setting'));
        } else {
            showmessage('缓存失败');
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

    public function system_list_json()
    {
        header("Content-type: application/json");
        $this->lib('json');
        $this->load->bll('system_bll');
        $r = $this->system_bll->get_system_tree_list();
        $r = $this->json->encode($r);
        exit($r);
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
            showmessage('模块保存成功', for_url('admin', 'system', 'system_list'));
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
            showmessage('模块删除成功', for_url('admin', 'system', 'system_list'));
        } else {
            showmessage('模块删除失败');
        }
    }

    /**
     * 系统日志
     */
    function system_log()
    {
        $this->load->bll('system_bll');
        $page = $this->input->get_post('p');
        $date = $this->input->get_post('date');
        $rows = 20;
        $r['date'] = $date;
        $r['rows'] = $this->system_bll->get_log_list($page, $rows, $date);
        $r['total'] = ceil($this->system_bll->get_log_list_count() / $rows);
        $this->view('/admin/public/pager_header');
        $this->view('/admin/index/system_log', $r);
        $this->view('/admin/public/pager_footer');
    }

    function system_log_clear()
    {
        $this->load->bll('system_bll');
        $r = $this->system_bll->system_log_clear();
        if ($r) {
            showmessage('日志清空成功', for_url('admin', 'system', 'system_log'));
        } else {
            showmessage('日志清空失败');
        }
    }

}