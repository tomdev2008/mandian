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
        $r['rows'] = $this->order_bll->get_list($page, $rows);
        $r['total'] = ceil( $this->order_bll->get_list_count() / $rows);
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/order/index', $r);
        $this->view( '/admin/public/pager_footer');
    }
}