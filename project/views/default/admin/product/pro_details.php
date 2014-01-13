<!--表格-->
<form name="frm" id="form1" action="<?php echo for_url('admin', 'product', 'pro_details_update'); ?>" method="post">
    <!--查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    去程交通：
                    <select name="traffic_to" id="traffic_to">
                        <option value="飞机" >飞机去</option>
                        <option value="火车" >火车去</option>
                    </select>
                    <input type="text" value="" size="20" id="traffic_to_train" class="input-text" >
                    <input type="text" value="" size="20" id="traffic_to_plane" class="input-text" >
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <!--/查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <ul id="traffic_to_result">
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
            </td>
        </tr>
        </tbody>
    </table>

    <!--查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    去程交通：
                    <select name="traffic_back" id="traffic_back">
                        <option value="飞机" >飞机回</option>
                        <option value="火车" >火车回</option>
                    </select>
                    <input type="text" value="" size="20" id="traffic_back_train" class="input-text" >
                    <input type="text" value="" size="20" id="traffic_back_plane" class="input-text" >
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <!--/查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <ul id="traffic_back_result">
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
            </td>
        </tr>
        </tbody>
    </table>

    <!--查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    酒店：
                    <input type="text" value="" size="20" id="hotel_search" class="input-text" >
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <!--/查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <ul id="hotel_search_result">
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
            </td>
        </tr>
        </tbody>
    </table>

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
        //去成信息
        helper.getPlanes('traffic_to_plane', 'traffic_to_result', 'traffic_to')
        helper.getTrains('traffic_to_train', 'traffic_to_result', 'traffic_to')
        $('#traffic_to').change(function(){
            if($(this).val() == '飞机'){
                $('#traffic_to_train').hide()
                $('#traffic_to_plane').show()
            }else{
                $('#traffic_to_train').show()
                $('#traffic_to_plane').hide()
            }
        })
        //去成信息
        helper.getPlanes('traffic_back_plane', 'traffic_back_result', 'traffic_back')
        helper.getTrains('traffic_back_train', 'traffic_back_result', 'traffic_back')
        $('#traffic_back').change(function(){
            if($(this).val() == '飞机'){
                $('#traffic_back_train').hide()
                $('#traffic_back_plane').show()
            }else{
                $('#traffic_back_train').show()
                $('#traffic_back_plane').hide()
            }
        })
        //酒店
        helper.getHotels('hotel_search', 'hotel_search_result')

        $('.t-b-box-deletebutton').live('click',function(){
            $(this).parent('li').remove();
        });

    });

    var helper = {
        getHotels : function(el, resultEl) {
            function formatTrain(data) {
                var li = '<li class="t-b t-b-box t-b-box-deletable t-b-focus t-b-box-focus">' +
                    data.hotel_name+'<a href="javascript:" class="t-b-box-deletebutton"></a>' +
                    '<input type="hidden" name="liner[hotel_info][]" value="'+data.hotel_id+'" /></li>';
                return  li;
            }

            //目的地
            $("#"+el).autocomplete('<?php echo for_url('admin', 'hotel','search_hotel'); ?>', {
                width: 160,
                parse: function(data) {
                    return $.map(eval(data), function(row) {
                        return {
                            data: row,
                            value: row.hotel_name,
                            result: row.hotel_name
                        }
                    });
                },
                formatItem: function(item) {
                    return item.hotel_name ;
                }
            }).result(function(e, item) {
                $("#" + resultEl).append(formatTrain(item));
            });
        },
        getPlanes : function(el, resultEl, names) {
            function formatTrain(data) {
                var li = '<li class="t-b t-b-box t-b-box-deletable t-b-focus t-b-box-focus">' +
                    data.flight_num+'<a href="javascript:" class="t-b-box-deletebutton"></a>' +
                    '<input type="hidden" name="liner['+names+'][]" value="'+data.plane_id+'" /></li>';
                return  li;
            }

            //目的地
            $("#"+el).autocomplete('<?php echo for_url('admin', 'traffic','search_plane'); ?>', {
                width: 160,
                parse: function(data) {
                    return $.map(eval(data), function(row) {
                        return {
                            data: row,
                            value: row.flight_num,
                            result: row.flight_num
                        }
                    });
                },
                formatItem: function(item) {
                    return item.flight_num +'&nbsp;'+item.start_airport_place +'&nbsp;-->&nbsp;'+item.arrive_place_name;
                }
            }).result(function(e, item) {
                $("#" + resultEl).append(formatTrain(item));
            });
        },
        getTrains : function(el, resultEl, names) {
            function formatTrain(data,t) {
                var li = '<li class="t-b t-b-box t-b-box-deletable t-b-focus t-b-box-focus">' +
                    data.train_num+'<a href="javascript:" class="t-b-box-deletebutton"></a>' +
                    '<input type="hidden" name="liner['+names+'][]" value="'+data.train_id+'" /></li>';
                return  li;
            }

            //目的地
            $("#"+el).autocomplete('<?php echo for_url('admin', 'traffic','search_train'); ?>', {
                width: 260,
                parse: function(data) {
                    return $.map(eval(data), function(row) {
                        return {
                            data: row,
                            value: row.train_num,
                            result: row.train_num
                        }
                    });
                },
                formatItem: function(item) {
                    return item.train_num +'&nbsp;'+item.train_start +'&nbsp;-->&nbsp;'+item.train_arrive_place;
                }
            }).result(function(e, item) {
                $("#" + resultEl).append(formatTrain(item));
            });
        }
    }

</script>