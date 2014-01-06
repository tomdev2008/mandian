<?php
/**
 * 用户表业务逻辑层
 * hotel: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class Liner_bll extends CI_Bll
{
    function __construct()
    {
        parent::__construct();
        //加载用户模型
        $this->load->model('liner_model');
    }

    function get_company_list(){
        return $this->liner_model->get_company_list();
    }

    /**
     * 获取用户数据
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_list($page = null, $rows = null)
    {
        return $this->liner_model->get_list($page, $rows);
    }

    function get_list_count()
    {
        return $this->liner_model->get_list_count();
    }

    function get_by_id($id = null)
    {
        return $this->liner_model->get_by_id($id);
    }
    function insert($post = array())
    {
        return $this->liner_model->insert($post);
    }

    function insert_com($com_name = null)
    {
        return $this->liner_model->insert_com($com_name);
    }

    function update($post = array())
    {
        return $this->liner_model->update($post);
    }

    public function del($id = null)
    {
        return $this->liner_model->del($id);
    }

    /**
     * ----------------------------------------------
     * 房间管理
     * @param null $liner_id
     * ----------------------------------------------
     */
    function get_room_list($liner_id = null){
        return $this->liner_model->get_room_list($liner_id);
    }

    function get_room_by_id($id = null)
    {
        return $this->liner_model->get_room_by_id($id);
    }

    function insert_room($post = array())
    {
        return $this->liner_model->insert_room($post);
    }

    function update_room($post = array())
    {
        return $this->liner_model->update_room($post);
    }

    public function del_room($id = null)
    {
        return $this->liner_model->del_room($id);
    }

    /**
     * ----------------------------------------------
     * 楼层设施管理
     * ----------------------------------------------
     */
    function get_floor_list($liner_id = null){
        return $this->liner_model->get_floor_list($liner_id);
    }

    function get_floor_by_id($id = null)
    {
        return $this->liner_model->get_floor_by_id($id);
    }

    function insert_facility($post = array())
    {
        return $this->liner_model->insert_facility($post);
    }

    function update_facility($post = array())
    {
        return $this->liner_model->update_facility($post);
    }

    public function del_facility($id = null)
    {
        return $this->liner_model->del_facility($id);
    }
}