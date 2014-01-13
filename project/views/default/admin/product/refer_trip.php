
        <!--表格-->
        <form name="frm" id="form1" action="<?php echo for_url('admin', 'productliner','refer_trip_update'); ?>"  method="post">
            <?php  foreach($trip as $key => $val) { ?>
                <table width="100%" class="table-form contentWrap">
                    <tbody>
                    <thead>
                    <tr>
                        <th colspan="3">第<b><?php echo ($key + 1); ?></b>天</th>
                    </tr>
                    </thead>
                    <tr>
                        <td width="80">行程名称</td>
                        <td><input type="text" value="<?php echo $val['destination']; ?>" size="50" class="input-text" name="liner[<?php echo $key; ?>][destination]"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="80">行程描述</td>
                        <td colspan="2">
                            <textarea name="liner[<?php echo $key; ?>][des_info]" style="width: 500px; height: 150px"><?php echo $val['des_info']; ?></textarea>
                        </td>
                    </tr>
                    <!--<tr>
                        <td width="80">产品主图</td>
                        <td colspan="2">
                            <div id="p" class="easyui-panel" title="只能选择一个图片" style="width:560px;padding:5px;">
                                <p>
                                    <a href="javascript:picHelper.flashuploadMain(<?php //echo $key; ?>);" id="add-com" class="easyui-linkbutton" data-options="iconCls:'icon-add'">添加图片</a>[双击删除图片]
                                <ul class="attachment-list" id="fsUploadProgress">
                                    <script type="text/javascript">
                                        $(function(){
                                            picHelper.submitCkeditorMain('<?php //echo $val['']; ?>');
                                        });
                                    </script>
                                </ul>
                                </p>
                            </div>
                        </td>
                    </tr>-->
                    <tr>
                        <td width="80">时间安排</td>
                        <td colspan="2" width="80">
                            到港时间：<input type="text" value="<?php echo (!empty($val['arrive'])) ? date('Y-m-d H:i:s',$val['arrive']): ''; ?>" size="20" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="input-text" name="liner[<?php echo $key; ?>][arrive]">
                            离港时间：<input type="text" value="<?php echo (!empty($val['leave'])) ? date('Y-m-d H:i:s',$val['leave']): ''; ?>" size="20"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="input-text" name="liner[<?php echo $key; ?>][leave]">
                        </td>
                    </tr>
                    <tr>
                        <td width="80">住宿</td>
                        <td>
                            <select id="liner_<?php echo $key; ?>_hotel_info" name="liner[<?php echo $key; ?>][hotel_info]">
                                <option value="1">船上</option>
                                <option value="2">其他</option>
                            </select>
                            <input type="text" id="hotel_info_other" value="" size="30" class="input-text hide"  name="liner[<?php echo $key; ?>][hotel_info_other]">
                            <script type="text/javascript">
                                $('#liner_<?php echo $key; ?>_hotel_info').change(function(){
                                    if($(this).val() == 2){
                                        $('#hotel_info_other').show();
                                    }else{
                                        $('#hotel_info_other').hide();
                                    }
                                });
                                switch('<?php echo $val['hotel_info']; ?>')
                                {
                                    case '1':
                                        $('#liner_<?php echo $key; ?>_hotel_info').val(1);
                                        break;
                                    default:
                                        $('#liner_<?php echo $key; ?>_hotel_info').val(2);
                                        $('#hotel_info_other').val('<?php echo $val['hotel_info']; ?>').show();
                                        break;
                                }
                            </script>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="80">餐饮</td>
                        <td colspan="2">
                            早：<input type="text" value="<?php echo $val['breakfast']; ?>" size="30" class="input-text" name="liner[<?php echo $key; ?>][breakfast]">
                            中：<input type="text" value="<?php echo $val['lunch']; ?>" size="30" class="input-text" name="liner[<?php echo $key; ?>][lunch]">
                            晚：<input type="text" value="<?php echo $val['dinner']; ?>" size="30" class="input-text" name="liner[<?php echo $key; ?>][dinner]">
                        </td>
                    </tr>
                    <tr>
                        <td width="80">交通</td>
                        <td>
                            <select id="liner_<?php echo $key; ?>_traffic" name="liner[<?php echo $key; ?>][traffic]">
                                <option value="1">汽车</option>
                                <option value="2">飞机</option>
                                <option value="3">火车</option>
                                <option value="4">轮船</option>
                                <option value="5">其他</option>
                            </select>
                            <input type="text" id="traffic_other" value="" size="30" class="input-text hide"  name="liner[<?php echo $key; ?>][traffic_other]">
                            <script type="text/javascript">
                                $('#liner_<?php echo $key; ?>_traffic').change(function(){
                                    if($(this).val() == 5){
                                        $('#traffic_other').show();
                                    }else{
                                        $('#traffic_other').hide();
                                    }
                                });
                                switch('<?php echo $val['traffic']; ?>')
                                {
                                    case '1':
                                    case '2':
                                    case '3':
                                    case '4':
                                        $('#liner_<?php echo $key; ?>_traffic').val(<?php echo $val['traffic']; ?>);
                                        break;
                                    default:
                                        $('#liner_<?php echo $key; ?>_traffic').val(5);
                                        $('#traffic_other').val(<?php echo $val['traffic']; ?>).show();
                                        break;
                                }
                            </script>

                        </td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <input type="hidden" name="liner[<?php echo $key; ?>][liner_trip_id]" value="<?php echo $val['liner_trip_id']; ?>">
                <p>&nbsp;</p>
            <?php } ?>


        <table width="100%" class="table-form contentWrap">
            <tbody>
            <tr>
                <td>
                    <input type="hidden" name="liner[pro_id]" value="<?php echo $pro_id; ?>">
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
<!-- jQuery.AutoComplete.js -->
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
                        location.href = '<?php echo for_url('admin', 'productliner','refer_trip', array( $pro_id)); ?>';
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
