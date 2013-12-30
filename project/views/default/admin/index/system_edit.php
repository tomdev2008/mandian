
<body class="easyui-layout">
<div data-options="region:'center',title:'<?php echo $current_pos; ?>'">

    <!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>修改系统模块信息</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <!--表格-->
        <table width="100%" class="table-form contentWrap">
            <form name="frm" id="form1" action="<?php echo for_url('admin','index','system_save')?>"  method="post">
                <tbody>
                <tr>
                    <td>模块层次</td>
                    <td>
                        <select name="system[sys_parent_id]">
                            <option value="0">父模块</option>
                            <?php
                            foreach($syslist as $val){
                                $selected = ($data['sys_parent_id'] == $val['sys_id']) ? 'selected' : '';
                                echo '<option '.$selected.' value="'.$val['sys_id'].'">'.$val['sys_name'].'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td width="80">模块名</td>
                    <td><input type="text" value="<?php echo $data['sys_name'] ?>" size="30" class="input-text" id="sys_name" name="system[sys_name]"></td>
                    <td><div id="sys_nameTip" class="input-tip"></div></td>
                </tr>
                <tr>
                    <td width="80">模块module</td>
                    <td><input type="text" value="<?php echo $data['sys_module'] ?>" size="30" class="input-text" id="sys_module" name="system[sys_module]"></td>
                    <td><div id="sys_moduleTip" class="input-tip"></div></td>
                </tr>
                <tr>
                    <td width="80">模块controller</td>
                    <td><input type="text" value="<?php echo $data['sys_controller'] ?>" size="30" class="input-text" id="sys_controller" name="system[sys_controller]"></td>
                    <td><div id="sys_controllerTip" class="input-tip"></div></td>
                </tr>
                <tr>
                    <td width="80">模块action</td>
                    <td><input type="text" value="<?php echo $data['sys_action'] ?>" size="30" class="input-text" id="sys_action" name="system[sys_action]"></td>
                    <td><div id="sys_actionTip" class="input-tip"></div></td>
                </tr>
                <tr>
                    <td width="80">排序ID</td>
                    <td><input type="text" value="<?php echo $data['sys_order_id'] ?>" size="30" class="input-text" id="sys_order_id" name="system[sys_order_id]"></td>
                    <td><div id="sys_order_idTip" class="input-tip"></div></td>
                </tr>
                <tr>
                    <td>注册状态</td>
                    <td>
                        <select name="system[enabled]">
                            <?php if($data['enabled']){ ?>
                                <option selected value="1">是</option>
                                <option value="0">否</option>
                            <?php }else{ ?>
                                <option value="1">是</option>
                                <option selected value="0">否</option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><div id="user_nameTip" class="input-tip"></div></td>
                </tr>
                <tr>
                    <td>可视</td>
                    <td>
                        <select name="system[visiabled]">
                            <?php if($data['visiabled']){ ?>
                                <option selected value="1">是</option>
                                <option value="0">否</option>
                            <?php }else{ ?>
                                <option value="1">是</option>
                                <option selected value="0">否</option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><div id="user_nameTip" class="input-tip"></div></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" id="btn" class="button" value="提交">
                        <input type="hidden" name="system[sys_id]" value="<?php echo $data['sys_id'] ?>">
                    </td>
                </tr>
                </tbody>
            </form>
        </table>
        <!--/表格-->

    </div>
    <!--/内容-->
</div>
</div>
</body>
<!--/内容区-->
<!-- formValidator-4.1.0.js -->
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidator-4.1.0.js" type="text/javascript" charset="UTF-8"></script>
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){
        $.formValidator.initConfig({formID:"form1",theme:'ArrowSolidBox',mode:'AutoTip',onError:function(msg){
            _alert(msg,'error')
        },inIframe:true});

        $("#sys_name").formValidator({onShow:"请输入系统",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $("#sys_module").formValidator({onShow:"请输入控制器",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $("#sys_controller").formValidator({onShow:"请输入控制器",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $("#sys_action").formValidator({onShow:"请输入方法",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $("#sys_order_id").formValidator({onShow:"请输入排序字段",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});

        $.formValidator.reloadAutoTip();
    });
</script>
