<div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
    <div class="clear"></div>
    <!-- End .content-box -->
    <div class="content-box">
        <!-- Start Content Box -->
        <div class="content-box-header">
            <h3>修改角色信息</h3>
            <div class="clear"></div>
        </div>
        <!-- End .content-box-header -->

        <div class="content-box-content">
            <div class="tab-content">
                <form name="frm" id="form1" action="<?php echo for_url('system', 'user','role_save'); ?>"  method="post">
                    <fieldset>
                        <div>
                            <label>角色名</label>
                            <input type="text" value="<?php echo $data['role_name'] ?>" size="30" id="role_name" class="text-input small-input" name="role[role_name]">
                            <div id="role_nameTip" class="input-tip"></div>
                        </div>
                        <div>
                            <label>注册状态</label>
                            <select name="role[enabled]" id="enabled">
                                <?php if ($data['enabled']) { ?>
                                    <option selected value="1">是</option>
                                    <option value="0">否</option>
                                <?php } else { ?>
                                    <option value="1">是</option>
                                    <option selected value="0">否</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <input class="button" type="submit" value="保存"/>
                            <input type="hidden" name="role[role_id]" value="<?php echo $data['role_id'] ?>">
                        </div>
                    </fieldset>
                    <div class="clear"></div>
                    <!-- End .clear -->
                </form>
            </div>
            <!-- End #tab2 -->
        </div>
        <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
</div>
<!-- End #main-content -->

<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidator-4.1.0.js" type="text/javascript" charset="UTF-8"></script>
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){
        $.formValidator.initConfig({formID:"form1", onError:function(msg){
            cAlert(msg,'error')
        },inIframe:true});
        $("#role_name").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $.formValidator.reloadAutoTip();
    });
</script>
