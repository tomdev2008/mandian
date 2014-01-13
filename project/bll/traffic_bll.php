<?php
/**
 * 交通业务逻辑层
 * hotel: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class Traffic_bll extends CI_Bll
{
    function __construct()
    {
        parent::__construct();
        //加载用户模型
        $this->load->model('traffic_model');
    }

    /**
     * 火车数据
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_train_list($page = null, $rows = null,$train_num = null)
    {
        return $this->traffic_model->get_train_list($page, $rows, $train_num);
    }

    function get_train_list_count()
    {
        return $this->traffic_model->get_train_list_count();
    }

    function get_train_by_id($id = null)
    {
        return $this->traffic_model->get_train_by_id($id);
    }

    function insert_train($post = array())
    {
        return $this->traffic_model->insert_train($post);
    }

    function update_train($post = array())
    {
        return $this->traffic_model->update_train($post);
    }

    public function del_train($id = null)
    {
        return $this->traffic_model->del_train($id);
    }

    /**
     * 飞机航班数据
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_list($page = null, $rows = null,$plane_num = null)
    {
        return $this->traffic_model->get_list($page, $rows,$plane_num);
    }

    function get_list_count()
    {
        return $this->traffic_model->get_list_count();
    }

    function get_by_id($id = null)
    {
        return $this->traffic_model->get_by_id($id);
    }

    function insert($post = array())
    {
        return $this->traffic_model->insert($post);
    }

    function update($post = array())
    {
        return $this->traffic_model->update($post);
    }

    public function del($id = null)
    {
        return $this->traffic_model->del($id);
    }

}