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
     * -------------------------------------------------
     * 火车车次 航线 与 产品关联
     * @param array $post
     * @return mixed
     * -------------------------------------------------
     */
    function update_product_traffic_train($pro_id = null,$train_id = null, $traffic_type = 1)
    {
        $this->traffic_model->del_product_train($pro_id, $traffic_type);
        foreach($train_id as $id){
            $data = array(
                'pro_id' => $pro_id,
                'train_id' => $id,
                'traffic_type' => $traffic_type
            );
            $this->traffic_model->insert_product_train($data);
        }
        return  true;
    }
    function get_product_traffic_train($pro_id = null,$traffic_type = 1){
        return $this->traffic_model->get_product_traffic_train($pro_id ,$traffic_type);
    }
    function get_product_traffic_plane($pro_id = null,$traffic_type = 1){
        return $this->traffic_model->get_product_traffic_plane($pro_id ,$traffic_type);
    }
    function update_product_traffic_plane($pro_id = null,$train_id = null, $traffic_type = 1)
    {
        $this->traffic_model->del_product_plane($pro_id, $traffic_type);
        foreach($train_id as $id){
            $data = array(
                'pro_id' => $pro_id,
                'plane_id' => $id,
                'traffic_type' => $traffic_type
            );
            $this->traffic_model->insert_product_plane($data);
        }
        return  true;
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