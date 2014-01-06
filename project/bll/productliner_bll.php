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


}