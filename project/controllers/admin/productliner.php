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
    function trip_price($pro_id = null)
    {
        $this->load->bll('productliner_bll');
        $data['rows'] = $this->productliner_bll->get_room_type($pro_id);
        $data['pro_id'] = $pro_id;

        $this->view('/admin/public/pager_header');
        $this->view('/admin/public/productliner_header', array('pro_id' => $pro_id, 't' => 'trip_price'));
        $this->view('/admin/productliner/trip_price', $data);
        $this->view('/admin/public/pager_footer');
    }

    function calendar_room_edit($type_id = null, $year = null,$month = null)
    {
        if (empty($type_id)) {
            showmessage('出错了');
        }
        $data['type_id'] = $type_id;
        $data['calendar'] = $this->get_calendar($type_id, $year, $month);
        $data['datestr'] = (empty($year) || empty($month))? date('Ym'): $year . '' .$month;
        $this->view('/admin/public/pager_header');
        $this->view('/admin/productliner/calendar_room_edit', $data);
        $this->view('/admin/public/pager_footer');
    }

    function calendar_room_update()
    {
        $liner = $this->input->get_post('liner');
        if (empty($liner['type_id'])) {
            exit('{"state":false,"msg":"保存失败"}');
        }
        $this->load->bll('productliner_bll');
        $r = $this->productliner_bll->update_room($liner);

        if ($r) {
            exit('{"state":true,"msg":"保存成功"}');
        } else {
            exit('{"state":false,"msg":"保存失败"}');
        }
    }

    /**
     * 准备日历
     * @return mixed
     */
    function get_calendar($type_id = null, $year = null,$month = null)
    {
        $prefs = array (
            'show_next_prev'  => TRUE,
            'next_prev_url'   => for_url('admin', 'productliner', 'calendar_room_edit', array($type_id)),
            'template' => $this->view('/admin/public/calenda_template', null, true),
        );
        $this->lib('calendar', $prefs);
        $time = time();
        $year = empty($year)? date('Y', $time): $year;
        $month = empty($month)? date('m', $time):  $month;
        return $this->calendar->generate($year, $month);
    }

    function room_date()
    {
        $type_id = $this->input->get_post('type_id');
        $date = $this->input->get_post('date');
        $this->load->bll('productliner_bll');
        $data = $this->productliner_bll->room_date_list($type_id, $date);
        $this->lib('json');
        exit($this->json->encode($data));
    }


    function add_room_type($pro_id = null)
    {
        if (empty($pro_id)) {
            showmessage('出错了');
        }
        $this->load->bll('productliner_bll');
        $this->load->bll('liner_bll');
        //已选择房型
        $room_types = $this->productliner_bll->get_room_type($pro_id);
        $data['room_type'] = array();
        foreach($room_types as $id)
        {
            $data['room_type'][] = $id;
        }
        //邮轮房型
        $liner = $this->productliner_bll->get_by_id($pro_id);
        $data['rows'] = $this->liner_bll->get_room_list($liner['liner_id']);
        $data['pro_id'] = $pro_id;

        $this->view('/admin/public/pager_header');
        $this->view('/admin/productliner/add_room_type', $data);
        $this->view('/admin/public/pager_footer');
    }

    function add_room_action()
    {
        $liner = $this->input->get_post('liner');
        $this->load->bll('productliner_bll');
        $r = $this->productliner_bll->update_room_type($liner['pro_id'], $liner['liner_room_id']);
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}');
        } else {
            exit('{"state":false,"msg":"保存失败"}');
        }
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