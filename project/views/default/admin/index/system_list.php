
<body class="easyui-layout">
<div data-options="region:'center',title:'导航条'">

    <!--查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    <input onclick="location.href = '<?php echo for_url('admin','index','system_add')?>';" type="submit" value="添加系统模块" class="button" name="search">
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
            <th>
                <input class="check-all" type="checkbox" />
            </th>
            <th>名称</th>
            <th>module</th>
            <th>controller</th>
            <th>action</th>
            <th>状态</th>
            <th>可视</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="5">
                <div class="bulk-actions align-left">
                    <select name="dropdown">
                        <option value="option1">操作...</option>
                        <option value="option3">删除</option>
                    </select>
                    <a class="button" href="#">确认</a> </div>
                <div class="pagination" id="seaPager">

                </div>
                <!-- End .pagination -->
                <div class="clear"></div>
            </td>
        </tr>
        </tfoot>
        <tbody>
        <?php
        foreach($data as $val){
            echo '<tr>';
            echo '<td> <input type="checkbox" /> </td>';
            echo '<td>'.$val['sys_name'].'</td>';
            echo '<td>'.$val['sys_module'].'</td>';
            echo '<td>'.$val['sys_controller'].'</td>';
            echo '<td>'.$val['sys_action'].'</td>';
            echo '<td>'.(empty($val['enabled']) ? '<font style="color:red;">×</font>' : '<font style="color:green;">√</font>' ).'</td>';
            echo '<td>'.(empty($val['visiabled']) ? '<font style="color:red;">×</font>' : '<font style="color:green;">√</font>' ).'</td>';
            echo '<td>'.$val['sys_order_id'].'</td>';
            echo '<td>&nbsp;&nbsp;';
            echo '<a href="',for_url('admin','index','system_edit', array($val['sys_id'])), '" title="Edit">[编辑]</a>&nbsp;';
            echo '<a href="javascript:del(', $val['sys_id'],');" title="Delete">[删除]</a>&nbsp;';
            echo '</td>';
            echo '</tr>';
            if(is_array($val['children'])){
                foreach($val['children'] as $val2){
                    echo '<tr>';
                    echo '<td> <input type="checkbox" /> </td>';
                    echo '<td>&nbsp;&nbsp;└'.$val2['sys_name'].'</td>';
                    echo '<td>&nbsp;&nbsp;'.$val2['sys_module'].'</td>';
                    echo '<td>&nbsp;&nbsp;'.$val2['sys_controller'].'</td>';
                    echo '<td>&nbsp;&nbsp;'.$val2['sys_action'].'</td>';
                    echo '<td>&nbsp;&nbsp;'.(empty($val2['enabled']) ? '<font style="color:red;">×</font>' : '<font style="color:green;">√</font>' ).'</td>';
                    echo '<td>&nbsp;&nbsp;'.(empty($val2['visiabled']) ? '<font style="color:red;">×</font>' : '<font style="color:green;">√</font>' ).'</td>';
                    echo '<td>'.$val2['sys_order_id'].'</td>';
                    echo '<td>&nbsp;&nbsp;';
                    echo '<a href="',for_url('admin','index','system_edit', array($val2['sys_id'])), '" title="Edit">[编辑]</a>&nbsp;';
                    echo '<a href="javascript:del(', $val2['sys_id'],');" title="Delete">[删除]</a>&nbsp;';
                    echo '</td>';
                    echo '</tr>';
                }
            }
        }
        ?>
        </tbody>
    </table>
    <!--/列表-->
</div>
</body>
<script type="text/javascript">
    function del(id){
        _confirm('确认删除？',function(){location.href = '<?php echo for_url('admin','index','system_del') ;?>'+id;});
    }
</script>

