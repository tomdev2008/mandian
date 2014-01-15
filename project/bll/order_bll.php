<?php
/**
 * 订单业务逻辑层
 * hotel: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class Order_bll extends CI_Bll
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
    }


    /**
     * 订单数据
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_list($page = null, $rows = null)
    {
        return $this->order_model->get_list($page, $rows);
    }

    function get_list_count()
    {
        return $this->order_model->get_list_count();
    }

}