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

    function get_list($page = null, $rows = null)
    {
        $this->db->select('crm_product.pro_name,crm_trip.set_out_time,crm_order.*');
        $this->db->from('crm_order');
        if(!empty($rows) && !empty($rows)){
            $page = ($page <= 1) ?1 :$page ;
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

    function get_list_count()
    {
        $this->db->select('count(*) as acount');
        $this->db->where("enabled", 1);
        $this->db->from('crm_order');
        $query = $this->db->get();
        $r = $query->row_array();
        return $r['acount'];
    }












}