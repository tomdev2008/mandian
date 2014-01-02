<?php
/**
 * 用户表业务逻辑层
 * hotel: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class Plane_bll extends CI_Bll
{
    function __construct()
    {
        parent::__construct();
        //加载用户模型
        $this->load->model('plane_model');
    }

    /**
     * 获取用户数据
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_list($page = null, $rows = null)
    {
        return $this->plane_model->get_list($page, $rows);
    }

    function get_list_count()
    {
        return $this->plane_model->get_list_count();
    }

    function get_by_id($id = null)
    {
        return $this->plane_model->get_by_id($id);
    }

    function insert($post = array())
    {
        return $this->plane_model->insert($post);
    }

    function update($post = array())
    {
        return $this->plane_model->update($post);
    }

    public function del($id = null)
    {
        return $this->plane_model->del($id);
    }

}