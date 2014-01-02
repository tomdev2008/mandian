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
            <form name="frm" id="form1" action="<?php echo for_url('admin', 'plane','save'); ?>"  method="post">
            <tbody>
            <tr>
                <td width="80">航班号</td>
                <td><input type="text" value="<?php echo $data['flight_num'] ?>" size="30" id="flight_num" class="input-text" name="plane[flight_num]"></td>
                <td><div id="flight_numTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">机型</td>
                <td><input type="text" value="<?php echo $data['flight_type'] ?>" size="30" class="input-text" name="plane[flight_type]"></td>
                <td></td>
            </tr>
            <tr>
                <td width="80">始发地</td>
                <td><input type="text" value="<?php echo $data['start_airport_place'] ?>" size="30" id="start_airport_place" class="input-text" name="plane[start_airport_place]"></td>
                <td><div id="start_airport_placeTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">起飞机场</td>
                <td><input type="text" value="<?php echo $data['start_airport_name'] ?>" size="30" id="start_airport_name" class="input-text" name="plane[start_airport_name]"></td>
                <td><div id="start_airport_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">起飞时间</td>
                <td><input type="text" value="<?php echo $data['start_airplane_time'] ?>"  onfocus="WdatePicker({dateFmt:'H:mm'})" size="15" id="start_airplane_time" class="Wdate input-text" name="plane[start_airplane_time]"></td>
                <td><div id="start_airplane_timeTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">目的地</td>
                <td><input type="text" value="<?php echo $data['arrive_place_name'] ?>" size="30" id="arrive_place_name" class="input-text" name="plane[arrive_place_name]"></td>
                <td><div id="arrive_place_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">降落机场</td>
                <td><input type="text" value="<?php echo $data['arrive_airport_name'] ?>" size="30" id="arrive_airport_name" class="input-text" name="plane[arrive_airport_name]"></td>
                <td><div id="arrive_airport_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">到达时间</td>
                <td>
                    <input type="text" value="<?php echo $data['arrive_airplane_time'] ?>" onfocus="WdatePicker({dateFmt:'H:mm'})" size="15" id="arrive_airplane_time" class="Wdate input-text" name="plane[arrive_airplane_time]">
                    &nbsp;<select name="airplane_addition_date" id="airplane_addition_date" class="fn-va-mdl valid">
                        <option value="0">+0日</option>
                        <option value="1">+1日</option>
                        <option value="2">+2日</option>
                        <option value="3">+3日</option>
                        <option value="4">+4日</option>
                    </select>
                    <script type="text/javascript">
                        $("#airplane_addition_date").val('<?php echo $data['airplane_addition_date'] ?>');
                    </script>
                </td>
                <td><div id="arrive_airplane_timeTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" id="btn" class="button" value="提交">
                    <input type="button" id="btn" class="button" value="返回" onclick="history.back();">
                    <input type="hidden" name="plane[plane_id]" value="<?php echo $data['plane_id'] ?>">
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
                        location.href = '<?php echo for_url('admin', 'plane','index'); ?>';
                    }
                })
                return ;
            });
        },inIframe:true});

        $("#flight_num").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#start_airport_place").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#start_airport_name").formValidator({onShow:"请输入的入住天数",onFocus:"不能为空",onCorrect:"正确"}).inputValidator({onError:"请确认"}).defaultPassed();
        $("#start_airplane_time").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#arrive_place_name").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#arrive_airport_name").formValidator({onShow:"请输入的入住天数",onFocus:"不能为空",onCorrect:"正确"}).inputValidator({onError:"请确认"}).defaultPassed();
        $("#arrive_airplane_time").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $.formValidator.reloadAutoTip();

        $('#form1').submit(function(){
            return false;
        });
    });

</script>
