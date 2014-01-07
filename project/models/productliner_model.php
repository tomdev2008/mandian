<?php

/**
 * 用户表
 * liner: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */
class Productliner_model extends CI_Model
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

    function get_list($page = null, $rows = null)
    {
        $this->db->select('*');
        $this->db->from('crm_product');
        if (!empty($rows) && !empty($rows)) {
            $page = ($page <= 1) ? 1 : $page;
            $offset = ($page - 1) * $rows;
            $this->db->limit($rows, $offset);
        }
        $this->db->where("enabled", 1);
        $this->db->order_by("pro_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_list_count()
    {
        $this->db->select('count(*) as acount');
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


    function get_trips($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->where('pro_id', intval($pro_id));
        $this->db->from('crm_liner_trip');
        $query = $this->db->get();
        return $query->result_array();
    }

















    /**
     * 获取邮轮公司
     * @return mixed
     */
    function get_company_list()
    {
        $this->db->select('*');
        $this->db->from('crm_liner_com');
        $this->db->order_by("com_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * 用户
     * @param int $page
     * @param int $rows
     * @return mixed
     */

    function get($liner_name = null, $pwd = null)
    {
        if (empty($liner_name)) {
            return false;
        }
        $this->db->where('liner_name', $liner_name);
        $this->db->where('password', $pwd);
        $this->db->select('*');
        $this->db->join('crm_roles', 'crm_roles.role_id = crms.role_id', 'left');
        $this->db->from('crm_liner');
        $query = $this->db->get();
        return $query->row_array();
    }

    /**
     * 获取邮轮房间信息
     * @param null $liner_id
     * @return bool
     */
    function get_room_list($liner_id = null)
    {
        if (!empty($liner_id)) {
            $this->db->where("liner_id", $liner_id);
        }
        $this->db->select('*');
        $this->db->from('crm_liner_room');
        $this->db->where("enabled", 1);
        $this->db->order_by("liner_room_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_room_by_id($id = null)
    {
        $this->db->where('liner_room_id', intval($id));
        $this->db->select('*');
        $this->db->where("enabled", 1);
        $this->db->from('crm_liner_room');
        $query = $this->db->get();
        return $query->row_array();
    }

    /**
     * ----------------------------------------------
     * 房间管理
     * @param null $liner_id
     * ----------------------------------------------
     */
    function insert_room($post = null)
    {
        foreach ($post as $key => $val) {
            if ($key != 'liner_room_id') {
                $data[$key] = $val;
            }
        }
        return $this->db->insert('crm_liner_room', $data);
    }

    function update_room($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'liner_room_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('liner_room_id', $post['liner_room_id']);
        return $this->db->update('crm_liner_room', $data);
    }


    public function del_room($id = null)
    {
        $this->db->where('liner_room_id', intval($id));
        $data['enabled'] = 0;
        return $this->db->update('crm_liner_room', $data);
    }


    /**
     * ----------------------------------------------
     * 邮轮管理
     * @param null $liner_id
     * ----------------------------------------------
     */
    function insert($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'liner_id') {
                $data[$key] = $val;
            }
        }
        return $this->db->insert('crm_liner', $data);
    }

    function insert_com($com_name = null)
    {
        $data['com_name'] = $com_name;
        return $this->db->insert('crm_liner_com', $data);
    }

    function update($post = array())
    {

        foreach ($post as $key => $val) {
            if ($key != 'liner_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('liner_id', $post['liner_id']);
        return $this->db->update('crm_liner', $data);
    }

    /**
     * ----------------------------------------------
     * 楼层设施管理
     * ----------------------------------------------
     */
    function get_floor_list($liner_id = null)
    {
        if (!empty($liner_id)) {
            $this->db->where("liner_id", $liner_id);
        }
        $this->db->select('*');
        $this->db->from('crm_floor_facility');
        $this->db->where("enabled", 1);
        $this->db->order_by('floor_num desc, type_name asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_floor_by_id($id = null)
    {
        $this->db->where('facility_id', intval($id));
        $this->db->select('*');
        $this->db->where("enabled", 1);
        $this->db->from('crm_floor_facility');
        $query = $this->db->get();
        return $query->row_array();
    }

    function insert_facility($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'facility_id') {
                $data[$key] = $val;
            }
        }
        return $this->db->insert('crm_floor_facility', $data);
    }

    function update_facility($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'facility_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('facility_id', $post['facility_id']);
        return $this->db->update('crm_floor_facility', $data);
    }

    public function del_facility($id = null)
    {
        $this->db->where('facility_id', intval($id));
        $data['enabled'] = 0;
        return $this->db->update('crm_floor_facility', $data);
    }
}