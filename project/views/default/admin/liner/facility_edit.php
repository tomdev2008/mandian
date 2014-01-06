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
            <form name="frm" id="form1" action="<?php echo for_url('admin', 'liner','save_facility'); ?>"  method="post">
            <tbody>
            <tr>
                <td width="80">设施类型</td>
                <td>
                    <select name="data[type_name]" id="type_name">
                        <option value="娱乐">娱乐</option>
                        <option value="餐饮">餐饮</option>
                    </select>
                    <script type="text/javascript">
                        $('#type_name').val('<?php echo $data['type_name'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">设施名称</td>
                <td><input type="text" value="<?php echo $data['facility_name'] ?>" size="30" id="facility_name" class="input-text" name="data[facility_name]"></td>
                <td><div id="facility_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">所在楼层</td>
                <td><input type="text" value="<?php echo $data['floor_num'] ?>" size="10" id="floor_num" class="input-text" name="data[floor_num]"></td>
                <td><div id="floor_numTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">图片</td>
                <td colspan="2">
                    <a href="javascript:flashupload();" id="add-com" class="easyui-linkbutton" data-options="iconCls:'icon-add'">添加图片</a>[双击删除图片]
                    <ul class="attachment-list" id="fsUploadProgress">
                        <script type="text/javascript">
                            $(function(){
                                submit_ckeditor('<?php echo $data['img_id']; ?>');
                            });
                        </script>
                    </ul>
                </td>
            </tr>
            <tr>
                <td width="80">设施简介</td>
                <td>
                    <textarea style="width: 600px;" class="input-text" id="facility_introduce" name="data[facility_introduce]"><?php echo $data['facility_introduce'] ?></textarea>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" id="btn" class="button" value="提交">
                    <input type="button" id="btn" class="button" value="返回" onclick="history.back();">
                    <input type="hidden" id="img_id"  name="data[img_id]" value="" />
                    <input type="hidden" name="data[liner_id]" value="<?php echo $data['liner_id']; ?>">
                    <input type="hidden" name="data[facility_id]" value="<?php echo $data['facility_id']; ?>">
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
        UE.getEditor("facility_introduce");
        //验证
        $.formValidator.initConfig({formID:"form1",theme:'ArrowSolidBox',mode:'AutoTip',onError:function(msg){
            _alert(msg,'error')
        }, onSuccess: function(){
            $("#facility_introduce").val(UE.getEditor('facility_introduce').getContent());
            doForm($('#form1').attr('action'),$('#form1').serialize(), function(data){
                _alert(data.msg, function(){
                    if(data.state){
                        location.href = '<?php echo for_url('admin', 'liner','floor_list', array($data['liner_id'])); ?>';
                    }
                })
                return ;
            });
        },inIframe:true});

        $("#facility_name").formValidator({onShow:"请输入设施名称",onFocus:"不能为空",onCorrect:"正确"}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#floor_num").formValidator({onShow:"请输入的楼层",onFocus:"不能为空",onCorrect:"正确"}).inputValidator({onError:"请确认"}).defaultPassed();
        $.formValidator.reloadAutoTip();

        $('#form1').submit(function(){
            return false;
        });

        $('a[name=a-handle]').live(
            {
                'dblclick': function(){
                    var _this = $(this);
                    _this.parents('li').remove();
                }
            }
        );
    });

    function flashupload() {
        var iTop = (window.screen.availHeight-550)/2; //获得窗口的垂直位置，550为弹出窗口的height;
        var iLeft = (window.screen.availWidth-640)/2; //获得窗口的水平位置，640为弹出窗口的width;
        window.open ('<?php echo for_url('admin', 'attachment', 'swfupload'); ?>', '选择图片', 'height=460, width=500, top='+iTop+', left='+iLeft+', toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');
        /*window.top.art.dialog.open('',
            {
                title: '选择图片',
                id:'room_img',
                width:500,
                height:460,
                lock:true,
                ok: function () {
                    submit_ckeditor('room_img');
                },
                cancel:function(){}
            });*/
    }
    function submit_ckeditor(data){
        if($('a[name=a-handle]').size() >= 1)
        {
            _alert('只能添加一个图片');
            return ;
        }
        /*var d = window.top.art.dialog({id:uploadid}).iframe;
        console.log($(d))
        var in_content = d.$("#att-status").html();*/
        var ids = data.split('|');
        var html = $('#img-temp').html();
        $.each(ids,function(i,n){
            $.ajax({
                url: '<?php echo for_url('admin','attachment','get_img'); ?>',
                type:'post',
                data: 'id='+n,
                dataType: 'json',
                success: function(data){
                    if(data.state){
                        var _tmp = $(html).clone();
                        _tmp.find('img').attr({'src':data.path});
                        $('#img_id').attr({'value':data.attachment_id});
                        $('#fsUploadProgress').append(_tmp);
                    }

                },
                error: function(){
                    _alert('出错了');
                }
            });
        });
    }
</script>
<script id="img-temp" type="text/html" >
    <li>
        <div id="" class="img-wrap">
            <a href="javascript:;" name="a-handle" title="双击删除" class="on"><div class="icon"></div>
                <img width="80" src="" title="双击删除"></a>
        </div>
    </li>
</script>
