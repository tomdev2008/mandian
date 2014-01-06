<?php
/**
 * 用户表业务逻辑层
 * User: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */

class Departure_bll extends CI_Bll
{


    function __construct()
    {
        parent::__construct();
        //加载用户模型
        $this->load->model('departure_model');
    }

    function get_departure_list()
    {
        $branch = $this->departure_model->get_branch_list();
        $r = array();
        foreach($branch as $b)
        {
            $r[$b['branch_name']] = $this->departure_model->get_departure_list($b['branch_id']);
        }
        return $r;
    }

    function search_place($val = null)
    {
        if(empty($val))
        {
            return array();
        }
        return $this->departure_model->search_place($val);
    }
}