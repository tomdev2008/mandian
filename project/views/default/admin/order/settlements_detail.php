
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php echo config_item('charset'); ?>">
    <title><?php echo config_item('site_name'); ?></title>
    <meta name="keywords" content="<?php echo config_item('site_keyword'); ?>" />
    <meta name="description" content="<?php echo config_item('site_description'); ?>" />

    <style type="text/css">
        body{font:normal 14px/1.5 '宋体',serif; background-color: #fff}

        .btn{font-size: 18px;padding:2px 10px;}
        caption{font-size: 28px;font-weight: bold;}
        table{width:714px;margin:0 auto;border-collapse: collapse;border-spacing: 0;}
        td{border:1px solid #000;padding:2px;width:100px;text-align: center;height:1em;border-spacing: 0;}
        td.no-border{border:0;text-align: left;}
        .print-hide{width: 714px;margin:0 auto;*display: none;}
        @media print{
            .print-hide{display: none;}
        }
    </style>
</head>
<body>
<div class="print-hide">
    <p>
        <button onclick="window.print()" class="btn">打印</button>
    </p>
</div>
<table>
    <caption>结算单</caption>
    <tbody>
    <tr>
        <td>订单编号</td>
        <td colspan="3"><?php echo $data['order_num']; ?></td>
        <td>人数</td>
        <td colspan="2"><?php echo ($data['adults']+$data['kids']); ?></td>
    </tr>
    <tr>
        <td>产品名称</td>
        <td colspan="6"><?php echo $data['pro_name']; ?></td>
    </tr>
    <tr>
        <td>联系人姓名</td>
        <td colspan="3"><?php echo $data['contact_name']; ?></td>
        <td>手机号码</td>
        <td colspan="2"><?php echo $data['contact_phone']; ?></td>
    </tr>
    <tr>
        <td>产品价格</td>
        <td>成人</td>
        <td><?php echo $data['adults']; ?></td>
        <td>儿童</td>
        <td><?php echo $data['kids']; ?></td>
        <td>其他</td>
        <td></td>
    </tr>
    <tr>
        <td>合计收入</td>
        <td colspan="6"><?php echo $data['total_price']; ?>元</td>
    </tr>
    <!-- 收款记录-->
    <tr>
        <td class="no-border" colspan="7">收款记录：</td>
    </tr>
    <tr>
        <td colspan="2">付款时间</td>
        <td colspan="2">付款方式</td>
        <td colspan="3">备注</td>
    </tr>
    <tr>
        <td colspan="2"><?php echo date('Y-m-d H:i:s', $data['total_price']); ?></td>
        <td colspan="2"><?php echo ($data['order_pay_type'] == 1)? '线上支付' : '线下支付'; ?></td>
        <td colspan="3"><?php echo $data['pay_name']; ?></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="3"></td>
    </tr>
    <!-- 支出记录-->
    <tr>
        <td class="no-border" colspan="7">支出记录：</td>
    </tr>
    <tr>
        <td colspan="2">供应商名称</td>
        <td colspan="2">备注</td>
        <td>费用</td>
        <td colspan="2">付款情况</td>
    </tr>
    <?php
        foreach($data['suppliers'] as $val){
            echo '<tr>';
            echo '<td colspan="2">',$val['supplier_name'],'</td>';
            echo '<td colspan="2">',$val['money_explain'],'</td>';
            echo '<td>',$val['money'],'</td>';
            echo '<td colspan="2">',$val['supplier_name'],'</td>';
            echo '</tr>';
        }
    ?>          <!-- 利润表-->
    <tr>
        <td class="no-border" colspan="7">利润表：</td>
    </tr>
    <tr>
        <td>收入团款</td>
        <td>成本支出</td>
        <td>毛利</td>
        <td>毛利率</td>
        <td>保险费</td>
        <td>手续费</td>
        <td>净利润</td>
    </tr>
    <tr>
        <td><?php echo $data['income']; ?></td>
        <td><?php echo $data['expense']; ?></td>
        <td><?php echo $data['gross_margin']; ?></td>
        <td><?php echo $data['gross_profit_margin']; ?></td>
        <td><?php echo $data['insurance']; ?></td>
        <td><?php echo $data['fees']; ?></td>
        <td><?php echo $data['profit']; ?></td>
    </tr>
    <tr>
        <td class="no-border" colspan="2">制表人:<?php echo $data['creator']; ?></td>
        <td class="no-border" colspan="2">主管签字:</td>
        <td class="no-border" colspan="2">财务签字:</td>
        <td class="no-border">签字:</td>
    </tr>
    </tbody>
</table>
</body>
</html>