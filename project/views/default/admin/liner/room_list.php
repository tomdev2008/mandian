<style type="text/css">
    .labelspan{ margin: 2px 5px; display: inline-block;}
    .labelspan input{ margin: 0px 3px;}
</style>
<body>
    <!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>修改信息</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <table width="100%" class="table-form contentWrap">
            <tr>
                <td>
                    <div class="tabs-container" style="width: auto; height: auto;">
                        <div class="tabs-header">
                            <div class="tabs-wrap" style="margin-left: 0px; margin-right: 0px; width: 5004px;">
                                <ul class="tabs" style="height: 26px;">
                                    <li class="">
                                        <a class="tabs-inner" href="<?php echo for_url('admin','liner','edit', array($liner_id)); ?>" style="height: 25px; line-height: 25px;">
                                            <span class="tabs-title">基本信息</span>
                                        </a
                                    </li>
                                    <li class="tabs-selected">
                                        <a class="tabs-inner" href="<?php echo for_url('admin','liner','room_list', array($liner_id)); ?>" style="height: 25px; line-height: 25px;">
                                            <span class="tabs-title">舱房信息</span></a>
                                    </li>
                                    <li class="">
                                        <a class="tabs-inner" href="<?php echo for_url('admin','liner','floor_list', array($liner_id)); ?>" style="height: 25px; line-height: 25px;">
                                            <span class="tabs-title">楼层详情</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <!--查询表单-->
        <table width="100%" cellspacing="0" class="search-form">
            <tbody>
            <tr>
                <td>
                    <div class="explain-col">
                        <input onclick="location.href = '<?php echo for_url('admin','liner','room_edit', array($liner_id))?>';" type="submit" value="添加房间" class="button" name="search">
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
                <th>面积(㎡)</th>
                <th>所在楼层</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($rows as $val){
                echo '<tr>';
                echo '<td class="left">'.$val['room_name'].'</td>';
                echo '<td>'.$val['people_num'].'</td>';
                echo '<td>'.$val['room_area'].'</td>';
                echo '<td>'.$val['room_floor'].'</td>';
                echo '<td>';
                echo '<a href="',for_url('admin','liner','room_edit', array($val['liner_room_id'])), '" title="Edit">[编辑]</a>&nbsp;';
                echo '<a href="javascript:del(', $val['liner_room_id'],');" title="Delete">[删除]</a>&nbsp;';
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
<script>
    function del(id){
        _confirm('确认删除？',function(){
            location.href = '<?php echo for_url('admin','liner','del_room', array($liner_id)); ?>/' + id;
        });
    }
</script>
