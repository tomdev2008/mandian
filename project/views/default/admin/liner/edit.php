<style type="text/css">
    .labelspan{ margin: 2px 5px; display: inline-block;}
    .labelspan input{ margin: 0px 3px;}
</style>
<body>
    <!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>修改信息</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <table width="100%" class="table-form contentWrap">
            <tr>
                <td>
                    <div class="tabs-container" style="width: auto; height: auto;">
                        <div class="tabs-header">
                            <div class="tabs-wrap" style="margin-left: 0px; margin-right: 0px; width: 5004px;">
                                <ul class="tabs" style="height: 26px;">
                                    <?php if(empty($data['liner_id'])){ ?>
                                        <li class="tabs-selected">
                                            <a class="tabs-inner" href="javascript:" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">基本信息</span>
                                            </a
                                        </li>
                                        <li class="">
                                            <a class="tabs-inner" href="javascript:" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">舱房信息</span></a>
                                        </li>
                                        <li class="">
                                            <a class="tabs-inner" href="javascript:" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">楼层详情</span>
                                            </a>
                                        </li>
                                    <?php }else{ ?>
                                        <li class="tabs-selected">
                                            <a class="tabs-inner" href="<?php echo for_url('admin','liner','edit', array($data['liner_id'])); ?>" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">基本信息</span>
                                            </a
                                        </li>
                                        <li class="">
                                            <a class="tabs-inner" href="<?php echo for_url('admin','liner','room_list', array($data['liner_id'])); ?>" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">舱房信息</span></a>
                                        </li>
                                        <li class="">
                                            <a class="tabs-inner" href="<?php echo for_url('admin','liner','floor_list', array($data['liner_id'])); ?>" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">楼层详情</span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <!--表格-->
        <form name="frm" id="form1" action="<?php echo for_url('admin', 'liner','save'); ?>"  method="post">
        <table width="100%" class="table-form contentWrap">
            <tbody>
            <tr>
                <td width="80">邮轮名称</td>
                <td><input type="text" value="<?php echo $data['liner_name'] ?>" size="30" id="liner_name" class="input-text" name="liner[liner_name]"></td>
                <td><div id="liner_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">邮轮公司</td>
                <td>
                    <select id="liner_com" name="liner[liner_com]">
                        <?php
                        foreach($liner_company as $val){
                            echo '<option value="',$val['com_name'],'">',$val['com_name'],'</option>';
                        }
                        ?>
                    </select>
                    <script type="text/javascript">
                        $('#liner_com').val('<?php echo $data['liner_com'] ?>');
                    </script>
                    <a href="javascript:" id="add-com" class="easyui-linkbutton" data-options="iconCls:'icon-add'">添加一个邮轮公司？</a>
                <td><div id="liner_comTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">英文名称</td>
                <td><input type="text" value="<?php echo $data['liner_english_name'] ?>" size="30" id="liner_english_name" class="input-text" name="liner[liner_english_name]"></td>
                <td><div id="liner_english_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">首航日期</td>
                <td><input type="text" value="<?php echo date('Y-m-d',$data['first_date']); ?>"  onfocus="WdatePicker({dateFmt:'yyyy-mm-dd'})" size="30" id="first_date" class="input-text" name="liner[first_date]"></td>
                <td><div id="first_dateTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">总吨位数</td>
                <td><input type="text" value="<?php echo $data['liner_tonnage'] ?>" size="10" id="liner_tonnage" class="input-text" name="liner[liner_tonnage]"></td>
                <td><div id="liner_tonnageTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">总长度</td>
                <td><input type="text" value="<?php echo $data['liner_length'] ?>" size="10" id="liner_length" class="input-text" name="liner[liner_length]"></td>
                <td><div id="liner_lengthTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">总宽度</td>
                <td><input type="text" value="<?php echo $data['liner_width'] ?>" size="10" id="liner_width" class="input-text" name="liner[liner_width]"></td>
                <td><div id="liner_widthTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">活动层数</td>
                <td><input type="text" value="<?php echo $data['count_floor'] ?>" size="10" id="count_floor" class="input-text" name="liner[count_floor]"></td>
                <td><div id="count_floorTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">客房数</td>
                <td><input type="text" value="<?php echo $data['count_room'] ?>" size="10" id="count_room" class="input-text" name="liner[count_room]"></td>
                <td><div id="count_roomTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">船员人数</td>
                <td><input type="text" value="<?php echo $data['count_crew'] ?>" size="10" id="" class="input-text" name="liner[count_crew]"></td>
                <td><div id="count_crewTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">载客人数</td>
                <td><input type="text" value="<?php echo $data['count_people'] ?>" size="10" id="count_people" class="input-text" name="liner[count_people]"></td>
                <td><div id="count_peopleTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">电压</td>
                <td><input type="text" value="<?php echo $data['voltage'] ?>" size="10" id="voltage" class="input-text" name="liner[voltage]"></td>
                <td><div id="voltageTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">航速</td>
                <td><input type="text" value="<?php echo $data['speed'] ?>" size="10" id="speed" class="input-text" name="liner[speed]"></td>
                <td><div id="speedTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">简介</td>
                <td>
                    <textarea style="width: 600px;height: 150px;" class="input-text" id="introduce" name="liner[introduce]"><?php echo $data['introduce'] ?></textarea>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" id="btn" class="button" value="提交">
                    <input type="button" id="btn" class="button" value="返回" onclick="history.back();">
                    <input type="hidden" name="liner[liner_id]" value="<?php echo $data['liner_id'] ?>">
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
<!-- formValidator-4.1.0.js -->
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidator-4.1.0.js" type="text/javascript" charset="UTF-8"></script>
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<!-- My97DatePicker -->
<script language="JavaScript" type="text/javascript" src="/public/resource/js/sea-modules/alias/My97DatePicker/WdatePicker.js" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){
        //验证
        $.formValidator.initConfig({formID:"form1",theme:'ArrowSolidBox',mode:'AutoTip',onError:function(msg){
            _alert(msg,'error')
        }, onSuccess: function(){
            doForm($('#form1').attr('action'),$('#form1').serialize(), function(data){
                _alert(data.msg, function(){
                    if(data.state){
                        location.href = '<?php echo for_url('admin', 'liner','index'); ?>';
                    }
                })
                return ;
            });
        },inIframe:true});

        $("#liner_name").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#liner_com").formValidator({onShow:"请输入的入住天数",onFocus:"不能为空",onCorrect:"正确"}).inputValidator({onError:"请确认"}).defaultPassed();
        $("#liner_english_name").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#first_date").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $.formValidator.reloadAutoTip();

        $('#form1').submit(function(){
            return false;
        });

        //添加邮轮
        $('#add-com').click(function(){
            window.top.art.dialog({
                title: '添加邮轮公司',
                content: '公司名称：<input id="new-company-name" type="text" size="30" class="input-text" />',
                icon: 'warning',
                lock: true,
                background: '#000', // 背景色
                ok: function () {
                    var com_name = window.top.document.getElementById('new-company-name').value;
                    doForm('<?php echo for_url('admin','liner','com_save'); ?>','com_name='+com_name, function(data){
                        _alert(data.msg, function(){
                            window.location.reload();
                        })
                        return ;
                    });
                },
                cancel: function(){}
            });
        });
    });

</script>
