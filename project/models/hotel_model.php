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
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_hotel_list_count()
    {
        $this->db->select('count(*) as acount');
        $this->db->from('crm_hotel');
        $query = $this->db->get();
        $r = $query->row_array();
        return $r['acount'];
    }

    function get_hotel_by_id($id = null)
    {
        $this->db->where('hotel_id', intval($id));
        $this->db->select('*');
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
        $time = time();
        $data = array(
            'email' => '',
            'hotel_name' => '',
            'password' => '',
            'question' => '',
            'answer' => '',
            'sex' => 0,
            'birthday' => date('Y-m-d', $time),
            'address_id' => 0,
            'reg_time' => date('Y-m-d H:i:s', $time),
            'last_login' => 0,
            'last_time' => '',
            'last_ip' => '',
            'visit_count' => 0,
            'is_special' => 0,
            'msn' => '',
            'qq' => '',
            'office_phone' => '',
            'home_phone' => '',
            'mobile_phone' => '',
            'is_validated' => 0,
            'passwd_question' => '',
            'passwd_answer' => '',
            'enabled' => 1,
        );

        foreach ($post as $key => $val) {
            if (isset($data[$key])) {
                $data[$key] = $val;
            }
        }
        return $this->db->insert('crm_hotels', $data);
    }

    function save_hotel($post = array())
    {

        foreach ($post as $key => $val) {
            if ($key != 'hotel_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('hotel_id', $post['hotel_id']);
        return $this->db->update('crm_hotels', $data);
    }

    public function del_hotel($id = null){
        return $this->db->delete('crm_hotels', array('hotel_id' => intval($id)));
    }

}