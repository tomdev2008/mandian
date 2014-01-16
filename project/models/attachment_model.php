<?php

/**
 * 用户表
 * hotel: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */
class Attachment_model extends CI_Model
{

    var $title = '';
    var $content = '';
    var $date = '';

    function __construct()
    {
        parent::__construct();
    }

    function insert_img($post = array())
    {

        foreach ($post as $key => $val) {
            if ($key != 'hotel_id') {
                $data[$key] = $val;
            }
        }
        $r = $this->db->insert($this->db->dbprefix('attachment_img'), $data);
        if ($r) {
            return $this->db->insert_id();
        }
        return false;
    }

    function get_img_list($page = null, $rows = null)
    {
        $this->db->select('*');
        $this->db->from($this->db->dbprefix('attachment_img'));
        if (!empty($rows) && !empty($rows)) {
            $page = ($page <= 1) ? 1 : $page;
            $offset = ($page - 1) * $rows;
            $this->db->limit($rows, $offset);
        }
        $this->db->order_by("upload_time", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_img_list_count()
    {
        $this->db->select('count(*) as acount');
        $this->db->from($this->db->dbprefix('attachment_img'));
        $query = $this->db->get();
        $r = $query->row_array();
        return $r['acount'];
    }

    function get_img($id = null)
    {
        $this->db->where('attachment_id', intval($id));
        $this->db->select('*');
        $this->db->from($this->db->dbprefix('attachment_img'));
        $query = $this->db->get();
        return $query->row_array();
    }

}