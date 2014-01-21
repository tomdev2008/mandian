<style type="text/css">
    label{ font-weight: bold; margin: 0px 0px 0px 15px;}
</style>
<body>
    <!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>订单详情</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <!--表格-->
        <table width="100%" class="table-form contentWrap">
            <thead>
            <th align="left">订单信息</th>
            </thead>
            <tbody>
            <tr>
                <td>
                    <?php
                    $order_state = array( 0 => '','1' => '未支付','2' => '未付款，已确认','3' => '已支付已预定','4' => '交易成功','5' => '交易关闭','6' => '退款中','7' => '付款超时');
                    $order_source = array( 0 => '','1' => '是爱旅行','2' => '是去哪儿网','3' => '蚂蜂窝','4' => '其它');
                    ?>
                    <label>订单号：</label><?php echo $order['order_num']; ?>
                    <label>订单状态：</label> <?php echo $order_state[$order['order_state']]; ?>
                    <label>支付方式：</label> <?php echo ($order['order_pay_type'] == 1)? '线上支付' : '线下支付' ; ?>   <?php echo $order['pay_name']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>预定时间：</label><?php echo date('Y-m-d H:i:s', $order['add_time']); ?>
                    <label>支付时间：</label> <?php echo date('Y-m-d H:i:s', $order['pay_time']); ?>
                    <label>支付流水号：</label><?php echo $order['pay_num']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>订单来源：</label> <?php echo $order_source[$order['source']]; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>产品名称：</label><?php echo $order['pro_name']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>团号：</label><?php echo $order['pro_id']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>类型：</label><?php echo ( $order['way_type'] == 1)? '自由行' : '跟团游'; ?>
                    <label>出发城市：</label><?php echo $order['start']; ?>
                    <label>出团日期：</label> 2014-01-23
                    <?php
                    if($order['state'] == 4){
                        echo date('Y-m-d H:i:s', $order['start_date']);
                    }else{
                        //echo date('Y-m-d H:i:s', $order['set_out_time']);
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>供应商：</label><?php echo $order['supplier']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>订单金额：</label> ¥ <?php echo $order['total_price']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>客户留言：</label><?php echo $order['contact_message']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>备注：</label><?php echo $order['remark']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo for_url('admin','order','edit', array($order['order_id'])) ?>" class="btn" >修改订单</a>
                    <a href="#" class="btn btn-warning" data-options="iconCls:'icon-options'">生成结算单</a>
                </td>
            </tr>
            </tbody>
            <thead>
            <th align="left">客服信息</th>
            </thead>
            <tbody>
            <tr>
                <td>
                    <label>姓名：</label>
                    <label>手机：</label>
                </td>
            </tr>
            </tbody>
            <thead>
            <th align="left">联系人信息</th>
            </thead>
            <tbody>
            <tr>
                <td>
                    <label>联系人：</label><?php echo $order['contact_name']; ?>
                    <label>手机号码：</label><?php echo $order['contact_phone']; ?>
                    <br />
                    <label>邮   箱：</label><?php echo $order['contact_email']; ?>
                    <label>是否回访：</label> <?php echo ( $order['visit'] == 1)? '是' : '否'; ?>
                </td>
            </tr>
            </tbody>
            <thead>
            <th align="left">旅客信息</th>
            </thead>
            <tbody>
            <tr>
                <td>
                    <label>成人：</label><?php echo $order['adults']; ?>人
                    <label>儿童：</label><?php echo $order['kids']; ?>人
                    <label>房间数：</label><?php echo $order['total_room']; ?>人
                    <label>同意拼房：</label><?php echo ( $order['flatshare'] == 1)? '是' : '否'; ?>

                    <a href="<?php echo for_url('admin','order','user_edit', array($order['order_id'])) ?>" data-options="iconCls:'icon-add'" class="btn btn-mini btn-success">添加旅客</a>
                </td>
            </tr>
            <?php
            foreach($order_users as $user){
                echo '<tr><td> ';
                echo '<label>游客类型：</label>', ($user['is_adults'])?'成人 ' :'儿童 ' ,'<label>姓名：</label>',$user['user_name'],'<br/>';
                echo '<label>证件类型：</label>',$user['card_type'],' <label>证件号码：</label>',$user['card_num'],'<br/>';
                echo '<a href="',for_url('admin','order','user_edit', array($order['order_id'], $user['id'])) ,'"  class="btn btn-mini">修改</a>&nbsp;';
                echo '<a href="javascript:delUser(',$order['order_id'],',', $user['id'] ,');"  class="btn btn-mini btn-warning">删除</a>';
                echo '</td></tr>';
            }
            ?>
            </tbody>
            <thead>
            <th align="left">操作日志</th>
            </thead>
            <tbody>
            <!--<tr>
                <td>
                    <label>2013-12-19 16:43</label>[15600371383]订单付款成功 <br />
                </td>
            </tr>-->
            </tbody>
        </table>
        <!--/表格-->

    </div>
    <!--/内容-->
</div>
</body>
<!--/内容区-->
<script type="text/javascript">
    $(function(){

    /**
     * 用户删除
     * @param id
     */
    function delUser(order_id, id){
        _confirm('确认删除？',function(){
            location.href = '<?php echo for_url('admin','order','user_del'); ?>'+ order_id + '/' + id;
        });
    }
</script>

