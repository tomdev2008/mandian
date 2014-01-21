<style type="text/css">
    .labelspan{ margin: 2px 5px; display: inline-block;}
    .labelspan input{ margin: 0px 3px;}
</style>
<body>
    <!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>修改酒店信息</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <!--表格-->
        <table width="100%" class="table-form contentWrap">
            <form name="frm" id="form1" action="<?php echo for_url('admin', 'order','save'); ?>"  method="post">
            <tbody>
            <tr>
                <td width="80">联系人</td>
                <td><input type="text" value="<?php echo $data['contact_name'] ?>" size="30" id="contact_name" class="input-text" name="order[contact_name]"></td>
                <td><div id="contact_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">联系人手机</td>
                <td><input type="text" value="<?php echo $data['contact_phone'] ?>" size="30" class="input-text" name="order[contact_phone]"></td>
                <td><div id="contact_phoneTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">联系人邮箱</td>
                <td><input type="text" value="<?php echo $data['contact_email'] ?>" size="60" class="input-text" name="order[contact_email]"></td>
                <td></td>
            </tr>
            <tr>
                <td width="80">订单来源</td>
                <td>
                    <select id="source" name="order[source]">
                        <option value="1">爱旅行</option>
                        <option value="2">山水TTS</option>
                        <option value="3">爱旅行TTS</option>
                        <option value="4">蚂蜂窝</option>
                        <option value="5">穷游</option>
                        <option value="6">其他</option>
                    </select>
                    <script type="text/javascript">
                        $('#source').val('<?php echo $data['source'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">订单价格</td>
                <td><input type="text" value="<?php echo $data['total_price'] ?>" size="5" id="total_price" class="input-text" name="order[total_price]"></td>
                <td><div id="total_priceTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">备注</td>
                <td colspan="2">
                    <textarea id="special" name="order[remark]" style="width: 500px; height: 150px"><?php echo $data['remark'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" id="btn" class="btn btn-success" value="提交">
                    <input type="button" id="btn" class="btn" value="返回" onclick="location.href='<?php echo for_url('admin','order','detail', array($data['order_id'])) ?>';">
                    <input type="hidden" name="order[order_id]" value="<?php echo $data['order_id'] ?>">
                </td>
            </tr>
            </tbody>
            </form>
        </table>
        <!--/表格-->

    </div>
    <!--/内容-->
</div>
</body>
<!--/内容区-->

<!-- formValidator-4.1.0.js -->
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidator-4.1.0.js" type="text/javascript" charset="UTF-8"></script>
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){
        //验证
        $.formValidator.initConfig({formID:"form1",theme:'ArrowSolidBox',mode:'AutoTip',onError:function(msg){
            _alert(msg,'error')
        }, onSuccess: function(){
            doForm($('#form1').attr('action'),$('#form1').serialize(), function(data){
                _alert(data.msg, function(){
                    if(data.state){
                        location.href = '<?php echo for_url('admin', 'order','detail', array($data['order_id'])); ?>';
                    }
                })
                return ;
            });
        },inIframe:true});

        $("#contact_name").formValidator({onShow:"请输入联系人名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#contact_phone").formValidator({onShow:"请输入联系人电话",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#total_price").formValidator({onShow:"请输入价格",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $.formValidator.reloadAutoTip();

        $('#form1').submit(function(){
            return false;
        });
    });

</script>
