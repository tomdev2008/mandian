
<body class="easyui-layout">
<div data-options="region:'center',title:'<?php echo $current_pos; ?>'">

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
            <form name="frm" id="form1" action="<?php echo for_url('admin', 'index','hotel_save'); ?>"  method="post">
            <tbody>
            <tr>
                <td width="80">酒店名称</td>
                <td><input type="text" value="<?php echo $data['hotel_name'] ?>" size="30" id="hotel_name" class="input-text" name="hotel[hotel_name]"></td>
                <td><div id="hotel_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">英文名称</td>
                <td><input type="text" value="<?php echo $data['hotel_name'] ?>" size="30" class="input-text" name="hotel[hotel_english_name]"></td>
                <td></td>
            </tr>
            <tr>
                <td width="80">酒店地址</td>
                <td><input type="text" value="<?php echo $data['hotel_address'] ?>" size="30" id="hotel_address" class="input-text" name="hotel[hotel_address]"></td>
                <td><div id="hotel_addressTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">酒店链接</td>
                <td><input type="text" value="<?php echo $data['hotel_link'] ?>" size="30" id="hotel_link" class="input-text" name="hotel[hotel_link]"></td>
                <td></td>
            </tr>
            <tr>
                <td width="80">入住晚数</td>
                <td><input type="text" value="<?php echo $data['hotel_nights'] ?>" size="30" class="input-text" name="hotel[hotel_nights]"></td>
                <td></td>
            </tr>
            <tr>
                <td width="80">酒店星级</td>
                <td>
                    <select name="hotel[hotel_star]">
                            <option selected value="0">无星</option>
                            <option value="1">☆一星</option>
                            <option value="2">☆☆二星</option>
                            <option value="3">☆☆☆三星</option>
                            <option value="4">☆☆☆☆四星</option>
                            <option value="5">☆☆☆☆☆五星</option>
                    </select>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">酒店介绍</td>
                <td>
                    <textarea style="width: 260px; height: 160px; padding: 5px;" class="input-text" name="hotel[hotel_info]"><?php echo $data['hotel_info'] ?></textarea>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">酒店特色</td>
                <td><input type="text" value="<?php echo $data['hotel_specifics'] ?>" size="30" class="input-text" name="hotel[hotel_specifics]"></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" id="btn" class="button" value="提交">
                    <input type="hidden" name="hotel[hotel_id]" value="<?php echo $data['hotel_id'] ?>">
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

        $("#hotel_name").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $("#hotel_address").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});

        $.formValidator.reloadAutoTip();
    });
</script>
