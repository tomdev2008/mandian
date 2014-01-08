<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Productliner extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->bll('productliner_bll');
        //用户权限验证
        $page = intval($this->input->get_post('p'));
        $rows = 20;
        $r['rows'] = $this->productliner_bll->get_list($page, $rows);
        $r['total'] = ceil($this->productliner_bll->get_list_count() / $rows);

        $this->view('/admin/public/pager_header');
        $this->view('/admin/productliner/index', $r);
        $this->view('/admin/public/pager_footer');
    }

    /**
     * -------------------------------------------
     * 获取地点
     * @param null $id
     * -------------------------------------------
     */
    function search_place($place = null)
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
        $this->load->bll('departure_bll');
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
            $data['data']['end_list'] = array();
            foreach (explode(',', $liner['end']) as $val) {
                $data['data']['end_list'][] = $this->departure_bll->get_place_by_id($val);
            }
            $data['data']['way_to_list'] = array();
            foreach (explode(',', $liner['way_to_port']) as $val) {
                $data['data']['way_to_list'][] = $this->departure_bll->get_place_by_id($val);
            }
            $data['data']['sub_img_list'] = $this->productliner_bll->get_product_imgs_str($id);
        }
        $this->view('/admin/public/pager_header');
        $this->view('/admin/public/productliner_header', array('pro_id' => $id, 't' => 'basic_info'));
        $this->view('/admin/productliner/basic_info', $data);
        $this->view('/admin/public/pager_footer');

    }

    function basic_info_update()
    {
        $liner = $this->input->get_post('liner');
        $this->load->bll('productliner_bll');
        //... 数据准备
        $liner['end'] = implode(",", $liner['end']);
        $liner['way_to_port'] = implode(",", $liner['way_to_port']);
        $liner['shelves_endtime'] = strtotime($liner['shelves_endtime']);
        $liner['cheap'] = '1';

        $img_list = $liner['sub_img'];
        unset($liner['sub_img']);
        //pp($liner);
        if (empty($liner['pro_id'])) {
            $liner['add_time'] = time();
            $r = $this->productliner_bll->insert_product($liner);
            $liner['pro_id'] = $r;
        } else {
            $r = $this->productliner_bll->update_product($liner);
        }
        if ($r) {
            $r = $this->productliner_bll->update_product_imgs($img_list, $liner['pro_id']);
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
    function refer_trip($pro_id = null)
    {
        if (empty($pro_id)) {
            showmessage('出错了');
        }
        $this->load->bll('productliner_bll');
        $liner = $this->productliner_bll->get_by_id($pro_id);
        $days = $liner['days'];
        $trips = $this->productliner_bll->get_trips($pro_id);
        $data = array();
        for ($i = 0; $i < $days; $i++) {
            $data['trip'][] = isset($trips[$i]) ? $trips[$i] : array();
        }
        $data['pro_id'] = $pro_id;
        $this->view('/admin/public/pager_header');
        $this->view('/admin/public/productliner_header', array('pro_id' => $pro_id, 't' => 'refer_trip'));
        $this->view('/admin/productliner/refer_trip', $data);
        $this->view('/admin/public/pager_footer');
    }

    function refer_trip_update()
    {
        $liner = $this->input->get_post('liner');
        $pro_id = $liner['pro_id'];
        unset($liner['pro_id']);

        $this->load->bll('productliner_bll');
        $this->productliner_bll->del_product_trip($pro_id);

        foreach ($liner as $l) {
            if (!empty($l['hotel_info_other'])) {
                $l['hotel_info'] = $l['hotel_info_other'];
            }
            if (!empty($l['traffic_other'])) {
                $l['traffic'] = $l['traffic_other'];
            }
            unset($l['hotel_info_other'], $l['traffic_other']);

            $l['pro_id'] = $pro_id;
            $l['arrive'] = strtotime($l['arrive']);
            $l['leave'] = strtotime($l['leave']);

            $r = $this->productliner_bll->insert_product_trip($l);
            if (!$r) {
                exit('{"state":false,"msg":"保存失败"}');
            }
        }
        exit('{"state":true,"msg":"保存成功"}');
    }

    /**
     * -------------------------------------------
     * 价格库存
     * -------------------------------------------
     */
    function trip_price()
    {
        $this->load->bll('productliner_bll');
    }

    function trip_price_update()
    {
        $liner = $this->input->get_post('liner');
        $this->load->bll('productliner_bll');
    }

    /**
     * -------------------------------------------
     * 其他信息
     * -------------------------------------------
     */
    function other_info($pro_id = null)
    {
        if (empty($pro_id)) {
            showmessage('出错了');
        }
        $this->load->bll('productliner_bll');
        $data['liner'] = $this->productliner_bll->get_by_id($pro_id);
        $this->view('/admin/public/pager_header');
        $this->view('/admin/public/productliner_header', array('pro_id' => $pro_id, 't' => 'other_info'));
        $this->view('/admin/productliner/other_info', $data);
        $this->view('/admin/public/pager_footer');
    }

    function other_info_update()
    {
        $liner = $this->input->get_post('liner');
        $this->load->bll('productliner_bll');
        if (!empty($liner['pro_id'])) {
            $r = $this->productliner_bll->update_product($liner);
        }
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}');
        } else {
            exit('{"state":false,"msg":"保存失败"}');
        }
    }


    public function del($id = null)
    {
        $this->load->bll('productliner_bll');
        if (!empty($id)) {
            $r = $this->productliner_bll->del($id);
        }
        if ($r) {
            showmessage('删除成功', for_url('admin', 'productliner', 'index'));
        } else {
            showmessage('删除失败');
        }
    }
}