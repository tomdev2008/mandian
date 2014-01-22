

<body>

    <!--查询表单-->
    <form name="frm" id="form1" action="<?php echo for_url('admin', 'order','index'); ?>"  method="post">
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    订单号：<input type="text" value="<?php echo $filter['order_num']; ?>" size="10" class="input-text" name="order[order_num]">
                    产品名称：<input type="text" value="<?php echo $filter['pro_name']; ?>" size="20" class="input-text" name="order[pro_name]">
                    订单状态：
                    <select id="order_state" name="order[order_state]">
                        <option value="0">全部</option>
                        <option value="1">未支付</option>
                        <option value="2">未付款，已确认</option>
                        <option value="3">已支付已预定</option>
                        <option value="4">交易成功</option>
                        <option value="5">交易关闭</option>
                        <option value="6">退款中</option>
                        <option value="7">付款超时</option>
                    </select>
                    <script type="text/javascript">
                        $('#order_state').val('<?php echo $filter['order_state'] ?>');
                    </script>
                    联系人：<input type="text" value="<?php echo $filter['contact_name']; ?>" size="10" class="input-text" name="order[contact_name]">
                    下单时间：<input type="text" onfocus="WdatePicker()" value="<?php echo $filter['start_time']; ?>" size="5" class="input-text" name="order[start_time]">
                    到<input type="text" onfocus="WdatePicker()" value="<?php echo $filter['end_time']; ?>" size="5" class="input-text" name="order[end_time]">
                    <input type="submit" id="btn" class="btn" value="查询">
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    </form>
    <!--/查询表单-->

    <!--列表-->
    <table class="table-list" width="100%">
        <thead>
        <tr>
            <th>订单号</th>
            <th>产品名称</th>
            <th>发团日期</th>
            <th>联系人/电话</th>
            <th>下单日期</th>
            <th>状态</th>
            <th>订单来源</th>
            <th>实收金额</th>
            <th>详情</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $order_state = array( 0 => '','1' => '未支付','2' => '未付款，已确认','3' => '已支付已预定','4' => '交易成功','5' => '交易关闭','6' => '退款中','7' => '付款超时');
        $order_source = array( 0 => '','1' => '是爱旅行','2' => '是去哪儿网','3' => '蚂蜂窝','4' => '其它');
        foreach($rows as $val){
            echo '<tr>';
            echo '<td>'.$val['order_num'].'</td>';
            echo '<td class="left">'.$val['pro_name'].'</td>';
            echo '<td>'.date('Y-m-d', $val['set_out_time']).'</td>';
            echo '<td>'.$val['contact_name'].'/'.$val['contact_phone'].'</td>';
            echo '<td>'.date('Y-m-d H:i:s', $val['add_time']).'</td>';
            echo '<td>'.($order_state[$val['order_state']]).'</td>';
            echo '<td>'.($order_source[$val['source']]).'</td>';
            echo '<td>￥'.$val['total_price'].'</td>';
            echo '<td><a href="',for_url('admin','order','detail', array($val['order_id'])), '" title="Edit">[详情]</a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="9">
                <div class="bulk-actions align-left">
                    <!--<select name="dropdown">
                        <option value="option1">操作...</option>
                        <option value="option3">删除</option>
                    </select>
                    <a class="button" href="#">确认</a> -->
                </div>
                <div class="pagination" id="seaPager">
                    <script type="text/javascript">
                        seajs.config({
                            alias: {
                                "pager": "alias/pager/pager"
                            }
                        });
                        var _pg = null;
                        seajs.use(["pager"], function(pager){
                            _pg = pager;
                            _pg.pageCount = <?php echo $total; ?>; //定义总页数(必要)
                            _pg.argName = 'p';    //定义参数名(可选,缺省为page)
                            _pg.printHtml('seaPager');        //显示页数
                        });
                    </script>
                </div>
                <!-- End .pagination -->
                <div class="clear"></div>
            </td>
        </tr>
        </tfoot>
    </table>
    <!--/列表-->
</body>
<!-- My97DatePicker -->
<script language="JavaScript" type="text/javascript" src="/public/resource/js/sea-modules/alias/My97DatePicker/WdatePicker.js" charset="UTF-8"></script>
