<?php

/**
 * 用户表
 * liner: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */
class Product_model extends CI_Model
{

    var $title = '';
    var $content = '';
    var $date = '';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * 产品管理
     * @param array $post
     */
    function insert_product($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'pro_id') {
                $data[$key] = $val;
            }
        }
        $r = $this->db->insert('crm_product', $data);
        if ($r) {
            return $this->db->insert_id();
        }
        return $r;
    }

    function update_product($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'pro_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('pro_id', $post['pro_id']);
        return $this->db->update('crm_product', $data);
    }

    function get_list($page = null, $rows = null, $where = array())
    {
        $this->db->select('*');
        $this->db->from('crm_product');
        if (!empty($rows) && !empty($rows)) {
            $page = ($page <= 1) ? 1 : $page;
            $offset = ($page - 1) * $rows;
            $this->db->limit($rows, $offset);
        }

        if(!empty($where)){
            foreach($where as $key => $val){
                $this->db->where($key, $val);
            }
        }
        $this->db->where("enabled", 1);
        $this->db->order_by("pro_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_list_count($where = array())
    {
        $this->db->select('count(*) as acount');

        if(!empty($where)){
            foreach($where as $key => $val){
                $this->db->where($key, $val);
            }
        }
        $this->db->where("enabled", 1);
        $this->db->from('crm_product');
        $query = $this->db->get();
        $r = $query->row_array();
        return $r['acount'];
    }

    function get_by_id($id = null)
    {
        $this->db->where('pro_id', intval($id));
        $this->db->select('*');
        $this->db->where("enabled", 1);
        $this->db->from('crm_product');
        $query = $this->db->get();
        return $query->row_array();
    }

    function del($id = null)
    {
        $this->db->where('pro_id', intval($id));
        $data['enabled'] = 0;
        return $this->db->update('crm_product', $data);
    }

    /**
     * 产品图片
     * @param null $pro_id
     * @return bool
     */
    function del_product_imgs($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        return $this->db->delete('crm_product_image_list', array('pro_id' => intval($pro_id)));
    }

    function insert_product_imgs($img_id = null, $pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        $data = array(
            'attachment_id' => $img_id,
            'pro_id' => $pro_id,
        );
        $r = $this->db->insert('crm_product_image_list', $data);
        return $r;
    }

    function get_product_imgs($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->where('pro_id', intval($pro_id));
        $this->db->from('crm_product_image_list');
        $query = $this->db->get();
        return $query->result_array();
    }


    /**
     * ---------------------------------------
     * 线路管理
     * @param array $post
     * ---------------------------------------
     */
    function get_trips($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->where('pro_id', intval($pro_id));
        $this->db->from('crm_liner_trip');
        $this->db->order_by("liner_trip_id", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function insert_product_trip($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'liner_trip_id') {
                $data[$key] = $val;
            }
        }
        $r = $this->db->insert('crm_liner_trip', $data);
        if ($r) {
            return $this->db->insert_id();
        }
        return $r;
    }

    function update_product_trip($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'liner_trip_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('liner_trip_id', $post['liner_trip_id']);
        return $this->db->update('crm_liner_trip', $data);
    }

    function del_product_trip($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        return $this->db->delete('crm_liner_trip', array('pro_id' => intval($pro_id)));
    }


    /**
     * 价格库存
     */
    function get_room_type($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->where('pro_id', intval($pro_id));
        $this->db->from('crm_room_type');
        $this->db->join('crm_liner_room', 'crm_liner_room.liner_room_id = crm_room_type.liner_room_id', 'left');
        $this->db->order_by("crm_liner_room.liner_room_id", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function del_room_type($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        return $this->db->delete('crm_room_type', array('pro_id' => intval($pro_id)));
    }

    function insert_room_type($pro_id = null, $room_id = null)
    {
        if (empty($pro_id) || empty($room_id)) {
            return false;
        }
        $data['pro_id'] = $pro_id;
        $data['liner_room_id'] = $room_id;
        $r = $this->db->insert('crm_room_type', $data);
        if ($r) {
            return $this->db->insert_id();
        }
        return $r;
    }

    function room_date_list($type_id = null, $start_date = null, $end_date = null)
    {
        if (empty($type_id)) {
            return false;
        }

        $this->db->select('*');
        $this->db->where('type_id', intval($type_id));
        $this->db->where('set_out_time >=', intval($start_date));
        $this->db->where('set_out_time <=', intval($end_date));

        $this->db->from('crm_room');
        $this->db->order_by("set_out_time", "asc");

        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * 库存添加
     * @param null $type_id
     * @return bool
     */
    function del_rooms($type_id = null)
    {
        if (empty($type_id)) {
            return false;
        }
        return $this->db->delete('crm_room', array('type_id' => intval($type_id)));
    }

    function insert_rooms($post = null)
    {
        foreach ($post as $key => $val) {
            if ($key != 'trip_id') {
                $data[$key] = $val;
            }
        }
        $r = $this->db->insert('crm_room', $data);
        if ($r) {
            return $this->db->insert_id();
        }
        return $r;
    }
}