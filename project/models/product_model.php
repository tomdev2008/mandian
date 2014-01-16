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
        $r = $this->db->insert($this->db->dbprefix('product'), $data);
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
        return $this->db->update($this->db->dbprefix('product'), $data);
    }

    function get_list($page = null, $rows = null, $where = array())
    {
        $this->db->select('*');
        $this->db->from($this->db->dbprefix('product'));
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
        $this->db->from($this->db->dbprefix('product'));
        $query = $this->db->get();
        $r = $query->row_array();
        return $r['acount'];
    }

    function get_by_id($id = null)
    {
        $this->db->where('pro_id', intval($id));
        $this->db->select('*');
        $this->db->where("enabled", 1);
        $this->db->from($this->db->dbprefix('product'));
        $query = $this->db->get();
        return $query->row_array();
    }

    function del($id = null)
    {
        $this->db->where('pro_id', intval($id));
        $data['enabled'] = 0;
        return $this->db->update($this->db->dbprefix('product'), $data);
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
        return $this->db->delete($this->db->dbprefix('product_image_list'), array('pro_id' => intval($pro_id)));
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
        $r = $this->db->insert($this->db->dbprefix('product_image_list'), $data);
        return $r;
    }

    function get_product_imgs($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->where('pro_id', intval($pro_id));
        $this->db->from($this->db->dbprefix('product_image_list'));
        $query = $this->db->get();
        return $query->result_array();
    }


    /**
     * ---------------------------------------
     * 邮轮线路管理
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
        $this->db->from($this->db->dbprefix('liner_trip'));
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
        $r = $this->db->insert($this->db->dbprefix('liner_trip'), $data);
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
        return $this->db->update($this->db->dbprefix('liner_trip'), $data);
    }

    function del_product_trip($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        return $this->db->delete($this->db->dbprefix('liner_trip'), array('pro_id' => intval($pro_id)));
    }
    /**
     * ---------------------------------------
     * 产品线路管理
     * @param array $post
     * ---------------------------------------
     */
    function get_main_trips($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->where('pro_id', intval($pro_id));
        $this->db->from($this->db->dbprefix('refer_trip'));
        $this->db->order_by("refer_trip_id", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function insert_main_product_trip($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'refer_trip_id') {
                $data[$key] = $val;
            }
        }
        $r = $this->db->insert($this->db->dbprefix('refer_trip'), $data);
        if ($r) {
            return $this->db->insert_id();
        }
        return $r;
    }

    function del_main_product_trip($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        return $this->db->delete($this->db->dbprefix('refer_trip'), array('pro_id' => intval($pro_id)));
    }


    /**
     * 邮轮价格库存
     */
    function get_room_type($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->where('pro_id', intval($pro_id));
        $this->db->from($this->db->dbprefix('room_type'));
        $this->db->join($this->db->dbprefix('liner_room'), $this->db->dbprefix('liner_room').'.liner_room_id = '.$this->db->dbprefix('room_type').'.liner_room_id', 'left');
        $this->db->order_by($this->db->dbprefix('liner_room').'.liner_room_id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function del_room_type($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        return $this->db->delete($this->db->dbprefix('room_type'), array('pro_id' => intval($pro_id)));
    }

    function insert_room_type($pro_id = null, $room_id = null)
    {
        if (empty($pro_id) || empty($room_id)) {
            return false;
        }
        $data['pro_id'] = $pro_id;
        $data['liner_room_id'] = $room_id;
        $r = $this->db->insert($this->db->dbprefix('room_type'), $data);
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

        $this->db->from($this->db->dbprefix('room'));
        $this->db->order_by("set_out_time", "asc");

        $query = $this->db->get();
        return $query->result_array();
    }
    /**
     * 价格库存
     */
    function get_trip_type($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->where('pro_id', intval($pro_id));
        $this->db->from($this->db->dbprefix('trip_type'));
        $this->db->order_by("type_id", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function del_trip_type($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        return $this->db->delete($this->db->dbprefix('room_type'), array('pro_id' => intval($pro_id)));
    }

    function insert_trip_type($pro_id = null, $trip_name = null)
    {
        if (empty($pro_id) || empty($trip_name)) {
            return false;
        }
        $data['pro_id'] = $pro_id;
        $data['type_name'] = $trip_name;
        $r = $this->db->insert($this->db->dbprefix('trip_type'), $data);
        if ($r) {
            return $this->db->insert_id();
        }
        return $r;
    }

    function trip_date_list($type_id = null, $start_date = null, $end_date = null)
    {
        if (empty($type_id)) {
            return false;
        }

        $this->db->select('*');
        $this->db->where('type_id', intval($type_id));
        $this->db->where('set_out_time >=', intval($start_date));
        $this->db->where('set_out_time <=', intval($end_date));

        $this->db->from($this->db->dbprefix('trip'));
        $this->db->order_by("set_out_time", "asc");

        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * 邮轮库存添加
     * @param null $type_id
     * @return bool
     */
    function del_rooms($type_id = null)
    {
        if (empty($type_id)) {
            return false;
        }
        return $this->db->delete($this->db->dbprefix('room'), array('type_id' => intval($type_id)));
    }

    function insert_rooms($post = null)
    {
        foreach ($post as $key => $val) {
            if ($key != 'trip_id') {
                $data[$key] = $val;
            }
        }
        $r = $this->db->insert($this->db->dbprefix('room'), $data);
        if ($r) {
            return $this->db->insert_id();
        }
        return $r;
    }
    /**
     * 产品库存添加
     * @param null $type_id
     * @return bool
     */
    function del_trips($type_id = null)
    {
        if (empty($type_id)) {
            return false;
        }
        return $this->db->delete($this->db->dbprefix('trip'), array('type_id' => intval($type_id)));
    }

    function insert_trips($post = null)
    {
        foreach ($post as $key => $val) {
            if ($key != 'trip_id') {
                $data[$key] = $val;
            }
        }
        $r = $this->db->insert($this->db->dbprefix('trip'), $data);
        if ($r) {
            return $this->db->insert_id();
        }
        return $r;
    }
}