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
     * -------------------------------------------------
     * 酒店 与 产品关联
     * @param array $post
     * @return mixed
     * -------------------------------------------------
     */
    function get_product_hotel($pro_id = null){
        return $this->hotel_model->get_product_hotel($pro_id );
    }

    function update_product_hotel($pro_id = null,$train_id = null)
    {
        $this->hotel_model->del_product_hotel($pro_id);
        foreach($train_id as $id){
            $data = array(
                'pro_id' => $pro_id,
                'hotel_id' => $id,
            );
            $this->hotel_model->insert_product_hotel($data);
        }
        return  true;
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