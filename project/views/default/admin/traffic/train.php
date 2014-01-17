

<body>

    <!--查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    <input onclick="location.href = '<?php echo for_url('admin','traffic','train_edit')?>';" type="submit" value="添加火车车次" class="button" name="search">
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
            <th>车次</th>
            <th>车型</th>
            <th>始发地</th>
            <th>目的地</th>
            <th>开车时间</th>
            <th>到站时间</th>
            <th>总时长</th>
            <th>操作</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="9">
                <div class="bulk-actions align-left">
                    <!--<select name="dropdown">
                        <option value="option1">操作...</option>
                        <option value="option3">删除</option>
                    </select>
                    <a class="button" href="#">确认</a> -->
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
            echo '<td>'.$val['train_num'].'</td>';
            echo '<td>'.$val['train_type'].'</td>';
            echo '<td>'.$val['train_start'].'</td>';
            echo '<td>'.$val['train_arrive_place'].'</td>';
            echo '<td>'.$val['train_start_time'].'</td>';
            echo '<td>'.$val['train_arrive_time'].'</td>';
            echo '<td>'.$val['train_total_time'].'(h)</td>';
            echo '<td>';
            echo '<a href="',for_url('admin','traffic','train_edit', array($val['train_id'])), '" title="Edit">[编辑]</a>&nbsp;';
            echo '<a href="javascript:del(', $val['train_id'],');" title="Delete">[删除]</a>&nbsp;';
            echo '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <!--/列表-->
</body>
<script>
    function del(id){
        _confirm('确认删除？',function(){
            location.href = '<?php echo for_url('admin','traffic','train_del'); ?>' + id;
        });
    }
</script>
