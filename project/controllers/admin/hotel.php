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
        $ids = $this->input->get_post('$ids');
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
}