<?php
/**
 * 用户表
 * hotel: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class Hotel_model extends CI_Model
{

    var $title = '';
    var $content = '';
    var $date = '';

    function __construct()
    {
        parent::__construct();
    } 

    /**
     * 用户
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_hotel_list($page = null, $rows = null)
    {
        $this->db->select('*');
        $this->db->from('crm_hotel');
        if(!empty($rows) && !empty($rows)){
            $page = ($page <= 1) ?1 :$page ;
            $offset = ($page - 1) * $rows;
            $this->db->limit($rows, $offset);
        }
        $this->db->where("hotel_enabled", 1);
        $this->db->order_by("hotel_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_hotel_list_count()
    {
        $this->db->select('count(*) as acount');
        $this->db->where("hotel_enabled", 1);
        $this->db->from('crm_hotel');
        $query = $this->db->get();
        $r = $query->row_array();
        return $r['acount'];
    }

    function get_hotel_by_id($id = null)
    {
        $this->db->where('hotel_id', intval($id));
        $this->db->select('*');
        $this->db->where("hotel_enabled", 1);
        $this->db->from('crm_hotel');
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_hotel($hotel_name = null, $pwd = null){
        if(empty($hotel_name)){
            return false;
        }
        $this->db->where('hotel_name', $hotel_name);
        $this->db->where('password', $pwd);
        $this->db->select('*');
        $this->db->join('crm_roles', 'crm_roles.role_id = crm_hotels.role_id', 'left');
        $this->db->from('crm_hotels');
        $query = $this->db->get();
        return $query->row_array();
    }

    function insert_hotel($post = array())
    {

        foreach ($post as $key => $val) {
            if ($key != 'hotel_id') {
                $data[$key] = $val;
            }
        }
        return $this->db->insert('crm_hotel', $data);
    }

    function update_hotel($post = array())
    {

        foreach ($post as $key => $val) {
            if ($key != 'hotel_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('hotel_id', $post['hotel_id']);
        return $this->db->update('crm_hotel', $data);
    }

    public function del_hotel($id = null){
        $this->db->where('hotel_id', intval($id));
        $data['hotel_enabled'] = 0;
        return $this->db->update('crm_hotel', $data);
        //return $this->db->delete('crm_hotel', array('hotel_id' => intval($id)));
    }

}