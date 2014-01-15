<?php

/**
 * User: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */
class Order_model extends CI_Model
{

    var $title = '';
    var $content = '';
    var $date = '';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * -----------------------------------------------
     * 订单获取
     * @param null $page
     * @param null $rows
     * @param null $order_num
     * @param null $pro_name
     * @param null $order_state
     * @param null $contact_name
     * @param null $start_time
     * @param null $end_time
     * @return mixed
     * -----------------------------------------------
     */
    function get_list($page = null, $rows = null, $order_num = null, $pro_name = null, $order_state = null, $contact_name = null, $start_time = null, $end_time = null)
    {
        if (!empty($order_num)) {
            $this->db->where("crm_order.order_num", $order_num);
        }
        if (!empty($pro_name)) {
            $this->db->like("crm_product.pro_name", $pro_name);
        }
        if (!empty($order_state)) {
            $this->db->where("crm_order.order_state", $order_state);
        }
        if (!empty($contact_name)) {
            $this->db->like("crm_order.contact_name", $contact_name);
        }
        if (!empty($start_time)) {
            $this->db->where("crm_order.add_time >=", strtotime($start_time));
        }
        if (!empty($end_time)) {
            $this->db->where("crm_order.add_time <=", strtotime($end_time));
        }

        $this->db->select('crm_product.pro_name,crm_trip.set_out_time,crm_order.*');
        $this->db->from('crm_order');
        if (!empty($rows) && !empty($rows)) {
            $page = ($page <= 1) ? 1 : $page;
            $offset = ($page - 1) * $rows;
            $this->db->limit($rows, $offset);
        }
        $this->db->join('crm_product', 'crm_product.pro_id = crm_order.pro_id', 'left');
        $this->db->join('crm_trip', 'crm_trip.trip_id = crm_order.trip_id', 'left');
        $this->db->where("crm_order.enabled", 1);
        $this->db->order_by("crm_order.add_time", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_list_count($order_num = null, $pro_name = null, $order_state = null, $contact_name = null, $start_time = null, $end_time = null)
    {
        if (!empty($order_num)) {
            $this->db->where("crm_order.order_num", $order_num);
        }
        if (!empty($pro_name)) {
            $this->db->like("crm_product.pro_name", $pro_name);
        }
        if (!empty($order_state)) {
            $this->db->where("crm_order.order_state", $order_state);
        }
        if (!empty($contact_name)) {
            $this->db->like("crm_order.contact_name", $contact_name);
        }
        if (!empty($start_time)) {
            $this->db->where("crm_order.add_time >=", strtotime($start_time));
        }
        if (!empty($end_time)) {
            $this->db->where("crm_order.add_time <=", strtotime($end_time));
        }

        $this->db->select('count(*) as acount');
        $this->db->from('crm_order');
        $this->db->join('crm_product', 'crm_product.pro_id = crm_order.pro_id', 'left');
        $this->db->join('crm_trip', 'crm_trip.trip_id = crm_order.trip_id', 'left');
        $this->db->where("crm_order.enabled", 1);
        $this->db->order_by("crm_order.add_time", "desc");
        $query = $this->db->get();
        $r = $query->row_array();
        return $r['acount'];
    }

    function get_by_id($order_id = null)
    {
        if (empty($order_id)) {
            return false;
        }

        $this->db->select('crm_product.*,crm_trip.set_out_time,crm_order.*');
        $this->db->from('crm_order');
        $this->db->join('crm_product', 'crm_product.pro_id = crm_order.pro_id', 'left');
        $this->db->join('crm_trip', 'crm_trip.trip_id = crm_order.trip_id', 'left');
        $this->db->where("crm_order.order_id", $order_id);
        $this->db->where("crm_order.enabled", 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    /**
     * 获取订单游客信息
     * @param null $order_id
     * @return bool
     */
    function get_order_users_id($order_id = null){
        if (empty($order_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from('crm_order_user_infor');
        $this->db->where("order_id", $order_id);
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }


    function update($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'order_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('order_id', $post['order_id']);
        return $this->db->update('crm_order', $data);
    }

    /**
     * 获取订单游客信息
     * @param null $order_id
     * @return bool
     */
    function get_user_by_id($id = null){
        if(empty($id))
        {
            return false;
        }
        $this->db->select('*');
        $this->db->from('crm_order_user_infor');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function insert_user($post = array())
    {

        foreach ($post as $key => $val) {
            if ($key != 'id') {
                $data[$key] = $val;
            }
        }
        return $this->db->insert('crm_order_user_infor', $data);
    }

    function save_user($post = array())
    {

        foreach ($post as $key => $val) {
            if ($key != 'id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('id', $post['id']);
        return $this->db->update('crm_order_user_infor', $data);
    }

    function del_user($id = null){
        if(empty($id))
        {
            return false;
        }
        return $this->db->delete('crm_order_user_infor', array('id' => intval($id)));
    }
}