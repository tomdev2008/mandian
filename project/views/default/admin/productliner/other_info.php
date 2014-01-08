
        <!--表格-->
        <form name="frm" id="form1" action="<?php echo for_url('admin', 'productliner','other_info_update'); ?>"  method="post">
        <table width="100%" class="table-form contentWrap">
            <tbody>
            <tr>
                <td width="80">签证信息</td>
                <td>
                    <textarea name="liner[visa_info]" style="width: 500px; height: 150px"><?php echo $liner['visa_info']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td width="80">费用信息</td>
                <td>
                    <textarea  name="liner[contains]" style="width: 500px; height: 150px"><?php echo $liner['contains']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td width="80">重要信息</td>
                <td>
                    <textarea name="liner[important_tips]" style="width: 500px; height: 150px"><?php echo $liner['important_tips']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td width="80">友情提示</td>
                <td>
                    <textarea name="liner[friendly_tips]" style="width: 500px; height: 150px"><?php echo $liner['friendly_tips']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="liner[pro_id]" value="<?php echo $liner['pro_id']; ?>">
                    <input type="submit" rel="btn" class="button" value="保存并下一步">
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
<link rel="stylesheet" type="text/css" href="/public/resource/js/sea-modules/alias/jQuery.AutoComplete-master/jquery.autocomplete.css" />
<script type="text/javascript" src="/public/resource/js/sea-modules/alias/jQuery.AutoComplete-master/jquery.autocomplete.js"></script>

<!-- formValidator-4.1.0.js -->
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidator-4.1.0.js" type="text/javascript" charset="UTF-8"></script>
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<!-- My97DatePicker -->
<script language="JavaScript" type="text/javascript" src="/public/resource/js/sea-modules/alias/My97DatePicker/WdatePicker.js" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){

       $('#form1').submit(function(){
            doForm($('#form1').attr('action'),$('#form1').serialize(), function(data){
                _alert(data.msg, function(){
                    if(data.state){
                        location.href = '<?php echo for_url('admin', 'productliner','other_info', array( $pro_id)); ?>';
                    }
                })
                return ;
            });
            return false;
        });
    });

    //图片处理
    $('a[name=a-handle]').live(
        {
            'dblclick': function(){
                var _this = $(this);
                _this.parents('li').remove();
            }
        }
    );
    var picHelper = {
        flashuploadMain: function () {
            var iTop = (window.screen.availHeight - 550) / 2;
            var iLeft = (window.screen.availWidth - 640) / 2;
            window.open('<?php echo for_url('admin', 'attachment', 'swfupload' ,'?_callback=picHelper.submitCkeditorMain'); ?>', '选择图片', 'height=460, width=500, top=' + iTop + ', left=' + iLeft + ', toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');
        },

        submitCkeditorMain: function (data) {
            if ($('a[name=a-handle]').size() >= 1) {
                _alert('只能添加一个图片');
                return;
            }
            var ids = data.split(',');
            var html = $('#img-temp').html();
            $.each(ids, function (i, n) {
                $.ajax({
                    url: '<?php echo for_url('admin','attachment','get_img'); ?>',
                    type: 'post',
                    data: 'id=' + n,
                    dataType: 'json',
                    success: function (data) {
                        if (data.state) {
                            var _tmp = $(html).clone();
                            _tmp.find('img').attr({'src': data.path});
                            _tmp.append('<input type="hidden" name="liner[main_img]" value="' + data.attachment_id + '" />');
                            $('#fsUploadProgress').append(_tmp);
                        }

                    },
                    error: function () {
                        _alert('出错了');
                    }
                });
            });
        }
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
