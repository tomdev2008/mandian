<?php
/**
 * 用户表业务逻辑层
 * hotel: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class Product_bll extends CI_Bll
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
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
        $post['pro_type'] = 1;
        return $this->product_model->insert_product($post);
    }

    function update_product($post = array())
    {
        return $this->product_model->update_product($post);
    }

    function get_list($page = null, $rows = null, $where = array())
    {
        $where['pro_type'] = 1;
        return $this->product_model->get_list($page, $rows, $where);
    }

    function get_list_count($where = array())
    {
        $where['pro_type'] = 1;
        return $this->product_model->get_list_count($where);
    }

    function get_by_id($pro_id = null)
    {
        if(empty($pro_id))
        {
            return false;
        }
        return $this->product_model->get_by_id($pro_id);
    }

    function del($pro_id = null)
    {
        if(empty($pro_id))
        {
            return false;
        }
        return $this->product_model->del($pro_id);
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
        $this->product_model->del_product_imgs($pro_id);
        foreach($imglist as $img_id)
        {
            $r = $this->product_model->insert_product_imgs($img_id, $pro_id);
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
        $imglist = $this->product_model->get_product_imgs($pro_id);
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
        return $this->product_model->get_main_trips($pro_id);
    }

    function insert_product_trip($post = array())
    {
        return $this->product_model->insert_main_product_trip($post);
    }

    function update_product_trip($post = array())
    {
        return $this->product_model->update_product_trip($post);
    }

    function del_product_trip($pro_id = null)
    {
        if(empty($pro_id))
        {
            return false;
        }
        return $this->product_model->del_main_product_trip($pro_id);
    }

    /**
     * 价格库存
     */
    function get_trip_type($pro_id = null)
    {
        if(empty($pro_id))
        {
            return false;
        }
        return $this->product_model->get_trip_type($pro_id);
    }

    function insert_trip_type($pro_id = null, $trip_name = null)
    {
        if(empty($pro_id))
        {
            return false;
        }

        $r = $this->product_model->insert_trip_type($pro_id, $trip_name);
        return true;
    }


    function trip_date_list($type_id = null, $date = null)
    {
        if(empty($type_id))
        {
            return false;
        }
        $date = empty($date) ? date('Ymd', time()) : $date . '01' ;
        $time = strtotime($date);
        $start_date = mktime(0, 0, 0, date('m', $time), 1, date('Y', $time));
        $end_date = mktime(0, 0, 0, date('m', $time), date('t', $time), date('Y', $time));
        $r = $this->product_model->trip_date_list($type_id, $start_date, $end_date);
        foreach($r as &$val){
            list($val['y'], $val['m'], $val['d']) = array(date('Y', $val['set_out_time']), date('m', $val['set_out_time']), date('j', $val['set_out_time']));
        }
        return $r;
    }
    /**
     * 更新room表
     * @return bool
     */
    function update_trip($post = array())
    {
        if(empty($post['type_id']))
        {
            return false;
        }
        $this->product_model->del_trips($post['type_id']);

        $days = $post['days'];
        $datestr = $post['date_str'];
        unset($post['days'], $post['date_str']);
        foreach($days as $d){
            $post['set_out_time'] = strtotime($datestr . str_pad($d, 2, '0', STR_PAD_LEFT));
            $r = $this->product_model->insert_trips($post);
            if(!$r)
            {
                return false;
            }
        }
        return true;
    }
}