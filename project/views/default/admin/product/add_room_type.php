<style type="text/css">
    .labelspan{ margin: 2px 5px; display: inline-block;}
    .labelspan input{ margin: 0px 3px;}
</style>
<body>
    <!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>添加房型</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <!--列表-->
        <form name="frm" id="form1" action="<?php echo for_url('admin', 'productliner','add_room_action'); ?>"  method="post">
        <table class="table-list" width="100%">
            <thead>
            <tr>
                <th><input type="checkbox" name="" /></th>
                <th>房型名称</th>
                <th>入住人数</th>
                <th>面积(㎡)</th>
                <th>所在楼层</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($rows as $val){
                echo '<tr>';
                $checked = in_array($val['liner_room_id'], $room_type) ? 'checked' : '' ;
                echo '<td><input type="checkbox" name="liner[liner_room_id][]" '.$checked.' value="'.$val['liner_room_id'].'" /></td>';
                echo '<td>'.$val['room_name'].'</td>';
                echo '<td>'.$val['people_num'].'</td>';
                echo '<td>'.$val['room_area'].'</td>';
                echo '<td>'.$val['room_floor'].'</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5">
                    <input type="submit" rel="btn" class="button" value="保存并返回">
                    <input type="hidden" name="liner[pro_id]" class="button" value="<?php echo $pro_id ?>">
                </td>
            </tr>
            </tfoot>
        </table>
        </form>
        <!--/列表-->

    </div>
    <!--/内容-->
</div>
</body>
<!--/内容区-->
<script type="text/javascript">
    $('#form1').submit(function(){
        doForm($('#form1').attr('action'),$('#form1').serialize(), function(data){
            _alert(data.msg, function(){
                if(data.state){
                    location.href = '<?php echo for_url('admin', 'productliner','trip_price', array($pro_id)); ?>';
                }
            })
            return ;
        });
        return false;

    });
</script>
