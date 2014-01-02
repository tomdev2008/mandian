<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Plane extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * ---------------------------------------------------
     * 酒店管理
     * ---------------------------------------------------
     */
    public function index()
    {
        $this->load->bll('plane_bll');
        //用户权限验证
        $page = intval($this->input->get_post('p'));
        $rows = 20;
        $r['rows'] = $this->plane_bll->get_list($page, $rows);
        $r['total'] = ceil( $this->plane_bll->get_list_count() / $rows);

        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/plane/index', $r);
        $this->view( '/admin/public/pager_footer');
    }

    public function edit($id = null)
    {
        $data = array();
        if (!empty($id)) {
            $this->load->bll('plane_bll');
            $plane = $this->plane_bll->get_by_id($id);
            $data['data'] = $plane;
        }
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/plane/edit', $data);
        $this->view( '/admin/public/pager_footer');

    }

    public function save()
    {
        $plane = $this->input->post('plane');

        $this->load->bll('plane_bll');
        if (empty($plane['plane_id'])) {
            $r = $this->plane_bll->insert($plane);
        } else {
            $r = $this->plane_bll->update($plane);
        }
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}') ;
        } else {
            exit('{"state":false,"msg":"保存失败"}') ;
        }
    }

    public function del($id = null)
    {
        $this->load->bll('plane_bll');
        if (!empty($id)) {
            $r = $this->plane_bll->del($id);
        }
        if ($r) {
            showmessage('删除成功',for_url('admin','plane','index'));
        } else {
            showmessage('删除失败');
        }
    }
}