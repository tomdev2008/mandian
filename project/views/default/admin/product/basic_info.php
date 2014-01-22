
        <!--表格-->
        <form name="frm" id="form1" action="<?php echo for_url('admin', 'product','basic_info_update'); ?>"  method="post">
        <table width="100%" class="table-form contentWrap">
            <tbody>
            <tr>
                <td width="80">产品类型</td>
                <td>
                    <select id="way_type" name="liner[way_type]">
                        <option value="1">自由行</option>
                        <option value="2">跟团游</option>
                    </select>
                    <script type="text/javascript">
                        $('#way_type').val('<?php echo $data['way_type'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">产品名称</td>
                <td><input type="text" value="<?php echo $data['pro_name'] ?>" size="65" id="pro_name" class="input-text" name="liner[pro_name]"></td>
                <td><div id="pro_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">产品副标题</td>
                <td><textarea id="second_name" class="input-text" name="liner[second_name]" style="width: 350px; height: 90px"><?php echo $data['second_name'] ?></textarea></td>
                <td><div id="second_nameTip" class="input-tip"></div></td>
            </tr>
            <tr>
                <td width="80">是否特价</td>
                <td>
                    <select id="cheap" name="liner[cheap]">
                        <option value="0">普通产品</option>
                        <option value="1">特价产品</option>
                    </select>
                    <script type="text/javascript">
                        $('#cheap').val('<?php echo $data['cheap'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">行程天数</td>
                <td><input type="text" value="<?php echo $data['days'] ?>" size="10" id="days" class="input-text" name="liner[days]">(天)</td>
                <td><div id="daysTip" class="input-tip"></td>
            </tr>
            <tr>
                <td width="80">入住晚数</td>
                <td><input type="text" value="<?php echo $data['nights'] ?>" size="10" id="nights" class="input-text" name="liner[nights]">(天)</td>
                <td><div id="nightsTip" class="input-tip"></td>
            </tr>
            <tr>
                <td width="80">提前报名</td>
                <td><input type="text" value="<?php echo $data['before_days'] ?>" size="10" id="before_days" class="input-text" name="liner[before_days]">(自然日)</td>
                <td><div id="before_daysTip" class="input-tip"></td>
            </tr>
            <tr>
                <td width="80">关于签证</td>
                <td><input type="text" value="<?php echo $data['about_visa'] ?>" size="50" id="about_visa" class="input-text" name="liner[about_visa]"></td>
                <td></td>
            </tr>
            <tr>
                <td width="80">出发地点</td>
                <td>
                    <select id="start" name="liner[start]">
                        <?php
                        foreach($branch_list as $key => $branchs)
                        {
                            echo '<optgroup label="',$key,'">';
                            foreach($branchs as $line_key => $val)
                            {
                                echo '<option value="',$val['departure_name'],'">',$val['departure_name'],'</option>';
                            }
                            echo '</optgroup>';
                        }
                        ?>
                    </select>
                    <script type="text/javascript">
                        $('#start').val('<?php echo $data['start'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">目的地</td>
                <td colspan="2">
                    <div id="p" class="easyui-panel" title="目的地选择" style="width:560px;padding:5px;">
                        <p>
                            请输入关键字：<input type="text" value="" size="15" id="end-auto" class="input-text"><br />
                        </p>
                        <ul id="place_content">
                            <?php
                            if($data['end_list']){
                                foreach($data['end_list'] as $val)
                                {
                                    if(empty($val['place_name'])){
                                        continue;
                                    }
                                    echo '<li class="t-b t-b-box t-b-box-deletable t-b-focus t-b-box-focus">',$val['place_name'],'<a href="javascript:" class="t-b-box-deletebutton"></a>';
                                    echo '<input type="hidden" name="liner[end][]" value="',$val['place_id'],'" /></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="80">类别</td>
                <td>
                    <select id="place_type" name="liner[place_type]">
                        <option value="1">国内游</option>
                        <option value="2">出境游</option>
                    </select>
                    <script type="text/javascript">
                        $('#place_type').val('<?php echo $data['place_type'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">大交通</td>
                <td>
                    <select name="liner[traffic_to]" id="traffic_to">
                        <option value="飞机" selected="selected">飞机去</option>
                        <option value="火车" >火车去</option>
                        <option value="汽车" >汽车去</option>
                        <option value="邮轮" >邮轮去</option>
                    </select>
                    <select name="liner[traffic_back]" id="traffic_back">
                        <option value="飞机" selected="selected">飞机回</option>
                        <option value="火车" >火车回</option>
                        <option value="汽车" >汽车回</option>
                        <option value="邮轮" >邮轮回</option>
                    </select>

                    <script type="text/javascript">
                        $('#traffic_to').val('<?php echo $data['traffic_to'] ?>');
                        $('#traffic_back').val('<?php echo $data['traffic_back'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">下架方式</td>
                <td>
                    <select id="shelves" name="liner[shelves]">
                        <option value="1">发团日前下架</option>
                        <option value="2">指定日期</option>
                    </select>
                    <input type="text" value="<?php echo $data['shelves_endtime'] ?>" size="15" id="shelves_endtime"  onfocus="WdatePicker({dateFmt:'yyyy-mm-dd'})" class="input-text hide" name="liner[shelves_endtime]">
                    <script type="text/javascript">
                        $('#shelves').change(function(){
                            if($(this).val() == 2){
                                $('#shelves_endtime').show();
                            }else{
                                $('#shelves_endtime').hide();
                            }
                        }).val('<?php echo $data['shelves'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">付款方式</td>
                <td>
                    <select id="pay_type" name="liner[pay_type]">
                        <option value="1">即时付款</option>
                        <option value="2">确认付款</option>
                    </select>
                    <script type="text/javascript">
                        $('#pay_type').val('<?php echo $data['pay_type'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">服务电话</td>
                <td>
                    <select id="tel" name="liner[tel]">
                        <option value="1">400-666-4066</option>
                    </select>
                    <script type="text/javascript">
                        $('#tel').val('<?php echo $data['tel'] ?>');
                    </script>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">服务评分</td>
                <td>
                    <label for="flight_score">交通评分：
                        <select id="flight_score" name="liner[flight_score]">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>
                        <script type="text/javascript">
                            $("#flight_score").val(<?php echo $data['flight_score'] ?>);
                        </script>
                    </label>
                    <label for="hotel_score">酒店评分：
                        <select id="hotel_score" name="liner[hotel_score]">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>
                        <script type="text/javascript">
                            $("#hotel_score").val(<?php echo $data['hotel_score'] ?>);
                        </script>
                    </label>
                    <label for="scenery_score">风景评分：
                        <select id="scenery_score" name="liner[scenery_score]">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>
                        <script type="text/javascript">
                            $("#scenery_score").val(<?php echo $data['scenery_score'] ?>);
                        </script>
                    </label>
                    <label for="serve_score">服务评分：
                        <select id="serve_score" name="liner[serve_score]">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3" selected="selected">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>
                        <script type="text/javascript">
                            $("#serve_score").val(<?php echo $data['serve_score'] ?>);
                        </script>
                    </label>
                    <br/>
                    <label for="trip_score">行程评分：
                        <select id="trip_score" name="liner[trip_score]">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>
                        <script type="text/javascript">
                            $("#trip_score").val(<?php echo $data['trip_score'] ?>);
                        </script>
                    </label>
                    <label for="food_score">美食评分：
                        <select id="food_score" name="liner[food_score]">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3" selected="selected">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>
                        <script type="text/javascript">
                            $("#food_score").val(<?php echo $data['food_score'] ?>);
                        </script>
                    </label>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="80">蚂蜂窝链接</td>
                <td colspan="2"><input type="text" value="<?php echo $data['mafengwo_link'] ?>" size="60" id="mafengwo_link" class="input-text" name="liner[mafengwo_link]"></td>
            </tr>
            <tr>
                <td width="80">到到酒店链接</td>
                <td colspan="2"><input type="text" value="<?php echo $data['daodao_link'] ?>" size="60" id="daodao_link" class="input-text" name="liner[daodao_link]"></td>
            </tr>
            <tr>
                <td width="80">穷游心得链接</td>
                <td colspan="2"><input type="text" value="<?php echo $data['qiongyou_link'] ?>" size="60" id="qiongyou_link" class="input-text" name="liner[qiongyou_link]"></td>
            </tr>


            <tr>
                <td width="80">产品主图</td>
                <td colspan="2">
                    <div id="p" class="easyui-panel" title="只能选择一个图片" style="width:560px;padding:5px;">
                        <p>
                            <a href="javascript:picHelper.flashuploadMain();" id="add-com" class="btn btn-small">添加图片</a>[双击删除图片]
                            <ul class="attachment-list" id="fsUploadProgress">
                                <script type="text/javascript">
                                    $(function(){
                                        picHelper.submitCkeditorMain('<?php echo $data['main_img']; ?>');
                                    });
                                </script>
                            </ul>
                        </p>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="80">产品图库</td>
                <td colspan="2">
                    <div id="p" class="easyui-panel" title="可选择多图片" style="width:560px;padding:5px;">
                        <p>
                            <a href="javascript:picHelper.flashuploadSub();" id="add-com"  class="btn btn-small">添加图片</a>[双击删除图片]
                        <ul class="attachment-list" id="fsUploadProgressSub">
                            <script type="text/javascript">
                                $(function(){
                                    picHelper.submitCkeditorSub('<?php echo $data['sub_img_list']; ?>');
                                });
                            </script>
                        </ul>
                        </p>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="80">产品特色</td>
                <td colspan="2">
                    <textarea id="special" name="liner[special]" style="width: 500px; height: 150px"><?php echo $data['special'] ?></textarea>
                    <div id="specialTip" class="input-tip">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" rel="btn" class="btn btn-success" value="保存并下一步">
                    <input type="button" id="btn" class="btn" value="返回列表" onclick="history.back();">
                    <input type="hidden" name="liner[pro_id]" value="<?php echo $data['pro_id'] ?>">
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
<style type="text/css">
    .t-b {
        list-style-type: none;
        float: left;
        display: block;
        padding: 0;
        margin: 5px 5px 3px 0;
        cursor: default;
    }
    .t-b-box {
        position: relative;
        line-height: 18px;
        padding: 0 5px;
        -moz-border-radius: 9px;
        -webkit-border-radius: 9px;
        border-radius: 9px;
        border: 1px solid #CAD8F3;
        background: #DEE7F8;
        cursor: default;
    }
    .t-b-box-deletable {
        padding-right: 15px;
    }
    .t-b-box-focus {
        border-color: #598BEC;
        background: #598BEC;
        color: #FFF;
    }
    .t-b-box-focus .t-b-box-deletebutton {
        background-position: bottom;
    }
    .t-b-box-deletebutton {
        position: absolute;
        right: 4px;
        top: 6px;
        display: block;
        width: 7px;
        height: 7px;
        font-size: 1px;
        background: url('/public/resource/images/close.gif');
    }

</style>
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
        //获取目的地
        function format(data,t) {
            var li = '<li class="t-b t-b-box t-b-box-deletable t-b-focus t-b-box-focus">' +
                 data.place_name+'<a href="javascript:" class="t-b-box-deletebutton"></a>' +
                '<input type="hidden" name="liner['+t+'][]" value="'+data.place_id+'" /></li>';
            return  li;
        }
        $('.t-b-box-deletebutton').live('click',function(){
            $(this).parent('li').remove();
        });
        //目的地
        $("#end-auto").autocomplete('<?php echo for_url('admin', 'product','search_place'); ?>', {
            width: 160,
            parse: function(data) {
                return $.map(eval(data), function(row) {
                    return {
                        data: row,
                        value: row.place_name,
                        result: row.place_name
                    }
                });
            },
            formatItem: function(item) {
                return item.place_name;
            }
        }).result(function(e, item) {
                $("#place_content").append("<p>" + format(item,'end') + "</p>");
         });
        //港口
        $("#port-auto").autocomplete('<?php echo for_url('admin', 'product','search_place'); ?>', {
            width: 160,
            parse: function(data) {
                return $.map(eval(data), function(row) {
                    return {
                        data: row,
                        value: row.place_name,
                        result: row.place_name
                    }
                });
            },
            formatItem: function(item) {
                return item.place_name;
            }
        }).result(function(e, item) {
                $("#port_content").append("<p>" + format(item,'way_to_port') + "</p>");
         });

        //验证
        $.formValidator.initConfig({formID:"form1",theme:'ArrowSolidBox',mode:'AutoTip',onError:function(msg){
            _alert(msg,'error')
        }, onSuccess: function(){
            doForm($('#form1').attr('action'),$('#form1').serialize(), function(data){
                _alert(data.msg, function(){
                    if(data.state){
                        location.href = '<?php echo for_url('admin', 'product','basic_info', array( $data['pro_id'])); ?>';
                    }
                })
                return ;
            });
        },inIframe:true});

        $("#pro_name").formValidator({onShow:"请输入航线名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#second_name").formValidator({onShow:"请输入副标题名称",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#before_days").formValidator({onShow:"请输入提前报名",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#days").formValidator({onShow:"请输入行程天数",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#nights").formValidator({onShow:"请输入入住晚数",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $("#special").formValidator({onShow:"请输入特色",onFocus:"不能为空",onCorrect:""}).inputValidator({onError:"不能为空,请确认"}).defaultPassed();
        $.formValidator.reloadAutoTip();

        $('#form1').submit(function(){
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
        },
        flashuploadSub: function () {
            var iTop = (window.screen.availHeight - 550) / 2;
            var iLeft = (window.screen.availWidth - 640) / 2;
            window.open('<?php echo for_url('admin', 'attachment', 'swfupload' ,'?_callback=picHelper.submitCkeditorSub'); ?>', '选择图片', 'height=460, width=500, top=' + iTop + ', left=' + iLeft + ', toolbar=no, menubar=no, scrollbars=no, resizable=no,location=n o, status=no');
        },

        submitCkeditorSub: function (data) {
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
                            _tmp.append('<input type="hidden" name="liner[sub_img][]" value="' + data.attachment_id + '" />');
                            $('#fsUploadProgressSub').append(_tmp);
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
