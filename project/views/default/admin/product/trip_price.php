
<!--查询表单-->
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
    <tr>
        <td>
            <div class="explain-col">
                <input type="text" value="" class="input-text" size="30" id="new-type-name">
                <input type="submit" value="添加线路控制" class="button" id="add-type">
            </div>
        </td>
    </tr>
    </tbody>
</table>
<!--/查询表单-->
<!--列表-->
<table class="table-list" width="100%">
    <thead>
    <tr>
        <th>名称</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($rows as $val){
        echo '<tr>';
        echo '<td>'.$val['type_name'].'</td>';
        echo '<td>';
        echo '<a href="javascript:calendarEdit(\''.$val['type_name'].'\',', $val['type_id'],');" title="Delete">[库存价格]</a>&nbsp;';
        echo '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
<!--/列表-->

</div>
<!--/内容-->
</div>
</body>
<!--/内容区-->
<script type="text/javascript">
    function calendarEdit(type_name, type_id){
        window.top.art.dialog.open('<?php echo for_url('admin','product','calendar_room_edit') ?>' + type_id,
            {title: type_name + '库存管理', width: 800, height: 550, lock: true, background: '#000'});
    }

    $(function(){
        $('#add-type').click(function(){

            var _dailog = _alert('添加，请稍后……');
            var _c = $('#new-type-name').val();
            $.ajax({
                url: '<?php echo for_url('admin', 'product', 'add_trip_type') ?>',
                type:'post',
                data: 'c=' + _c + '&pro_id=<?php echo $pro_id; ?>',
                dataType: 'json',
                success: function(data){
                    _dailog.close();
                    if(data.state){
                        _alert('操作成功', function(){
                            location.reload();
                        });
                    }else{
                        _alert('失败了，请重试');
                    }
                },
                error: function(){
                }
            });
        })
    })
</script>
