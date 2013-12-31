
<body class="easyui-layout">
<div data-options="region:'center',title:'<?php echo $current_pos; ?>'">


    <!--查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    <input onclick="location.href = '<?php echo for_url('admin','index','user_add')?>';" type="submit" value="添加用户" class="button" name="search">
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <!--/查询表单-->

    <!--列表-->
    <div class="table-list">
        <table width="100%">
            <thead>
            <tr>
                <th>
                    <input class="check-all" type="checkbox" />
                </th>
                <th>用户名</th>
                <th>角色</th>
                <th>E-mail</th>
                <th>注册时间</th>
                <th>上次登录时间</th>
                <th>上次登录IP</th>
                <th>登陆次数</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="10">
                    <div class="bulk-actions align-left">
                        <!--<select name="dropdown">
                            <option value="option1">操作...</option>
                            <option value="option3">删除</option>
                        </select>
                        <a class="button" href="#">确认</a>-->
                    </div>
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
                echo '<td>'.$val['user_name'].'</td>';
                echo '<td>'.$val['role_name'].'</td>';
                echo '<td>'.$val['email'].'</td>';
                echo '<td>'.$val['reg_time'].'</td>';
                echo '<td>'.$val['last_time'].'</td>';
                echo '<td>'.$val['last_ip'].'</td>';
                echo '<td>'.$val['visit_count'].'</td>';
                echo '<td>'.(empty($val['enabled']) ? '<font style="color:red;">×</font>' : '<font style="color:green;">√</font>' ).'</td>';
                echo '<td>';
                echo '<a href="',for_url('admin','index','user_edit', array($val['user_id'])), '" title="Edit">[编辑]</a>&nbsp;';
                echo '<a href="javascript:del(',$val['user_id'],')" title="Delete">[删除]</a>&nbsp;';
                echo '<a href="',for_url('admin','index','system_role/'.$val['user_id']), '" title="Edit Meta">[角色关联]</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>

        <div class="btn">
        </div>
    </div>
    <!--/列表-->
</div>
</body>
<script>
    function del(id){
        _confirm('确认删除？',function(){
            location.href = '<?php echo for_url('admin','index','user_del'); ?>' + id;
        });
    }
</script>