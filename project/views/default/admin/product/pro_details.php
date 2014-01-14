<!--表格-->
<form name="frm" id="form1" action="<?php echo for_url('admin', 'product', 'pro_details_update'); ?>" method="post">
    <!--查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    去程交通：
                    <select name="liner[traffic_to]" id="traffic_to">
                        <option value="飞机" >飞机去</option>
                        <option value="火车" >火车去</option>
                    </select>
                    <script type="text/javascript">
                        $('#traffic_to').val('<?php echo $traffic_to ?>');
                    </script>
                    <input type="text" value="" size="20" id="traffic_to_key" class="input-text" >
                    <input type="button" value="查询" id="traffic_to_btn" class="button" >
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="ms2side__div">
                    <div class="ms2side__select">
                        <div class="ms2side__header">可选择</div>
                        <select rel="ms2sideSelect" id="traffic_to_select" title="可选择"  size="6" multiple="multiple">
                        </select>
                    </div>
                    <div class="ms2side__options">
                        <p class="AddOne" title="添加所选">></p>
                        <p class="AddAll" title="全部添加">>></p>
                        <p class="RemoveOne" title="删除选定"><</p>
                        <p class="RemoveAll" title="全部删除"><<</p>
                    </div>
                    <div class="ms2side__select">
                        <div class="ms2side__header">已选择</div>
                        <select rel="ms2sideSelected" title="已选择"  size="6" name="liner[traffic_to_info][]"  multiple="multiple">
                            <?php
                                foreach($traffic_to_info as $val){
                                    if($traffic_to == '飞机'){
                                        echo '<option selected value="',$val['plane_id'],'">',$val['flight_num'],'</option>';
                                    }else{
                                        echo '<option selected value="',$val['train_id'],'">',$val['train_num'],'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <!--/查询表单-->

    <!--查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    去程交通：
                    <select name="liner[traffic_back]" id="traffic_back">
                        <option value="飞机" >飞机回</option>
                        <option value="火车" >火车回</option>
                    </select>
                    <script type="text/javascript">
                        $('#traffic_back').val('<?php echo $traffic_back ?>');
                    </script>
                    <input type="text" value="" size="20" id="traffic_back_train" class="input-text" >
                    <input type="button" value="查询" id="traffic_back_btn" class="button" >
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="ms2side__div">
                    <div class="ms2side__select">
                        <div class="ms2side__header">可选择</div>
                        <select rel="ms2sideSelect" id="traffic_back_select" title="可选择"  size="6" multiple="multiple">
                        </select>
                    </div>
                    <div class="ms2side__options">
                        <p class="AddOne" title="添加所选">></p>
                        <p class="AddAll" title="全部添加">>></p>
                        <p class="RemoveOne" title="删除选定"><</p>
                        <p class="RemoveAll" title="全部删除"><<</p>
                    </div>
                    <div class="ms2side__select">
                        <div class="ms2side__header">已选择</div>
                        <select rel="ms2sideSelected" title="已选择"  size="6" name="liner[traffic_back_info][]"  multiple="multiple">
                            <?php
                            foreach($traffic_back_info as $val){
                                if($traffic_back == '飞机'){
                                    echo '<option selected value="',$val['plane_id'],'">',$val['flight_num'],'</option>';
                                }else{
                                    echo '<option selected value="',$val['train_id'],'">',$val['train_num'],'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <!--/查询表单-->

    <!--查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    酒店：
                    <input type="text" value="" size="20" id="hotel_search" class="input-text" >
                    <input type="button" value="查询" id="hotel_search_btn" class="button" >
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="ms2side__div">
                    <div class="ms2side__select">
                        <div class="ms2side__header">可选择</div>
                        <select rel="ms2sideSelect" id="hotel_search_select" title="可选择"  size="6" multiple="multiple">
                        </select>
                    </div>
                    <div class="ms2side__options">
                        <p class="AddOne" title="添加所选">></p>
                        <p class="AddAll" title="全部添加">>></p>
                        <p class="RemoveOne" title="删除选定"><</p>
                        <p class="RemoveAll" title="全部删除"><<</p>
                    </div>
                    <div class="ms2side__select">
                        <div class="ms2side__header">已选择</div>
                        <select rel="ms2sideSelected" title="已选择"  size="6" name="liner[hotel_info][]"  multiple="multiple">
                            <?php
                            foreach($hotel_info as $val){
                                echo '<option selected value="',$val['hotel_id'],'">',$val['hotel_name'],'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <!--/查询表单-->

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

<link rel="stylesheet" href="/public/resource/js/sea-modules/alias/jquery.multiselect2side/css/jquery.multiselect2side.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/public/resource/js/sea-modules/alias/jquery.multiselect2side/js/jquery.multiselect2side.js" type="text/css" media="screen" />

<script type="text/javascript">

(function(){
    var methods = {
        _init: function(el){
            el = $(el);
            var ms2sideSelect = el.find('select[rel=ms2sideSelect]');
            var ms2sideSelected = el.find('select[rel=ms2sideSelected]');

            ms2sideSelect.find('option').live('dblclick', function(){
                var _this = $(this).clone();
                _this.attr('selected','true');
                ms2sideSelected.append(_this);
                $(this).remove()
            })
            ms2sideSelected.find('option').live('dblclick', function(){
                var _this = $(this).clone();
                ms2sideSelect.append(_this);
                $(this).remove()
            })

            var AddOne = el.find('.AddOne');
            var AddAll = el.find('.AddAll')
            var RemoveOne = el.find('.RemoveOne')
            var RemoveAll = el.find('.RemoveAll')

            AddOne.live('click', function(){
                var _this = ms2sideSelect.find('option:selected');
                _this.attr('selected','true');
                ms2sideSelected.append(_this);
            });
            AddAll.live('click', function(){
                var _this = ms2sideSelect.find('option');
                _this.attr('selected','true');
                ms2sideSelected.append(_this);
            });
            RemoveOne.live('click', function(){
                var _this = ms2sideSelected.find('option:selected');
                ms2sideSelect.append(_this);
            });
            RemoveAll.live('click', function(){
                var _this = ms2sideSelected.find('option');
                ms2sideSelect.append(_this);
            });
        }
    };

    $.fn.multiselect2side = function( ) {
        $.each(this, function(i, v){
            return methods._init(v);
        });
    };
})($)
    $(function(){

        $('.ms2side__div').multiselect2side();

        $('#traffic_to_btn').click(function(){
            var _dailog = _alert('查询中，请稍后……');
            var _t = $('#traffic_to').val();
            var _s = $('#traffic_to_key').val();
            if(_s == ''){
                return ;
            }
            if(_t == '飞机'){
                var _url = '<?php echo for_url('admin', 'traffic','search_plane'); ?>';
            }else{
                var _url = '<?php echo for_url('admin', 'traffic','search_train'); ?>';
            }

            $.ajax({
                url: _url,
                type:'post',
                data: 's=' + _s,
                dataType: 'json',
                success: function(data){
                    $('#traffic_to_select').html('')
                    var _opt = '';
                    $.each(data, function(i, v){
                        if(_t == '飞机'){
                            _opt += '<option value="'+ v.plane_id+'">'+ v.flight_num+'</option>';
                        }else{
                            _opt += '<option value="'+ v.train_id+'">'+ v.train_num+'</option>';
                        }
                    });
                    $('#traffic_to_select').append(_opt)
                    _dailog.close();
                },
                error: function(){
                }
            });
        });
        $('#traffic_back_btn').click(function(){
            var _dailog = _alert('查询中，请稍后……');
            var _t = $('#traffic_back').val();
            var _s = $('#traffic_back_key').val();
            if(_s == ''){
                return ;
            }
            if(_t == '飞机'){
                var _url = '<?php echo for_url('admin', 'traffic','search_plane'); ?>';
            }else{
                var _url = '<?php echo for_url('admin', 'traffic','search_train'); ?>';
            }

            $.ajax({
                url: _url,
                type:'post',
                data: 's=' + _s,
                dataType: 'json',
                success: function(data){
                    $('#traffic_back_select').html('')
                    var _opt = '';
                    $.each(data, function(i, v){
                        if(_t == '飞机'){
                            _opt += '<option value="'+ v.plane_id+'">'+ v.flight_num+'</option>';
                        }else{
                            _opt += '<option value="'+ v.train_id+'">'+ v.train_num+'</option>';
                        }
                    });
                    $('#traffic_back_select').append(_opt)
                    _dailog.close()
                },
                error: function(){
                }
            });
        });
        $('#hotel_search_btn').click(function(){
            var _dailog = _alert('查询中，请稍后……');
            var _s = $('#hotel_search').val();
            if(_s == ''){
                return ;
            }
            var _url = '<?php echo for_url('admin', 'hotel','search_hotel'); ?>';

            $.ajax({
                url: _url,
                type:'post',
                data: 's=' + _s,
                dataType: 'json',
                success: function(data){
                    $('#hotel_search_select').html('')
                    var _opt = '';
                    $.each(data, function(i, v){
                        _opt += '<option value="'+ v.hotel_id+'">'+ v.hotel_name+'</option>';
                    });
                    $('#hotel_search_select').append(_opt)
                    _dailog.close()
                },
                error: function(){
                }
            });
        });

        $('#form1').submit(function(){
            doForm($('#form1').attr('action'),$('#form1').serialize(), function(data){
                _alert(data.msg, function(){
                    if(data.state){
                        //location.href = '<?php echo for_url('admin', 'product','basic_info', array( $data['pro_id'])); ?>';
                    }
                })
                return ;
            });
            return false;
        });



        /*//去成信息
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
        });*/

    });

    /*var helper = {
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
    }*/

</script>