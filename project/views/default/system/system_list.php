<div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
    <ul class="shortcut-buttons-set">
        <li><a class="shortcut-button" href="<?php echo for_url('system','system','system_add') ?>"><span> <img src="/public/resource/images/icons/pencil_48.png" alt="icon" /><br />
        添加新模块 </span></a></li>
        <!--<li><a class="shortcut-button" href="#"><span> <img src="/resource/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
        Create a New Page </span></a></li>
        <li><a class="shortcut-button" href="#"><span> <img src="/resource/images/icons/image_add_48.png" alt="icon" /><br />
        Upload an Image </span></a></li>
        <li><a class="shortcut-button" href="#"><span> <img src="/resource/images/icons/clock_48.png" alt="icon" /><br />
        Add an Event </span></a></li>
        <li><a class="shortcut-button" href="#messages" rel="modal"><span> <img src="/resource/images/icons/comment_48.png" alt="icon" /><br />
        Open Modal </span></a></li>-->
    </ul>
    <!-- End .shortcut-buttons-set -->

    <!-- Page Head -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
        <!-- Start Content Box -->
        <div class="content-box-header">
            <h3>所有用户</h3>
            <div class="clear"></div>
        </div>
        <!-- End .content-box-header -->
        <div class="content-box-content">
            <div class="tab-content default-tab">
                <!-- This is the target div. id must match the href of this div's tab -->
                <div class="notification attention png_bg"> <a href="#" class="close"><img src="/public/resource/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                    <div> 请谨慎操作 </div>
                </div>
                <table>
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
                        echo '<td>';
                        echo '<a href="',for_url('system','system','system_edit/'.$val['sys_id']), '" title="Edit">[编辑]</a>&nbsp;';
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
                                echo '<td>&nbsp;&nbsp;';
                                echo '<a href="',for_url('system','system','system_edit/'.$val2['sys_id']), '" title="Edit">[编辑]</a>&nbsp;';
                                echo '<a href="javascript:del(', $val2['sys_id'],');" title="Delete">[删除]</a>&nbsp;';
                                echo '</td>';
                                echo '</tr>';
                            }
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
</div>
<!-- End #main-content -->
<script type="text/javascript">
    function del(id){
        _confirm('确认删除？',function(){location.href = '<?php echo for_url('system','system','system_del') ;?>'+id;});
    }
</script>

