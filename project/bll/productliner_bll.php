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

    /**
     * 线路管理
     * @param null $pro_id
     * @return bool
     */
    function get_trips($pro_id = null)
    {
        if (empty($pro_id)) {
            return false;
        }
        return $this->productliner_model->get_trips($pro_id);
    }

    function insert_product_trip($post = array())
    {
        return $this->productliner_model->insert_product_trip($post);
    }

    function update_product_trip($post = array())
    {
        return $this->productliner_model->update_product_trip($post);
    }

    function del_product_trip($pro_id = null)
    {
        if(empty($pro_id))
        {
            return false;
        }
        return $this->productliner_model->del_product_trip($pro_id);
    }

    /**
     * 价格库存
     */
    function get_room_type($pro_id = null)
    {
        if(empty($pro_id))
        {
            return false;
        }
        return $this->productliner_model->get_room_type($pro_id);
    }

    function update_room_type($pro_id = null, $room_ids = array())
    {
        if(empty($pro_id))
        {
            return false;
        }
        $this->productliner_model->del_room_type($pro_id);

        foreach($room_ids as $room_id){
            $r = $this->productliner_model->insert_room_type($pro_id, $room_id);
            if(!$r)
            {
                return false;
            }
        }
        return true;
    }

    function room_date_list($type_id = null, $date = null)
    {
        if(empty($type_id))
        {
            return false;
        }
        $date = empty($date) ? date('Ymd', time()) : $date . '01' ;
        $time = strtotime($date);
        $start_date = mktime(0, 0, 0, date('m', $time), 1, date('Y', $time));
        $end_date = mktime(0, 0, 0, date('m', $time), date('t', $time), date('Y', $time));
        $r = $this->productliner_model->room_date_list($type_id, $start_date, $end_date);
        foreach($r as &$val){
            list($val['y'], $val['m'], $val['d']) = array(date('Y', $val['set_out_time']), date('m', $val['set_out_time']), date('j', $val['set_out_time']));
        }
        return $r;
    }

    /**
     * 更新room表
     * @return bool
     */
    function update_room($post = array())
    {
        if(empty($post['type_id']))
        {
            return false;
        }
        $this->productliner_model->del_rooms($post['type_id']);

        $days = $post['days'];
        $datestr = $post['date_str'];
        unset($post['days'], $post['date_str']);
        foreach($days as $d){
            $post['set_out_time'] = strtotime($datestr . str_pad($d, 2, '0', STR_PAD_LEFT));
            $r = $this->productliner_model->insert_rooms($post);
            if(!$r)
            {
                return false;
            }
        }
        return true;
    }
}