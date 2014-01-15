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
            <form name="frm" id="form1" action="<?php echo for_url('admin', 'order','user_save'); ?>"  method="post">
            <tbody>
            <tr>
                <td width="80">是否成人</td>
                <td>
                    <select id="is_adults" name="order[is_adults]">
                        <option value="1">是</option>
                        <option value="0">否</option>
                    </select>
                    <script type="text/javascript">
                        $('#is_adults').val('<?php echo $data['is_adults'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">联系人</td>
                <td><input type="text" value="<?php echo $data['user_name'] ?>" size="30" id="user_name" class="input-text" name="order[user_name]"></td>
                <td></td>
            </tr>
            <tr>
                <td width="80">证件类型</td>
                <td>
                    <select name="card_type" id="card_type">
                        <option value="身份证">身份证</option>
                        <option value="护照">护照</option>
                        <option value="军人证">军人证</option>
                        <option value="港澳通行证">港澳通行证</option>
                        <option value="其他证件">其他证件</option>
                    </select>
                    <script type="text/javascript">
                        $('#card_type').val('<?php echo $data['card_type'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">证件号码</td>
                <td><input type="text" value="<?php echo $data['card_num'] ?>" size="60" class="input-text" name="order[card_num]"></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" id="btn" class="button" value="提交">
                    <input type="button" id="btn" class="button" value="返回" onclick="location.href='<?php echo for_url('admin','order','detail', array($data['order_id'])) ?>';">
                    <input type="hidden" name="order[order_id]" value="<?php echo $data['order_id'] ?>">
                    <input type="hidden" name="order[id]" value="<?php echo $data['id'] ?>">
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
