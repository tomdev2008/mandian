<?php
/**
 * 用户表业务逻辑层
 * hotel: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class Hotel_bll extends CI_Bll
{


    function __construct()
    {
        parent::__construct();
        //加载用户模型
        $this->load->model('hotel_model');
    }

    /**
     * 获取用户数据
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_hotel_list($page = null, $rows = null, $hotel_name = null)
    {
        return $this->hotel_model->get_hotel_list($page, $rows, $hotel_name);
    }

    function get_hotel_list_count()
    {
        return $this->hotel_model->get_hotel_list_count();
    }

    function get_hotel_by_id($id = null)
    {
        return $this->hotel_model->get_hotel_by_id($id);
    }

    function insert_hotel($post = array())
    {
        return $this->hotel_model->insert_hotel($post);
    }

    function update_hotel($post = array())
    {
        return $this->hotel_model->update_hotel($post);
    }

    public function del_hotel($id = null)
    {
        return $this->hotel_model->del_hotel($id);
    }

}