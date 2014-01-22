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
            <form name="frm" id="form1" action="<?php echo for_url('admin', 'traffic','train_save'); ?>"  method="post">
            <tbody>
            <tr>
                <td width="80">车次</td>
                <td><input type="text" value="<?php echo $data['train_num'] ?>" size="30" id="train_num" class="input-text" name="plane[train_num]"></td>
                <td><div id="train_numTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">车型</td>
                <td>
                    <select id="train_type" name="plane[train_type]">
                        <option value="GC-高铁/城际">GC-高铁/城际</option>
                        <option value="D-动车">D-动车</option>
                        <option value="Z-直达">Z-直达</option>
                        <option value="T-特快">T-特快</option>
                        <option value="K-快速">K-快速</option>
                        <option value="其他">其他</option>
                    </select>
                    <script type="text/javascript">
                        $('#train_type').val('<?php echo $data['train_type'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">始发地</td>
                <td><input type="text" value="<?php echo $data['train_start'] ?>" size="30" id="train_start" class="input-text" name="plane[train_start]"></td>
                <td><div id="train_startTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">目的地</td>
                <td><input type="text" value="<?php echo $data['train_arrive_place'] ?>" size="30" id="train_arrive_place" class="input-text" name="plane[train_arrive_place]"></td>
                <td><div id="train_arrive_placeTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">始发时间</td>
                <td><input type="text" value="<?php echo $data['train_start_time'] ?>"  onfocus="WdatePicker({dateFmt:'H:mm'})" size="15" id="train_start_time" class="input-text" name="plane[train_start_time]"></td>
                <td><div id="train_start_timeTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">到达时间</td>
                <td><input type="text" value="<?php echo $data['train_arrive_time'] ?>"  onfocus="WdatePicker({dateFmt:'H:mm'})" size="15" id="train_arrive_time" class="input-text" name="plane[train_arrive_time]"></td>
                <td><div id="train_arrive_timeTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">总时长</td>
                <td><input type="text" value="<?php echo $data['train_total_time'] ?>" size="5" id="train_total_time" class="input-text" name="plane[train_total_time]">(h)</td>
                <td><div id="train_total_timeTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" id="btn btn-success" class="btn" value="提交">
                    <input type="button" id="btn" class="btn" value="返回" onclick="history.back();">
                    <input type="hidden" name="plane[train_id]" value="<?php echo $data['train_id'] ?>">
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
                        location.href = '<?php echo for_url('admin', 'traffic','train'); ?>';
                    }
                })
                return ;
            });
        },inIframe:true});

        $("#train_num").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#train_start").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#train_arrive_place").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#train_start_time").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#train_arrive_time").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#train_total_time").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $.formValidator.reloadAutoTip();

        $('#form1').submit(function(){
            return false;
        });
    });

</script>
