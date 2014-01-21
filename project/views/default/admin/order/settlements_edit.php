<style type="text/css">
    .labelspan {
        margin: 2px 5px;
        display: inline-block;
    }

    .labelspan input {
        margin: 0px 3px;
    }
</style>
<body>
<!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>结算单</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <!--表格-->
        <form name="frm" id="form1" action="<?php echo for_url('admin', 'order', 'settlements_save'); ?>" method="post">
            <?php if(empty($settlement['suppliers'])){ ?>
                <table width="100%" class="table-form contentWrap">
                    <tbody>
                    <tr>
                        <td colspan="3">
                            供应商
                            <input type="button" value="添加" id="add-supplier"  size="40" class="btn btn-mini btn-success">
                        </td>
                    </tr>
                    <tr>
                        <td width="80">供应商</td>
                        <td><input type="text" value="" size="30" class="input-text" name="order[supplier][supplier_name][]"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="80">费用</td>
                        <td><input type="text" value="" size="10" class="input-text" name="order[supplier][money][]"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="80">付款情况</td>
                        <td><input type="text" value="" size="40" class="input-text" name="order[supplier][money_explain][]"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="80">备注</td>
                        <td><input type="text" value="" size="40" class="input-text" name="order[supplier][remark][]"></td>
                        <td><input type="hidden" value="" name="order[supplier][supplier_id][]">
                        </td>
                    </tr>
                    </tbody>
                </table>
            <?php }else{ ?>
                <?php foreach($settlement['suppliers'] as $key => $val){ ?>
                    <table width="100%" class="table-form contentWrap">
                        <tbody>
                        <tr>
                            <td colspan="3">
                                供应商
                                <?php if(empty($key)){ ?>
                                    <input type="button" value="添加" id="add-supplier"  size="40" class="btn btn-mini btn-success">
                                <?php }else{ ?>
                                    <input type="button" value="删除" rel="del-supplier" size="40" class="btn btn-mini btn-danger">
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="80">供应商</td>
                            <td><input type="text" value="<?=$val['supplier_name']?>" size="30" class="input-text" name="order[supplier][supplier_name][]"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="80">费用</td>
                            <td><input type="text" value="<?=$val['money']?>" size="10" class="input-text" name="order[supplier][money][]"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="80">付款情况</td>
                            <td><input type="text" value="<?=$val['money_explain']?>" size="40" class="input-text" name="order[supplier][money_explain][]"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="80">备注</td>
                            <td><input type="text" value="<?=$val['remark']?>" size="40" class="input-text" name="order[supplier][remark][]"></td>
                            <td><input type="hidden" value="<?=$val['supplier_id']?>" name="order[supplier][supplier_id][]">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php } ?>
            <?php } ?>

            <table width="100%" class="table-form contentWrap" style="border-top:5px solid #D5DFE8;">
                <tbody>
                <tr>
                    <td width="80">保险费</td>
                    <td><input type="text" value="<?php echo $settlement['insurance'] ?>" size="10" id="insurance"
                               class="input-text" name="order[insurance]"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="80">手续费</td>
                    <td><input type="text" value="<?php echo $settlement['fees'] ?>" size="10" id="fees" class="input-text"
                               name="order[fees]"></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" id="btn" class="btn btn-success" value="提交">
                        <input type="button" id="btn" class="btn" value="返回" onclick="location.href='<?php echo for_url('admin', 'order', 'detail', array($order_id)) ?>';">
                        <input type="hidden" name="order[order_id]" value="<?php echo $order_id ?>">
                        <input type="hidden" name="order[settlement_id]" value="<?php echo $settlement_id ?>">
                        <input type="hidden" name="order[income]" value="<?php echo $income ?>">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
        <!--/表格-->

    </div>
    <!--/内容-->
</div>
</body>
<!--/内容区-->

<script type="text/javascript">
    $(function () {

        $('#form1').submit(function () {
            doForm($('#form1').attr('action'), $('#form1').serialize(), function (data) {
                _alert(data.msg, function () {
                    if (data.state) {
                        location.href = '<?php echo for_url('admin', 'order','detail', array($order_id)); ?>';
                    }
                })
                return;
            });
            return false;
        });

        $('#add-supplier').click(function(){
            var tar = $('#form1').find('table:last');
            var html = $($('#template').html()).clone();
            tar.before(html);
        })

        $('input[rel=del-supplier]').live('click', function(){
            $(this).parents('table').remove();
        });
    });
</script>
<script id="template" type="text/html">
    <table width="100%" class="table-form contentWrap">
        <tbody>
        <tr>
            <td colspan="3" style="text-align: left;">
                供应商
                <input type="button" value="删除" rel="del-supplier" size="40" class="btn btn-mini btn-danger">
            </td>
        </tr>
        <tr>
            <td width="80">供应商</td>
            <td><input type="text" value="" size="30" class="input-text"
                       name="order[supplier][supplier_name][]"></td>
            <td></td>
        </tr>
        <tr>
            <td width="80">费用</td>
            <td><input type="text" value="" size="10" class="input-text" name="order[supplier][money][]"></td>
            <td></td>
        </tr>
        <tr>
            <td width="80">付款情况</td>
            <td><input type="text" value="" size="40" class="input-text"
                       name="order[supplier][money_explain][]"></td>
            <td></td>
        </tr>
        <tr>
            <td width="80">备注</td>
            <td><input type="text" value="" size="40" class="input-text" name="order[supplier][remark][]"></td>
            <td><input type="hidden" value="" name="order[supplier][supplier_id][]">
            </td>
        </tr>
        </tbody>
    </table>
</script>
