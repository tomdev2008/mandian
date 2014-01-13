<!--表格-->
<form name="frm" id="form1" action="<?php echo for_url('admin', 'productliner', 'refer_trip_update'); ?>" method="post">
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
    <div id="traffic_to_train_result"></div>
    <div id="traffic_to_plane_result"></div>

    <!--查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    返程交通：
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
    <div id="traffic_back_train_result"></div>
    <div id="traffic_back_plane_result"></div>


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
        //酒店
        
        //去程
        $('#traffic_to').change(function(){
            helper.setSearchBarTo($(this).val())
        })
        helper.setSearchBarTo($('#traffic_to').val())
        helper.getTrains('traffic_to_train', 'traffic_to_train_result')
        helper.getPlanes('traffic_to_plane', 'traffic_to_plane_result')
        //返程
        $('#traffic_back').change(function(){
            helper.setSearchBarBack($(this).val())
        })
        helper.setSearchBarBack($('#traffic_back').val())
        //火车去查询
        helper.getTrains('traffic_back_train', 'traffic_back_train_result')
        helper.getPlanes('traffic_back_plane', 'traffic_back_plane_result')
    });

    var helper = {
        setSearchBarTo : function(v){
            if(v == '火车'){
                $('#traffic_to_train').show();
                $('#traffic_to_plane').hide();
            }else{
                $('#traffic_to_train').hide();
                $('#traffic_to_plane').show();
            }
        },
        setSearchBarBack : function(v){
            if(v == '火车'){
                $('#traffic_back_train').show();
                $('#traffic_back_plane').hide();
            }else{
                $('#traffic_back_train').hide();
                $('#traffic_back_plane').show();
            }
        },
        getPlanes : function(el, resultEl) {
            function formatTrain(data,t) {
                var template = $($('#template-plane').html()).clone();
                var temp = '<tr>' +
                    '<td>'+ data.flight_num+'</td>' +
                    '<td>'+ data.flight_type+'</td>' +
                    '<td>'+ data.start_airport_place+'/'+ data.start_airport_name+'</td>' +
                    '<td>'+ data.arrive_place_name+'/'+ data.arrive_airport_name+'</td>' +
                    '<td>'+ data.start_airplane_time+'</td>' +
                    '<td>'+ data.arrive_airplane_time+'</td>' +
                    '<td><a name="del-plane" href="javascript:;">删除</a></td>' +
                    '</tr>';
                template.find('tbody').append(temp);
                return  template;
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
                    return item.flight_num;
                }
            }).result(function(e, item) {
                    $("#" + resultEl).append(formatTrain(item));
                });
            $('a[name=del-plane]').live('click',function(){
                $(this).parents('table.table-list').remove()
            })
        },
        getTrains : function(el, resultEl) {
            function formatTrain(data,t) {
                var template = $($('#template-train').html()).clone();
                var temp = '<tr>' +
                    '<td>'+ data.train_num+'</td>' +
                    '<td>'+ data.train_type+'</td>' +
                    '<td>'+ data.train_start+'</td>' +
                    '<td>'+ data.train_arrive_place+'</td>' +
                    '<td>'+ data.train_start_time+'</td>' +
                    '<td>'+ data.train_arrive_time+'</td>' +
                    '<td>'+ data.train_total_time+'</td>' +
                    '<td><a name="del-train" href="javascript:;">删除</a></td>' +
                    '</tr>';
                template.find('tbody').append(temp);
                return  template;
            }

            //目的地
            $("#"+el).autocomplete('<?php echo for_url('admin', 'traffic','search_train'); ?>', {
                width: 160,
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
                    return item.train_num;
                }
            }).result(function(e, item) {
                    $("#" + resultEl).append(formatTrain(item));
                });
            $('a[name=del-train]').live('click',function(){
                $(this).parents('table.table-list').remove()
            })
        }
    }

</script>
<script id="template-plane" type="text/html" >
    <table class="table-list" width="100%">
        <tbody>
        </tbody>
    </table>
</script>
<script id="template-train" type="text/html" >
    <table class="table-list" width="100%">
        <tbody>

        </tbody>
    </table>
</script>