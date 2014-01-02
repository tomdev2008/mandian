<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Liner extends CI_Admin
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
        $this->load->bll('liner_bll');
        //用户权限验证
        $page = intval($this->input->get_post('p'));
        $rows = 20;
        $r['rows'] = $this->liner_bll->get_list($page, $rows);
        $r['total'] = ceil( $this->liner_bll->get_list_count() / $rows);

        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/liner/index', $r);
        $this->view( '/admin/public/pager_footer');
    }

    public function edit($id = null)
    {
        $data = array();
        $this->load->bll('liner_bll');
        //获取游轮公司
        $liner_company = $this->liner_bll->get_company_list();
        $data['liner_company'] = $liner_company;
        if (!empty($id)) {
            $liner = $this->liner_bll->get_by_id($id);
            $data['data'] = $liner;
        }
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/liner/edit', $data);
        $this->view( '/admin/public/pager_footer');

    }

    public function save()
    {
        $liner = $this->input->post('liner');
        $liner['first_date'] = strtotime($liner['first_date']);

        $this->load->bll('liner_bll');
        if (empty($liner['liner_id'])) {
            $r = $this->liner_bll->insert($liner);
        } else {
            $r = $this->liner_bll->update($liner);
        }
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}') ;
        } else {
            exit('{"state":false,"msg":"保存失败"}') ;
        }
    }

    /**
     * ----------------------------------------------
     * 房间管理
     * @param null $liner_id
     * ----------------------------------------------
     */
    function room_list($liner_id = null){
        if(empty($liner_id)){
            showmessage('出错了');
        }
        $this->load->bll('liner_bll');
        $data['liner_id'] = $liner_id;
        $data['rows'] = $this->liner_bll->get_room_list($liner_id);
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/liner/room_list', $data);
        $this->view( '/admin/public/pager_footer');
    }

    public function room_edit($id = null)
    {
        $data = array();
        $this->load->bll('liner_bll');
        //获取游轮公司
        $data['liner_id'] = $id;
        if (!empty($id)) {
            $liner = $this->liner_bll->get_room_by_id($id);
            $data['data'] = $liner;
        }
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/liner/room_edit', $data);
        $this->view( '/admin/public/pager_footer');

    }

    public function save_room()
    {
        $liner = $this->input->post('liner');

        $this->load->bll('liner_bll');
        if (empty($liner['liner_room_id'])) {
            $r = $this->liner_bll->insert_room($liner);
        } else {
            $r = $this->liner_bll->update_room($liner);
        }
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}') ;
        } else {
            exit('{"state":false,"msg":"保存失败"}') ;
        }
    }

    public function del_room($liner_id = null, $id = null)
    {
        $this->load->bll('liner_bll');
        if (!empty($id)) {
            $r = $this->liner_bll->del_room($id);
        }
        if ($r) {
            showmessage('删除成功',for_url('admin','liner','room_list', array($liner_id)));
        } else {
            showmessage('删除失败');
        }
    }



    /**
     * ----------------------------------------------
     * 公司管理
     * @param null $liner_id
     * ----------------------------------------------
     */
    public function com_save()
    {
        $com_name = $this->input->post('com_name');
        $this->load->bll('liner_bll');
        $r = $this->liner_bll->insert_com($com_name);
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}') ;
        } else {
            exit('{"state":false,"msg":"保存失败"}') ;
        }
    }

    public function del($id = null)
    {
        $this->load->bll('liner_bll');
        if (!empty($id)) {
            $r = $this->liner_bll->del($id);
        }
        if ($r) {
            showmessage('删除成功',for_url('admin','liner','index'));
        } else {
            showmessage('删除失败');
        }
    }
}