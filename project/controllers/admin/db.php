<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Db extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
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
        $data['current_pos'] = $this->current_pos();
        $this->view('/admin/public/pager_header');
        $this->view('/admin/index/system_sqldump', $data);
        $this->view('/admin/public/pager_footer');
    }

    function restoresql_act($sql)
    {
        $this->load->bll('system_bll');
        $r = $this->system_bll->restore_back($sql);

        if ($r) {
            showmessage('恢复数据成功', for_url('admin', 'db', 'dumpsql'));
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
}