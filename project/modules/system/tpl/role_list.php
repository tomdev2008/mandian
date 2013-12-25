<div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
    <ul class="shortcut-buttons-set">
        <li><a class="shortcut-button" href="<?php echo for_url('system','user','role_add') ?>"><span> <img src="/resource/images/icons/pencil_48.png" alt="icon" /><br />
        添加新角色 </span></a></li>
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
                <div class="notification attention png_bg"> <a href="#" class="close"><img src="/resource/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
                    <div> 请谨慎操作 </div>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th>
                            <input class="check-all" type="checkbox" />
                        </th>
                        <th>角色名</th>
                        <th>状态</th>
                        <th>级别</th>
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
                                <script type="text/javascript">
                                    seajs.config({
                                        alias: {
                                            "pager": "alias/pager/pager"
                                        }
                                    });
                                    var _pg = null;
                                    seajs.use(["pager"], function(pager){
                                        _pg = pager;
                                        _pg.pageCount = <?php echo $total; ?>; //定义总页数(必要)
                                        _pg.argName = 'p';    //定义参数名(可选,缺省为page)
                                        _pg.printHtml('seaPager');        //显示页数
                                    });
                                </script>
                            </div>
                            <!-- End .pagination -->
                            <div class="clear"></div>
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    foreach($rows as $val){
                        echo '<tr>';
                        echo '<td> <input type="checkbox" /> </td>';
                        echo '<td>'.$val['role_name'].'</td>';
                        echo '<td>'.(empty($val['enabled']) ? '<font style="color:red;">×</font>' : '<font style="color:green;">√</font>' ).'</td>';
                        echo '<td><div style="height: 18px; width: '.$val['rights_per'].'%; background-color:#3A6EA5; font-weight:bold; color:white">&nbsp;'.$val['rights_per'].'%</div></td>';
                        echo '<td>';
                        echo '<a href="',for_url('system','user','role_edit/'.$val['role_id']), '" title="Edit">[编辑]</a>&nbsp;';
                        echo '<a href="javascript:del(', $val['role_id'],');" title="Delete">[删除]</a>&nbsp;';
                        echo '<a href="',for_url('system','system','role_access/'.$val['role_id']), '" title="Edit Meta">[权限管理]</a>';
                        echo '</td>';
                        echo '</tr>';
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
        _confirm('确认删除？',function(){location.href = '<?php echo for_url('system','user','role_del') ;?>'+id;});
    }
</script>

