<div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
    <div class="clear"></div>
    <!-- End .content-box -->
    <div class="content-box">
        <!-- Start Content Box -->
        <div class="content-box-header">
            <h3>修改模块信息</h3>
            <div class="clear"></div>
        </div>
        <!-- End .content-box-header -->

        <div class="content-box-content">
            <div class="tab-content">
                <form name="frm" id="form1" action="<?php echo for_url('system', 'system','system_save'); ?>"  method="post">
                    <fieldset>
                        <div>
                            <label>注册状态</label>
                            <select name="system[sys_parent_id]">
                                <option value="0">父模块</option>
                                <?php
                                foreach($syslist as $val){
                                    $selected = ($data['sys_parent_id'] == $val['sys_id']) ? 'selected' : '';
                                    echo '<option '.$selected.' value="'.$val['sys_id'].'">'.$val['sys_name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div>
                            <label>名称</label>
                            <input type="text" value="<?php echo $data['sys_name'] ?>" size="30" class="text-input small-input" id="sys_name" name="system[sys_name]">
                            <div id="sys_nameTip" class="input-tip"></div>
                        </div>
                        <div>
                            <label>module</label>
                            <input type="text" value="<?php echo $data['sys_module'] ?>" size="30" class="text-input small-input" id="sys_module" name="system[sys_module]">
                            <div id="sys_moduleTip" class="input-tip"></div>
                        </div>
                        <div>
                            <label>controller</label>
                            <input type="text" value="<?php echo $data['sys_controller'] ?>" size="30" class="text-input small-input" id="sys_controller" name="system[sys_controller]">
                            <div id="sys_controllerTip" class="input-tip"></div>
                        </div>
                        <div>
                            <label>action</label>
                            <input type="text" value="<?php echo $data['sys_action'] ?>" size="30" class="text-input small-input" id="sys_action" name="system[sys_action]">
                            <div id="sys_actionTip" class="input-tip"></div>
                        </div>

                        <div>
                            <label>排序</label>
                            <input type="text" value="<?php echo $data['sys_order_id'] ?>" size="30" class="text-input small-input" id="sys_order_id" name="system[sys_order_id]">
                            <div id="sys_order_idTip" class="input-tip"></div>
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
                            <label>注册状态</label>
                            <select name="role[visiabled]" id="visiabled">
                                <?php if ($data['visiabled']) { ?>
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
                            <input type="hidden" name="role[role_id]" value="<?php echo $data['sys_id'] ?>">
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
        $.formValidator.initConfig({formID:"form1",onError:function(msg){
            cAlert(msg,'error')
        },inIframe:true});

        $("#sys_name").formValidator({onShow:"请输入系统",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $("#sys_module").formValidator({onShow:"请输入控制器",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $("#sys_controller").formValidator({onShow:"请输入控制器",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $("#sys_action").formValidator({onShow:"请输入方法",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $("#sys_order_id").formValidator({onShow:"请输入排序字段",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});

        $.formValidator.reloadAutoTip();
    });
</script>
