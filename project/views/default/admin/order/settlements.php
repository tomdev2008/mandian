

<body>

    <!--列表-->
    <table class="table-list" width="100%">
        <thead>
        <tr>
            <th>订单号</th>
            <th>产品名称</th>
            <th>供应商</th>
            <th>付款时间</th>
            <th>合计收入</th>
            <th>详情</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($rows as $val){
            echo '<tr>';
            echo '<td>'.$val['order_num'].'</td>';
            echo '<td class="left">'.$val['pro_name'].'</td>';
            echo '<td class="left">'.$val['suppliers'].'</td>';
            echo '<td>'.date('Y-m-d H:i:s', $val['pay_time']).'</td>';
            echo '<td>￥'.$val['total_price'].'</td>';
            echo '<td><a href="javascript:opens('.$val['settlement_id'].');" title="Edit">[详情]</a>&nbsp;';
            echo '<a href="javascript:del('.$val['settlement_id'].');" title="Edit">[删除]</a></td>';
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

<script>
    function opens(id){
        var url = '<?php echo for_url('admin','order','settlements_detail'); ?>' + id;
        var iTop = (window.screen.availHeight - 550) / 2;
        var iLeft = (window.screen.availWidth - 640) / 2;
        window.open(url, '结算单', 'height=650, width=800, top=' + iTop + ', left=' + iLeft + ', toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');

    }
    function del(id){
        _confirm('确认删除？',function(){
            location.href = '<?php echo for_url('admin','order','settlements_del'); ?>' + id;
        });
    }
</script>
