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
        <!--表格-->
        <table width="100%" class="table-form contentWrap">
            <form name="frm" id="form1" action="<?php echo for_url('admin', 'liner','save_room'); ?>"  method="post">
            <tbody>
            <tr>
                <td width="80">房型名称</td>
                <td><input type="text" value="<?php echo $data['room_name'] ?>" size="30" id="room_name" class="input-text" name="liner[room_name]"></td>
                <td><div id="room_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">入住人数</td>
                <td><input type="text" value="<?php echo $data['people_num'] ?>" size="10" id="people_num" class="input-text" name="liner[people_num]"></td>
                <td><div id="people_numTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">住房面积</td>
                <td><input type="text" value="<?php echo $data['room_area'] ?>" size="10" id="room_area" class="input-text" name="liner[room_area]"></td>
                <td><div id="room_areaTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">所在楼层</td>
                <td><input type="text" value="<?php echo $data['room_floor'] ?>" size="10" id="room_floor" class="input-text" name="liner[room_floor]"></td>
                <td><div id="room_floorTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">图片</td>
                <td colspan="2">

                </td>
            </tr>
            <tr>
                <td width="80">设施简介</td>
                <td>
                    <textarea style="width: 600px;" class="input-text" id="introduce" name="liner[introduce]"><?php echo $data['introduce'] ?></textarea>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" id="btn" class="button" value="提交">
                    <input type="button" id="btn" class="button" value="返回" onclick="history.back();">
                    <input type="hidden" name="liner[liner_id]" value="<?php echo $liner_id; ?>">
                    <input type="hidden" name="liner[liner_room_id]" value="<?php echo $data['liner_room_id']; ?>">
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


<!-- ueditor -->
<script type="text/javascript" charset="utf-8" src="/public/resource/js/sea-modules/alias/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/resource/js/sea-modules/alias/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/public/resource/js/sea-modules/alias/ueditor/lang/zh-cn/zh-cn.js"></script>
<!-- formValidator-4.1.0.js -->
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidator-4.1.0.js" type="text/javascript" charset="UTF-8"></script>
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<!-- My97DatePicker -->
<script language="JavaScript" type="text/javascript" src="/public/resource/js/sea-modules/alias/My97DatePicker/WdatePicker.js" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){

        //编辑器
        UE.getEditor("introduce");
        //验证
        $.formValidator.initConfig({formID:"form1",theme:'ArrowSolidBox',mode:'AutoTip',onError:function(msg){
            _alert(msg,'error')
        }, onSuccess: function(){
            $("#introduce").val(UE.getEditor('introduce').getContent());
            doForm($('#form1').attr('action'),$('#form1').serialize(), function(data){
                _alert(data.msg, function(){
                    if(data.state){
                        location.href = '<?php echo for_url('admin', 'liner','room_list', array($liner_id)); ?>';
                    }
                })
                return ;
            });
        },inIframe:true});

        $("#room_name").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#people_num").formValidator({onShow:"请输入的入住人数",onFocus:"不能为空",onCorrect:"正确"}).inputValidator({onError:"请确认"}).defaultPassed();
        $.formValidator.reloadAutoTip();

        $('#form1').submit(function(){
            return false;
        });
    });

</script>
