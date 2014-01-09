
<!--查询表单-->
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
    <tr>
        <td>
            <div class="explain-col">
                <input onclick="location.href = '<?php echo for_url('admin','productliner','add_room_type', array($pro_id))?>';" type="submit" value="添加房型" class="button" name="search">
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
        <th>房型名称</th>
        <th>入住人数</th>
        <th>所在楼层</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($rows as $val){
        echo '<tr>';
        echo '<td>'.$val['room_name'].'</td>';
        echo '<td>'.$val['people_num'].'</td>';
        echo '<td>'.$val['room_floor'].'</td>';
        echo '<td>';
        echo '<a href="javascript:" title="Edit">[查看]</a>&nbsp;';
        echo '<a href="javascript:calendarEdit(\''.$val['room_name'].'\',', $val['liner_room_id'],');" title="Delete">[库存价格]</a>&nbsp;';
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
        window.top.art.dialog.open('<?php echo for_url('admin','productliner','calendar_room_edit') ?>' + type_id,
            {title: type_name + '库存管理', width: 800, height: 550, lock: true, background: '#000'});
    }
</script>
