<?php
/**
 * 用户表业务逻辑层
 * hotel: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class Productliner_bll extends CI_Bll
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('productliner_model');
    }

    /**
     * -----------------------------------------
     * 产品管理
     * @param array $post
     * @return mixed
     * -----------------------------------------
     */

    function insert_product($post = array())
    {
        return $this->productliner_model->insert_product($post);
    }

    function update_product($post = array())
    {
        return $this->productliner_model->update_product($post);
    }

    function get_list($page = null, $rows = null)
    {
        return $this->productliner_model->get_list($page, $rows);
    }

    function get_list_count()
    {
        return $this->productliner_model->get_list_count();
    }

    function get_by_id($pro_id = null)
    {
        if(empty($pro_id))
        {
            return false;
        }
        return $this->productliner_model->get_by_id($pro_id);
    }

    function del($pro_id = null)
    {
        if(empty($pro_id))
        {
            return false;
        }
        return $this->productliner_model->del($pro_id);
    }



    /**
     * 更新产品图片信息
     */
    function update_product_imgs($imglist = array(), $pro_id = null)
    {
        if(empty($pro_id))
        {
            return false;
        }
        $this->productliner_model->del_product_imgs($pro_id);
        foreach($imglist as $img_id)
        {
            $r = $this->productliner_model->insert_product_imgs($img_id, $pro_id);
            if(!$r)
            {
                return false;
            }
        }
        return true;
    }

    function get_product_imgs_str($pro_id = null)
    {
        if(empty($pro_id))
        {
            return false;
        }
        $imglist = $this->productliner_model->get_product_imgs($pro_id);
        $r = array();
        foreach($imglist as $img)
        {
            $r[] = $img['attachment_id'];
        }
        return implode(',', $r);
    }
}