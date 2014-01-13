

<body>

    <!--查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    <input onclick="location.href = '<?php echo for_url('admin','traffic','edit')?>';" type="submit" value="添加航班" class="button" name="search">
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
            <th>航班号</th>
            <th>机型</th>
            <th>始发地/起飞机场</th>
            <th>目的地/降落机场</th>
            <th>起飞时间</th>
            <th>降落时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="8">
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
            echo '<td>'.$val['flight_num'].'</td>';
            echo '<td>'.$val['flight_type'].'</td>';
            echo '<td>'.$val['start_airport_place'].'/'.$val['start_airport_name'].'</td>';
            echo '<td>'.$val['arrive_place_name'].'/'.$val['arrive_airport_name'].'</td>';
            echo '<td>'.$val['start_airplane_time'].'</td>';
            echo '<td>'.$val['arrive_airplane_time'].'</td>';
            echo '<td>';
            echo '<a href="',for_url('admin','traffic','edit', array($val['plane_id'])), '" title="Edit">[编辑]</a>&nbsp;';
            echo '<a href="javascript:del(', $val['plane_id'],');" title="Delete">[删除]</a>&nbsp;';
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
            location.href = '<?php echo for_url('admin','traffic','del'); ?>' + id;
        });
    }
</script>
