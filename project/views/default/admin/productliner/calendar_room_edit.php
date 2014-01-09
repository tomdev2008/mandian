<style type="text/css">
    body{ width: 800px; overflow: hidden;}
</style>

<body class="easyui-layout">
<form name="frm" id="form1" action="<?php echo for_url('admin', 'productliner','calendar_room_update'); ?>"  method="post">
<div data-options="region:'center'" style="padding:5px;">
    <table>
        <tr>
            <td style="height: 450px;">
                <?php echo $calendar; ?>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 10px;">
                <button id="selectAll" class="button">全选</button>
                <button id="selectAllUn" class="button">反选</button>
            </td>
        </tr>
    </table>
</div>
<div data-options="region:'east',title:'价格维护'" style="width:220px;padding:10px;">
    <!--表格-->
    <table width="100%" class="table-form contentWrap">
            <tbody>
            <tr>
                <td width="100">市场价</td>
                <td><input type="text" value="" size="6" id="" name="liner[market_price]" class="input-text"></td>
            </tr>
            <tr>
                <td width="100">成人价</td>
                <td><input type="text" value="" size="6" id="" name="liner[trip_price]" class="input-text"></td>
            </tr>
            <tr>
                <td width="100">单房差</td>
                <td><input type="text" value="" size="6" id="" name="liner[diff_room_price]" class="input-text"></td>
            </tr>
            <tr>
                <td width="100">库存</td>
                <td><input type="text" value="" size="6" id="" name="liner[total_num]" class="input-text"></td>
            </tr>
            <tr>
                <td width="100">一次最少</td>
                <td><input type="text" value="" size="6" id="" name="liner[least]" class="input-text"></td>
            </tr>
            <tr>
                <td width="100">一次最多</td>
                <td><input type="text" value="" size="6" id="" name="liner[most]" class="input-text"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>起价说明</p>
                    <textarea  class="input-text" id="introduce" name="liner[trip_description]"></textarea>
                </td>
            </tr>
            <tr>
                <td width="100">是否第三/四人</td>
                <td>
                    <select name="liner[is_kid]">
                        <option value="0">否</option>
                        <option value="1">是</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="100">第三/四人</td>
                <td><input type="text" value="" name="liner[kid_price]" size="6" id="" class="input-text"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>第三/四人价说明：(400字以内) </p>
                    <textarea  class="input-text" id="introduce" name="liner[kid_description]"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" id="btnSubmit" class="button" value="提交">
                    <input type="button" id="btnDel" class="button" value="删除">
                    <input type="hidden" value="0" name="liner[trip_state]" >
                    <input type="hidden" value="<?php echo $type_id; ?>" name="liner[type_id]" >
                    <input type="hidden" value="<?php echo $datestr; ?>" id="date_str" name="liner[date_str]" >
                </td>
            </tr>
            </tbody>
    </table>
    <!--/表格-->

</div>
</form>
</body>

<link href="/public/resource/css/Calendar.css" rel="stylesheet"/>
<script type="text/javascript">
    var calendar = {
        getTypeList : function(id){
            var _d = window.top.art.dialog({
                lock: true,
                content: '加载中……'
            });
            var _data = 'type_id=' + id + '&date=' + '<?php echo $datestr; ?>';
            var _url = '<?php echo for_url('admin', 'productliner', 'room_date')?>';
            $.ajax({
                url: _url,
                type:'post',
                data: _data,
                dataType: 'json',
                success: function(data){
                    $.each(data, function(i, v){
                        $('#day-' + v.d).attr('checked','true');
                        var parent = $('#day-' + v.d).parents('.date-content');
                        var r = '<p>￥：' + v.trip_price + '</p>' +
                            '<p>' + v.sell_num + '/' + v.total_num + '</p>';
                        parent.append(r);
                        parent.parents('.date-box').addClass('date-box-checked');
                    });
                    _d.close();
                },
                error: function(){
                    alert('出错了');
                }
            });
        }
    }

    //表单提交

    $(function(){
        calendar.getTypeList(<?php echo $type_id; ?>);

        $('#form1').submit(function(){
            doForm($('#form1').attr('action'),$('#form1').serialize(), function(data){
                if(data.state){
                    location.reload();
                }
                return ;
            });
            return false;
        });

        $('.date-box').click(function(){
            $(this).toggleClass('date-box-checked');
            var ch = $(this).find(':checkbox');
            if(ch.attr('checked')){
                ch.removeAttr('checked');
            }else{
                ch.attr('checked', 'true');
            }
        });

        $('#selectAll').click(function(){
            $(':checkbox[id^=day]').attr('checked', 'true');
            return false;
        });
        $('#selectAllUn').click(function(){
            $(':checkbox[id^=day]').each(function(){
                var ch = $(this);
                if(ch.attr('checked')){
                    ch.removeAttr('checked');
                }else{
                    ch.attr('checked', 'true');
                }
            });
            return false;
        });
    })
</script>
