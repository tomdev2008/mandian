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
            <form name="frm" id="form1" action="<?php echo for_url('admin', 'hotel','save'); ?>"  method="post">
            <tbody>
            <tr>
                <td width="80">酒店名称</td>
                <td><input type="text" value="<?php echo $data['hotel_name'] ?>" size="30" id="hotel_name" class="input-text" name="hotel[hotel_name]"></td>
                <td><div id="hotel_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">英文名称</td>
                <td><input type="text" value="<?php echo $data['hotel_english_name'] ?>" size="30" class="input-text" name="hotel[hotel_english_name]"></td>
                <td></td>
            </tr>
            <tr>
                <td width="80">酒店地址</td>
                <td><input type="text" value="<?php echo $data['hotel_address'] ?>" size="60" id="hotel_address" class="input-text" name="hotel[hotel_address]"></td>
                <td><div id="hotel_addressTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">酒店链接</td>
                <td><input type="text" value="<?php echo $data['hotel_link'] ?>" size="60" id="hotel_link" class="input-text" name="hotel[hotel_link]"></td>
                <td></td>
            </tr>
            <tr>
                <td width="80">入住晚数</td>
                <td><input type="text" value="<?php echo $data['hotel_nights'] ?>" size="5" id="hotel_nights" class="input-text" name="hotel[hotel_nights]"></td>
                <td><div id="hotel_nightsTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">酒店星级</td>
                <td>
                    <select id="hotel_star" name="hotel[hotel_star]">
                            <option value="0">请选择</option>
                            <option value="1">☆一星</option>
                            <option value="2">☆☆二星</option>
                            <option value="3">☆☆☆三星</option>
                            <option value="4">☆☆☆☆四星</option>
                            <option value="5">☆☆☆☆☆五星</option>
                            <option value="6">超五星</option>
                    </select>
                    <script type="text/javascript">
                        $('#hotel_star').val('<?php echo $data['hotel_star'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">酒店介绍</td>
                <td>
                    <textarea style="width: 600px;" class="input-text" id="hotel_info" name="hotel[hotel_info]"><?php echo $data['hotel_info'] ?></textarea>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">酒店特色</td>
                <td>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="悬崖景观">悬崖景观</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="榆林景观">榆林景观</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="梯田景观">梯田景观</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="河谷景观">河谷景观</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="落日景观">落日景观</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="顶级SPA">顶级SPA</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="周边冲浪">周边冲浪</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="周边漂流">周边漂流</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="浮潜环境">浮潜环境</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="水飞直送">水飞直送</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="一价全包">一价全包</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="快艇接送">快艇接送</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="提供亚洲饮食">提供亚洲饮食</label>
                    <label class="labelspan"><input type="checkbox" name="hotel[hotel_specifics][]" value="热闹">热闹</label>
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
</body>
<!--/内容区-->


<!-- ueditor -->
<script type="text/javascript" charset="utf-8" src="/public/resource/js/sea-modules/alias/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/resource/js/sea-modules/alias/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/public/resource/js/sea-modules/alias/ueditor/lang/zh-cn/zh-cn.js"></script>

<!-- formValidator-4.1.0.js -->
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidator-4.1.0.js" type="text/javascript" charset="UTF-8"></script>
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){
        //编辑器
        UE.getEditor("hotel_info");

        //验证
        $.formValidator.initConfig({formID:"form1",theme:'ArrowSolidBox',mode:'AutoTip',onError:function(msg){
            _alert(msg,'error')
        }, onSuccess: function(){
            $("#hotel_info").val(UE.getEditor('hotel_info').getContent());
            doForm($('#form1'), function(data){
                _alert(data.msg, function(){
                    if(data.state){
                        location.href = '<?php echo for_url('admin', 'hotel','index'); ?>';
                    }
                })
                return ;
            });
        },inIframe:true});

        $("#hotel_name").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $("#hotel_address").formValidator({onShow:"请输入名称",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $("#hotel_nights").formValidator({onShow:"请输入的入住天数",onFocus:"只能输入数字哦",onCorrect:"正确"}).inputValidator({min:1,type:"value",onErrormin:"你输入的值必须大于等于1",onError:"请确认"}).defaultPassed();
        $.formValidator.reloadAutoTip();

        $('#form1').submit(function(){

            return false;
        });
    });

</script>
