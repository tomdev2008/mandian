<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->bll('order_bll');
        $page = intval($this->input->get_post('p'));
        $rows = 20;

        //... 筛选条件
        $order_info = $this->input->get_post('order');
        $r['filter'] = $order_info;
        $r['rows'] = $this->order_bll->get_list($page, $rows, $order_info['order_num'], $order_info['pro_name'], $order_info['order_state'], $order_info['contact_name'], $order_info['start_time'], $order_info['end_time']);
        $r['total'] = ceil( $this->order_bll->get_list_count($order_info['order_num'], $order_info['pro_name'], $order_info['order_state'], $order_info['contact_name'], $order_info['start_time'], $order_info['end_time']) / $rows);
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/order/index', $r);
        $this->view( '/admin/public/pager_footer');
    }

    function detail($order_id = null)
    {
        if (empty($order_id)) {
            showmessage('出错了');
        }
        $this->load->bll('order_bll');
        $order = $this->order_bll->get_by_id($order_id);
        $order_users = $this->order_bll->get_order_users_id($order_id);
        $data['order_id'] = $order_id;
        $data['order'] = $order;
        $data['order_users'] = $order_users;
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/order/detail', $data);
        $this->view( '/admin/public/pager_footer');
    }

    function edit($order_id = null)
    {
        if (empty($order_id)) {
            showmessage('出错了');
        }
        $this->load->bll('order_bll');
        $data['data'] = $this->order_bll->get_by_id($order_id);
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/order/edit', $data);
        $this->view( '/admin/public/pager_footer');
    }

    public function save()
    {
        $order = $this->input->post('order');
        $this->load->bll('order_bll');
        $r = $this->order_bll->update($order);
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}') ;
        } else {
            exit('{"state":false,"msg":"保存失败"}') ;
        }
    }

    /**
     * ------------------------------
     * 旅客信息修改
     * @param null $order_id
     * ------------------------------
     */
    function user_edit($order_id = null,$user_id = null)
    {
        if (empty($order_id)) {
            showmessage('出错了');
        }
        $data['data']['order_id'] = $order_id;
        $this->load->bll('order_bll');
        if (!empty($user_id)) {
            $data['data'] = $this->order_bll->get_user_by_id($user_id);
        }
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/order/edit_user', $data);
        $this->view( '/admin/public/pager_footer');
    }

    public function user_save()
    {
        $order = $this->input->post('order');
        $this->load->bll('order_bll');
        if (empty($order['id'])) {
            $r = $this->order_bll->insert_user($order);
        } else {
            $r = $this->order_bll->save_user($order);
        }
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}') ;
        } else {
            exit('{"state":false,"msg":"保存失败"}') ;
        }
    }

    public function user_del( $order_id = null, $id = null)
    {
        if (empty($id) || empty($order_id)) {
            showmessage('出错了');
        }
        $this->load->bll('order_bll');
        $r = $this->order_bll->del_user($id);

        if ($r) {
            showmessage('删除成功',for_url('admin','order','detail', array($order_id)));
        } else {
            showmessage('删除失败',for_url('admin','order','detail', array($order_id)));
        }
    }


    /**
     * -----------------------------
     * 同行游客信息
     * -----------------------------
     */

    function insert_user($post = array())
    {
        return $this->_model->insert_user($post);
    }

    function save_user($post = array())
    {
        return $this->_model->save_user($post);
    }

    /**
     * -------------------------------
     * 常用报表
     * -------------------------------
     */
    function stat()
    {
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/order/stat');
        $this->view( '/admin/public/pager_footer');
    }
}