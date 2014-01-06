<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Productliner extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->bll('liner_bll');
        //用户权限验证
        $page = intval($this->input->get_post('p'));
        $rows = 20;
        $r['rows'] = $this->liner_bll->get_list($page, $rows);
        $r['total'] = ceil($this->liner_bll->get_list_count() / $rows);

        $this->view('/admin/public/pager_header');
        $this->view('/admin/liner/index', $r);
        $this->view('/admin/public/pager_footer');
    }

    /**
     * -------------------------------------------
     * 获取地点
     * @param null $id
     * -------------------------------------------
     */
    function search_place( $place = null )
    {
        $this->lib('json');
        $this->load->bll('departure_bll');
        $place = $this->input->get_post('q');
        $data = $this->departure_bll->search_place($place);
        exit($this->json->encode($data));
    }

    /**
     * -------------------------------------------
     * 基本信息
     * @param null $id
     * -------------------------------------------
     */
    public function basic_info($id = null)
    {
        $data = array();
        //...获取邮轮公司
        $this->load->bll('liner_bll');
        $liners = $this->liner_bll->get_list();
        $liner_list = array();
        foreach ($liners as $val) {
            $liner_list[$val['liner_com']][$val['liner_id']] = $val['liner_name'];
        }
        $data['liner_list'] = $liner_list;
        //...

        //... 获取地区
        $this->load->bll('departure_bll');
        $data['branch_list'] = $this->departure_bll->get_departure_list();
        //...

        $this->load->bll('productliner_bll');
        if (!empty($id)) {
            $liner = $this->productliner_bll->get_by_id($id);
            $data['data'] = $liner;
        }
        $this->view('/admin/public/pager_header');
        $this->view('/admin/public/productliner_header');
        $this->view('/admin/productliner/basic_info', $data);
        $this->view('/admin/public/pager_footer');

    }

    function basic_info_update()
    {
        $liner = $this->input->get_post('liner');
        pp($liner);

        $this->load->bll('liner_bll');
        if (empty($liner['liner_id'])) {
            $r = $this->liner_bll->insert($liner);
        } else {
            $r = $this->liner_bll->update($liner);
        }
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}');
        } else {
            exit('{"state":false,"msg":"保存失败"}');
        }
    }

    /**
     * -------------------------------------------
     * 参考行程
     * -------------------------------------------
     */
    function refer_trip()
    {

    }

    /**
     * -------------------------------------------
     * 价格库存
     * -------------------------------------------
     */
    function trip_price()
    {

    }

    /**
     * -------------------------------------------
     * 其他信息
     * -------------------------------------------
     */
    function other_info()
    {

    }
}