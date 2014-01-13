<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Traffic extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * ---------------------------------------------------
     * 火车车次管理
     * ---------------------------------------------------
     */
    public function train()
    {
        $this->load->bll('traffic_bll');
        //用户权限验证
        $page = intval($this->input->get_post('p'));
        $rows = 20;
        $r['rows'] = $this->traffic_bll->get_train_list($page, $rows);
        $r['total'] = ceil( $this->traffic_bll->get_train_list_count() / $rows);

        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/traffic/train', $r);
        $this->view( '/admin/public/pager_footer');
    }

    public function train_edit($id = null)
    {
        $data = array();
        if (!empty($id)) {
            $this->load->bll('traffic_bll');
            $plane = $this->traffic_bll->get_train_by_id($id);
            $data['data'] = $plane;
        }
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/traffic/train_edit', $data);
        $this->view( '/admin/public/pager_footer');

    }

    public function train_save()
    {
        $plane = $this->input->post('plane');

        $this->load->bll('traffic_bll');
        if (empty($plane['train_id'])) {
            $r = $this->traffic_bll->insert_train($plane);
        } else {
            $r = $this->traffic_bll->update_train($plane);
        }
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}') ;
        } else {
            exit('{"state":false,"msg":"保存失败"}') ;
        }
    }

    public function train_del($id = null)
    {
        $this->load->bll('traffic_bll');
        if (!empty($id)) {
            $r = $this->traffic_bll->del_train($id);
        }
        if ($r) {
            showmessage('删除成功',for_url('admin','traffic','train'));
        } else {
            showmessage('删除失败');
        }
    }

    /**
     * ---------------------------------------------------
     * 酒店管理
     * ---------------------------------------------------
     */
    public function plane()
    {
        $this->load->bll('traffic_bll');
        //用户权限验证
        $page = intval($this->input->get_post('p'));
        $rows = 20;
        $r['rows'] = $this->traffic_bll->get_list($page, $rows);
        $r['total'] = ceil( $this->traffic_bll->get_list_count() / $rows);

        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/traffic/index', $r);
        $this->view( '/admin/public/pager_footer');
    }

    public function edit($id = null)
    {
        $data = array();
        if (!empty($id)) {
            $this->load->bll('traffic_bll');
            $plane = $this->traffic_bll->get_by_id($id);
            $data['data'] = $plane;
        }
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/traffic/edit', $data);
        $this->view( '/admin/public/pager_footer');

    }

    public function save()
    {
        $plane = $this->input->post('plane');

        $this->load->bll('traffic_bll');
        if (empty($plane['plane_id'])) {
            $r = $this->traffic_bll->insert($plane);
        } else {
            $r = $this->traffic_bll->update($plane);
        }
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}') ;
        } else {
            exit('{"state":false,"msg":"保存失败"}') ;
        }
    }

    public function del($id = null)
    {
        $this->load->bll('traffic_bll');
        if (!empty($id)) {
            $r = $this->traffic_bll->del($id);
        }
        if ($r) {
            showmessage('删除成功',for_url('admin','traffic','plane'));
        } else {
            showmessage('删除失败');
        }
    }
}