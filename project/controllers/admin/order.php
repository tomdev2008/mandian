<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->bll('order_bll');
        $page = intval($this->input->get_post('p'));
        $rows = 20;

        //... 筛选条件
        $order_info = $this->input->get_post('order');
        $r['filter'] = $order_info;
        $r['rows'] = $this->order_bll->get_list($page, $rows, $order_info['order_num'], $order_info['pro_name'], $order_info['order_state'], $order_info['contact_name'], $order_info['start_time'], $order_info['end_time']);
        $r['total'] = ceil($this->order_bll->get_list_count($order_info['order_num'], $order_info['pro_name'], $order_info['order_state'], $order_info['contact_name'], $order_info['start_time'], $order_info['end_time']) / $rows);
        $this->view('/admin/public/pager_header');
        $this->view('/admin/order/index', $r);
        $this->view('/admin/public/pager_footer');
    }

    function detail($order_id = null)
    {
        if (empty($order_id)) {
            showmessage('出错了');
        }
        $this->load->bll('order_bll');
        $order = $this->order_bll->get_by_id($order_id);
        $order_users = $this->order_bll->get_order_users_id($order_id);

        $data['settlement'] = $this->order_bll->get_settlements_by_order_id($order_id);

        $data['order_id'] = $order_id;
        $data['order'] = $order;
        $data['order_users'] = $order_users;
        $this->view('/admin/public/pager_header');
        $this->view('/admin/order/detail', $data);
        $this->view('/admin/public/pager_footer');
    }

    function edit($order_id = null)
    {
        if (empty($order_id)) {
            showmessage('出错了');
        }
        $this->load->bll('order_bll');
        $data['data'] = $this->order_bll->get_by_id($order_id);
        $this->view('/admin/public/pager_header');
        $this->view('/admin/order/edit', $data);
        $this->view('/admin/public/pager_footer');
    }

    public function save()
    {
        $order = $this->input->post('order');
        $this->load->bll('order_bll');
        $r = $this->order_bll->update($order);
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}');
        } else {
            exit('{"state":false,"msg":"保存失败"}');
        }
    }

    /**
     * ------------------------------
     * 旅客信息修改
     * @param null $order_id
     * ------------------------------
     */
    function user_edit($order_id = null, $user_id = null)
    {
        if (empty($order_id)) {
            showmessage('出错了');
        }
        $data['data']['order_id'] = $order_id;
        $this->load->bll('order_bll');
        if (!empty($user_id)) {
            $data['data'] = $this->order_bll->get_user_by_id($user_id);
        }
        $this->view('/admin/public/pager_header');
        $this->view('/admin/order/edit_user', $data);
        $this->view('/admin/public/pager_footer');
    }

    public function user_save()
    {
        $order = $this->input->post('order');
        $this->load->bll('order_bll');
        if (empty($order['id'])) {
            $r = $this->order_bll->insert_user($order);
        } else {
            $r = $this->order_bll->save_user($order);
        }
        if ($r) {
            exit('{"state":true,"msg":"保存成功"}');
        } else {
            exit('{"state":false,"msg":"保存失败"}');
        }
    }

    public function user_del($order_id = null, $id = null)
    {
        if (empty($id) || empty($order_id)) {
            showmessage('出错了');
        }
        $this->load->bll('order_bll');
        $r = $this->order_bll->del_user($id);

        if ($r) {
            showmessage('删除成功', for_url('admin', 'order', 'detail', array($order_id)));
        } else {
            showmessage('删除失败', for_url('admin', 'order', 'detail', array($order_id)));
        }
    }


    /**
     * -----------------------------
     * 同行游客信息
     * -----------------------------
     */

    function insert_user($post = array())
    {
        return $this->_model->insert_user($post);
    }

    function save_user($post = array())
    {
        return $this->_model->save_user($post);
    }

    /**
     * -------------------------------
     * 常用报表
     * -------------------------------
     */
    function stat()
    {
        $this->view('/admin/public/pager_header');
        $this->view('/admin/order/stat');
        $this->view('/admin/public/pager_footer');
    }

    function stat_get()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $xtype = $this->input->post('xtype');

        if (empty($start_date) || empty($end_date) || empty($xtype)) {
            exit("{}");
        }

        //时间跨度
        $result_json['xAxis']['categories'] = array();
        $start_time = strtotime($start_date);
        $end_time = strtotime($end_date);
        if ($xtype == 'm') {
            while ($start_time < $end_time) {
                $result_json['xAxis']['categories'][] = date('Ym', $start_time);
                $start_time = mktime(0, 0, 0, date('n', $start_time) + 1, 1, date('Y', $start_time));
            }
        } else {
            while ($start_time < $end_time) {
                $result_json['xAxis']['categories'][] = date('Ymd', $start_time);
                $start_time += 3600 * 24;
            }
        }


        $this->load->bll('order_bll');
        //订单总数 客单价
        $order_result = array();
        $total_order = $this->order_bll->get_list(null, null, null, null, null, null, $start_date, $end_date);
        foreach ($total_order as $val) {
            $order_result['total_order']['m'][date('Ym', $val['add_time'])] += 1;
            $order_result['total_order']['d'][date('Ymd', $val['add_time'])] += 1;

            $order_result['traveller_count']['m'][date('Ym', $val['add_time'])] += $val['adults'];
            $order_result['traveller_count']['d'][date('Ymd', $val['add_time'])] += $val['adults'];

            $order_result['total_price']['m'][date('Ym', $val['add_time'])] += $val['total_price'];
            $order_result['total_price']['d'][date('Ymd', $val['add_time'])] += $val['total_price'];
        }
        //有效订单数
        $valid_order = $this->order_bll->get_list(null, null, null, null, array(1, 2, 3, 4), null, $start_date, $end_date);
        foreach ($valid_order as $val) {
            $order_result['valid_order']['m'][date('Ym', $val['add_time'])] += 1;
            $order_result['valid_order']['d'][date('Ymd', $val['add_time'])] += 1;
        }
        //总金额
        foreach ($valid_order as $val) {
            $order_result['valid_price']['m'][date('Ym', $val['add_time'])] += $val['total_price'];
            $order_result['valid_price']['d'][date('Ymd', $val['add_time'])] += $val['total_price'];
        }
        //毛利润
        foreach ($total_order as $val) {
            $settlement = $this->order_bll->get_settlements_by_order_id($val['order_id']);
            if (isset($settlement['gross_margin'])) {
                $order_result['gross_margin']['m'][date('Ym', $val['add_time'])] += $settlement['gross_margin'];
                $order_result['gross_margin']['d'][date('Ymd', $val['add_time'])] += $settlement['gross_margin'];
            }
        }


        $data_total_order = array();
        $data_valid_order = array();
        $data_valid_price = array();
        $data_gross_margin = array();
        $data_travller_price = array();
        foreach ($result_json['xAxis']['categories'] as $val) {
            //总订单数、
            if (isset($order_result['total_order'][$xtype][$val])) {
                $data_total_order[] = $order_result['total_order'][$xtype][$val];
            } else {
                $data_total_order[] = 0;
            }
            //有效订单数、
            if (isset($order_result['valid_order'][$xtype][$val])) {
                $data_valid_order[] = $order_result['valid_order'][$xtype][$val];
            } else {
                $data_valid_order[] = 0;
            }
            //总金额、
            if (isset($order_result['valid_price'][$xtype][$val])) {
                $data_valid_price[] = $order_result['valid_price'][$xtype][$val] ;
            } else {
                $data_valid_price[] = 0;
            }
            //毛利润、
            if (isset($order_result['gross_margin'][$xtype][$val])) {
                $data_gross_margin[] = $order_result['gross_margin'][$xtype][$val] ;
            } else {
                $data_gross_margin[] = 0;
            }
            //客单价
            if (isset($order_result['traveller_count'][$xtype][$val]) && isset($order_result['total_price'][$xtype][$val]) && $order_result['traveller_count'][$xtype][$val] > 0) {
                $data_travller_price[] = intval($order_result['total_price'][$xtype][$val] / $order_result['traveller_count'][$xtype][$val]) ;
            } else {
                $data_travller_price[] = 0;
            }

        }
        $result_json['series1'][] = array(
            'type' => 'column',
            'name' => '总订单数',
            'data' => $data_total_order,
        );
        $result_json['series1'][] = array(
            'type' => 'column',
            'name' => '有效订单数',
            'data' => $data_valid_order,
        );
        $result_json['series2'][] = array(
            'type' => 'column',
            'name' => '客单价',
            'data' => $data_travller_price,
        );
        $result_json['series3'][] = array(
            'type' => 'spline',
            'name' => '总金额',
            'data' => $data_valid_price,
        );
        $result_json['series3'][] = array(
            'type' => 'spline',
            'name' => '毛利润',
            'data' => $data_gross_margin,
        );
        $this->lib('json');
        exit($this->json->encode($result_json));
    }

    function change_order_state($order_id = null)
    {
        if(empty($order_id)){
            showmessage('出错了');
        }
        $this->load->bll('order_bll');
        $order['order_id'] = $order_id;
        $order['order_state'] = 3;
        $r = $this->order_bll->update($order);
        if ($r)  {
            showmessage('删除成功', for_url('admin', 'order', 'detail', array($order_id)));
        } else {
            showmessage('编辑失败');
        }
    }

    /**
     * --------------------------------
     * 结算单管理
     * --------------------------------
     */
    function settlements()
    {
        $this->load->bll('order_bll');
        $page = intval($this->input->get_post('p'));
        $rows = 20;
        $r['rows'] = $this->order_bll->get_settlements_list($page, $rows);
        $r['total'] = ceil($this->order_bll->get_settlements_list_count() / $rows);
        foreach ($r['rows'] as &$val) {
            $suppliers = array();
            foreach ((array)explode(',', $val['supplier_ids']) as $sid) {
                $temp = $this->order_bll->get_supplier_by_id($sid);
                $suppliers[] = $temp['supplier_name'];
            }
            $val['suppliers'] = implode(',', $suppliers);
        }

        $this->view('/admin/public/pager_header');
        $this->view('/admin/order/settlements', $r);
        $this->view('/admin/public/pager_footer');
    }

    function settlements_edit($order_id = null, $settlement_id = null)
    {
        if (empty($order_id)) {
            showmessage('出错了');
        }
        $this->load->bll('order_bll');
        $order = $this->order_bll->get_by_id($order_id);

        if(!empty($settlement_id)){
            $data['settlement'] = $this->order_bll->get_settlements_by_id($settlement_id);
            $suppliers = array();
            foreach(explode(',', $data['settlement']['supplier_ids']) as $id){
                $suppliers[] = $this->order_bll->get_supplier_by_id($id);
            }
            $data['settlement']['suppliers'] = $suppliers;
        }
        $data['income'] = $order['total_price'];
        $data['order_id'] = $order_id;
        $data['settlement_id'] = $settlement_id;

        $this->view('/admin/public/pager_header');
        $this->view('/admin/order/settlements_edit', $data);
        $this->view('/admin/public/pager_footer');
    }

    function settlements_save()
    {
        $this->load->bll('order_bll');
        $order = $this->input->get_post('order');
        $supplier = array();
        foreach( $order['supplier'] as $key => $val){
            foreach( $val as $k => $v){
                $supplier[$k][$key] = $v;
            }
        }
        $supplier_ids = array();
        $expense = 0;
        foreach($supplier as $val){
            if($val['supplier_name'] && $val['money']){
                $r = $this->order_bll->save_supplier($val);
                if(!$r){
                    exit('{"state":false,"msg":"供应商添加失败"}');
                }
                $expense += $val['money'];
                $supplier_ids[] = $r;
            }else{
                exit('{"state":false,"msg":"供应商名称，花费不能为空"}');
            }
        }
        $gross_margin = $order['income'] - $expense;
        $data = array(
            'settlement_id' => $order['settlement_id'],
            'order_id' => $order['order_id'],
            'supplier_ids' => implode(',', $supplier_ids),
            'income' => $order['income'],
            'expense' => $expense,
            'gross_margin' => $gross_margin,
            'gross_profit_margin' => (number_format(($gross_margin / $order['income']), 4) * 100) . '%',
            'insurance' => $order['insurance'],
            'fees' => $order['fees'],
            'profit' => $gross_margin - ($order['insurance'] + $order['fees']),
        );
        $r = $this->order_bll->save_settlements($data);
        if (!$r) {
            exit('{"state":false,"msg":"结算单编辑失败"}');
        }
        exit('{"state":true,"msg":"结算单编辑成功"}');
    }

    function settlements_detail($id = null)
    {
        if (empty($id)) {
            showmessage('出错了');
        }
        $this->load->bll('order_bll');
        $data['data'] = $this->order_bll->get_settlements_by_id($id);
        $suppliers = array();
        foreach ((array)explode(',', $data['data']['supplier_ids']) as $sid) {
            $suppliers[] = $this->order_bll->get_supplier_by_id($sid);
        }
        $data['data']['suppliers'] = $suppliers;
        $data['data']['creator'] = $this->session->userdata('user_name');;
        $this->view('/admin/public/pager_header');
        $this->view('/admin/order/settlements_detail', $data);
        $this->view('/admin/public/pager_footer');
    }

    function settlements_del($id = null)
    {
        if (empty($id)) {
            showmessage('出错了');
        }
        $this->load->bll('order_bll');
        $r = $this->order_bll->settlements_del($id);

        if ($r) {
            showmessage('删除成功', for_url('admin', 'order', 'settlements'));
        } else {
            showmessage('删除失败');
        }
    }
}