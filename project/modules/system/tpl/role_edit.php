<!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>修改角色信息</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <!--表格-->
        <table width="100%" class="table-form contentWrap">
            <form name="frm" id="form1" action="<?php echo for_url('system', 'user','role_save'); ?>"  method="post">
            <tbody>
            <tr>
                <td width="80">角色名</td>
                <td><input type="text" value="<?php echo $data['role_name'] ?>" size="30" id="role_name" class="input-text" name="role[role_name]"></td>
                <td><div id="role_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td>状态</td>
                <td>
                    <select name="role[enabled]">
                        <?php if($data['enabled']){ ?>
                            <option selected value="1">是</option>
                            <option value="0">否</option>
                        <?php }else{ ?>
                            <option value="1">是</option>
                            <option selected value="0">否</option>
                        <?php } ?>
                    </select>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" id="btn" class="button" value="提交">
                    <input type="hidden" name="role[role_id]" value="<?php echo $data['role_id'] ?>">
                </td>
            </tr>
            </tbody>
            </form>
        </table>
        <!--/表格-->

    </div>
    <!--/内容-->
</div>
<!--/内容区-->
<script src="/resource/js/sea-modules/alias/formValidator4.1.0/formValidator-4.1.0.js" type="text/javascript" charset="UTF-8"></script>
<script src="/resource/js/sea-modules/alias/formValidator4.1.0/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){
        $.formValidator.initConfig({formID:"form1",theme:'ArrowSolidBox',mode:'AutoTip',onError:function(msg){
            cAlert(msg,'error')
        },inIframe:true});

        $("#role_name").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});

        $.formValidator.reloadAutoTip();
    });
</script>
