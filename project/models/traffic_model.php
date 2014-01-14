<?php

/**
 * 用户表
 * plane: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */
class Traffic_model extends CI_Model
{

    var $title = '';
    var $content = '';
    var $date = '';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * -------------------------------------------------
     * 火车车次 航线 与 产品关联
     * @param array $post
     * @return mixed
     * -------------------------------------------------
     */
    function get_product_traffic_train($pro_id = null, $traffic_type = 1)
    {
        $pro_id = intval($pro_id);
        if (empty($pro_id)) {
            return false;
        }

        $this->db->where('pro_id', $pro_id);
        $this->db->where('traffic_type', $traffic_type);
        $this->db->select('*');
        $this->db->join('crm_train', 'crm_train.train_id = crm_pro_train.train_id', 'left');
        $this->db->from('crm_pro_train');
        $query = $this->db->get();
        return $query->result_array();

    }
    function get_product_traffic_plane($pro_id = null, $traffic_type = 1)
    {
        $pro_id = intval($pro_id);
        if (empty($pro_id)) {
            return false;
        }

        $this->db->where('crm_pro_plane.pro_id', $pro_id);
        $this->db->where('crm_pro_plane.traffic_type', $traffic_type);
        $this->db->select('crm_plane.*');
        $this->db->join('crm_plane', 'crm_plane.plane_id = crm_pro_plane.plane_id', 'left');
        $this->db->from('crm_pro_plane');
        $query = $this->db->get();
        return $query->result_array();

    }

    function insert_product_train($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'pro_train_id') {
                $data[$key] = $val;
            }
        }
        return $this->db->insert('crm_pro_train', $data);
    }

    function insert_product_plane($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'pro_plane_id') {
                $data[$key] = $val;
            }
        }
        return $this->db->insert('crm_pro_plane', $data);
    }

    function del_product_train($pro_id = null, $traffic_type = null)
    {
        $pro_id = intval($pro_id);
        if (empty($pro_id)) {
            return;
        }
        $where = array(
            'pro_id' => intval($pro_id),
            'traffic_type' => intval($traffic_type),
        );
        return $this->db->delete('crm_pro_train', $where);
    }

    function del_product_plane($pro_id = null, $traffic_type = null)
    {
        $pro_id = intval($pro_id);
        if (empty($pro_id)) {
            return;
        }
        $where = array(
            'pro_id' => intval($pro_id),
            'traffic_type' => intval($traffic_type),
        );
        return $this->db->delete('crm_pro_plane', $where);
    }

    /**
     * 火车
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_train_list($page = null, $rows = null, $train_num = null)
    {
        $this->db->select('*');
        $this->db->from('crm_train');
        if (!empty($rows) && !empty($rows)) {
            $page = ($page <= 1) ? 1 : $page;
            $offset = ($page - 1) * $rows;
            $this->db->limit($rows, $offset);
        }
        if (!empty($train_num)) {
            $this->db->like('train_num', $train_num, 'both');
        }
        $this->db->where("enabled", 1);
        $this->db->order_by("train_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_train_list_count()
    {
        $this->db->select('count(*) as acount');
        $this->db->where("enabled", 1);
        $this->db->from('crm_train');
        $query = $this->db->get();
        $r = $query->row_array();
        return $r['acount'];
    }

    function get_train_by_id($id = null)
    {
        $this->db->where('train_id', intval($id));
        $this->db->select('*');
        $this->db->where("enabled", 1);
        $this->db->from('crm_train');
        $query = $this->db->get();
        return $query->row_array();
    }

    function insert_train($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'train_id') {
                $data[$key] = $val;
            }
        }
        return $this->db->insert('crm_train', $data);
    }

    function update_train($post = array())
    {

        foreach ($post as $key => $val) {
            if ($key != 'train_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('train_id', $post['train_id']);
        return $this->db->update('crm_train', $data);
    }

    public function del_train($id = null)
    {
        $this->db->where('train_id', intval($id));
        $data['enabled'] = 0;
        return $this->db->update('crm_train', $data);
        //return $this->db->delete('crm', array('plane_id' => intval($id)));
    }


    /**
     * 飞机
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_list($page = null, $rows = null, $plane_num = null)
    {
        $this->db->select('*');
        $this->db->from('crm_plane');
        if (!empty($rows) && !empty($rows)) {
            $page = ($page <= 1) ? 1 : $page;
            $offset = ($page - 1) * $rows;
            $this->db->limit($rows, $offset);
        }
        if (!empty($train_num)) {
            $this->db->like('flight_num', $plane_num, 'both');
        }
        $this->db->where("enabled", 1);
        $this->db->order_by("plane_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_list_count()
    {
        $this->db->select('count(*) as acount');
        $this->db->where("enabled", 1);
        $this->db->from('crm_plane');
        $query = $this->db->get();
        $r = $query->row_array();
        return $r['acount'];
    }

    function get_by_id($id = null)
    {
        $this->db->where('plane_id', intval($id));
        $this->db->select('*');
        $this->db->where("enabled", 1);
        $this->db->from('crm_plane');
        $query = $this->db->get();
        return $query->row_array();
    }

    function get($plane_name = null, $pwd = null)
    {
        if (empty($plane_name)) {
            return false;
        }
        $this->db->where('plane_name', $plane_name);
        $this->db->where('password', $pwd);
        $this->db->select('*');
        $this->db->join('crm_roles', 'crm_roles.role_id = crms.role_id', 'left');
        $this->db->from('crm_plane');
        $query = $this->db->get();
        return $query->row_array();
    }

    function insert($post = array())
    {
        foreach ($post as $key => $val) {
            if ($key != 'plane_id') {
                $data[$key] = $val;
            }
        }
        return $this->db->insert('crm_plane', $data);
    }

    function update($post = array())
    {

        foreach ($post as $key => $val) {
            if ($key != 'plane_id') {
                $data[$key] = $val;
            }
        }
        $this->db->where('plane_id', $post['plane_id']);
        return $this->db->update('crm_plane', $data);
    }

    public function del($id = null)
    {
        $this->db->where('plane_id', intval($id));
        $data['enabled'] = 0;
        return $this->db->update('crm_plane', $data);
        //return $this->db->delete('crm', array('plane_id' => intval($id)));
    }

}