<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends CI_Admin
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
        $this->load->bll('hotel_bll');
        //用户权限验证
        $page = intval($this->input->get_post('p'));
        $rows = 20;
        $r['rows'] = $this->hotel_bll->get_hotel_list($page, $rows);
        $r['total'] = ceil( $this->hotel_bll->get_hotel_list_count() / $rows);
        $r['current_pos'] = $this->current_pos();

        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/hotel/index', $r);
        $this->view( '/admin/public/pager_footer');
    }

    public function edit($id = null)
    {
        $data = array();
        if (!empty($id)) {
            $this->load->bll('hotel_bll');
            $hotel = $this->hotel_bll->get_hotel_by_id($id);
            $data['data'] = $hotel;
            $data['current_pos'] = $this->current_pos();

        }
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/hotel/edit', $data);
        $this->view( '/admin/public/pager_footer');

    }

    public function save()
    {
        $hotel = $this->input->post('hotel');
        $hotel['hotel_specifics'] = implode(',', $hotel['hotel_specifics']);

        $this->load->bll('hotel_bll');
        if (empty($hotel['hotel_id'])) {
            $r = $this->hotel_bll->insert_hotel($hotel);
        } else {
            $r = $this->hotel_bll->update_hotel($hotel);
        }
        if ($r) {
            exit('{"state":true,"msg":"酒店保存成功"}') ;
        } else {
            exit('{"state":false,"msg":"酒店保存失败"}') ;
        }
    }

    public function del($id = null)
    {
        $this->load->bll('hotel_bll');
        if (!empty($id)) {
            $r = $this->hotel_bll->del_hotel($id);
        }
        if ($r) {
            showmessage('删除成功',for_url('admin','hotel','index'));
        } else {
            showmessage('删除失败');
        }
    }
}