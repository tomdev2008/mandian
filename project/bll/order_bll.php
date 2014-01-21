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


    function update($post = array())
    {
        return $this->order_model->update($post);
    }

    /**
     * 订单数据
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_list($page = null, $rows = null, $order_num = null, $pro_name = null, $order_state = null, $contact_name = null, $start_time = null, $end_time = null)
    {
        return $this->order_model->get_list($page, $rows, $order_num, $pro_name, $order_state, $contact_name, $start_time, $end_time);
    }

    function get_list_count($order_num = null, $pro_name = null, $order_state = null, $contact_name = null, $start_time = null, $end_time = null)
    {
        return $this->order_model->get_list_count($order_num, $pro_name, $order_state, $contact_name, $start_time, $end_time);
    }

    function get_by_id($order_id = null)
    {
        if (empty($order_id)) {
            return false;
        }
        return $this->order_model->get_by_id($order_id);
    }

    function get_order_users_id($id = null)
    {
        if (empty($id)) {
            return false;
        }
        return $this->order_model->get_order_users_id($id);
    }


    /**
     * 获取订单游客信息
     * @param null $order_id
     * @return bool
     */
    function get_user_by_id($id = null)
    {
        if (empty($id)) {
            return false;
        }
        return $this->order_model->get_user_by_id($id);
    }

    function insert_user($post = array())
    {
        return $this->order_model->insert_user($post);
    }

    function save_user($post = array())
    {
        return $this->order_model->save_user($post);
    }

    function del_user($id = null)
    {
        if (empty($id)) {
            return false;
        }
        return $this->order_model->del_user($id);
    }

    /**
     * 结算单
     * @param null $page
     * @param null $rows
     * @return mixed
     */
    function get_settlements_list($page = null, $rows = null)
    {
        return $this->order_model->get_settlements_list($page, $rows);
    }

    function get_settlements_list_count()
    {
        return $this->order_model->get_settlements_list_count();
    }

    function get_settlements_by_id($id = null)
    {
        if (empty($id)) {
            return false;
        }
        return $this->order_model->get_settlements_by_id($id);
    }

    function get_settlements_by_order_id($id = null)
    {
        if (empty($id)) {
            return false;
        }
        return $this->order_model->get_settlements_by_order_id($id);
    }

    function settlements_del($id = null)
    {
        if (empty($id)) {
            return false;
        }
        return $this->order_model->settlements_del($id);
    }

    function save_settlements($post = array())
    {
        if(empty($post['settlement_id'])){
            return $this->order_model->insert_settlements($post);
        }else{
            return $this->order_model->save_settlements($post);
        }
    }
    /**
     * 获取供应商
     * @param null $id
     * @return bool
     */
    function get_supplier_by_id($id = null)
    {
        if (empty($id)) {
            return false;
        }
        return $this->order_model->get_supplier_by_id($id);
    }

    function save_supplier($post = array())
    {
        if(empty($post['supplier_id'])){
            return $this->order_model->insert_supplier($post);
        }else{
            return $this->order_model->save_supplier($post);
        }
    }
}