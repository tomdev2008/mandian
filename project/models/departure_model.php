<?php
/**
 * 用户表
 * liner: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class Departure_model extends CI_Model
{

    var $title = '';
    var $content = '';
    var $date = '';

    function __construct()
    {
        parent::__construct();
    }

    function get_branch_list()
    {
        $this->db->select('*');
        $this->db->from('crm_branch');
        $this->db->order_by("branch_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_departure_list($branch_id = null){
        if(empty($branch_id))
        {
            return array();
        }
        $this->db->select('*');
        $this->db->where("branch_id", $branch_id);
        $this->db->from('crm_departure');
        $this->db->order_by("departure_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function search_place($val = null)
    {
        if(empty($val))
        {
            return array();
        }
        $this->db->select('place_id,place_name');
        $this->db->like('place_name', $val, 'after');
        $this->db->from('crm_place');
        $this->db->order_by("place_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
}