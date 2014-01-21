
<body>
    <!--查询表单-->
    <form name="frm" id="form1" action="<?php echo for_url('admin', 'system','system_log'); ?>"  method="post">
        <table width="100%" cellspacing="0" class="search-form">
            <tbody>
            <tr>
                <td>
                    <div class="explain-col">
                        日期：<input type="text" value="<?php echo $date; ?>" size="10" class="input-text" onfocus="WdatePicker()" name="date">
                        <input type="submit" id="btn" class="btn btn-success" value="查询">
                        <input type="button" id="clearLog" class="btn btn-danger" value="清空日志">
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
    <!--/查询表单-->

    <!--列表-->
    <div class="table-list">
        <table width="100%">
            <thead>
            <tr>
                <th width="200">时间</th>
                <th>内容</th>
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
            foreach($rows as $key => $val){
                echo '<tr>';
                echo '<td>'.$key.'</td>';
                echo '<td class="left">'.$val.'</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>

        <div class="btn">
        </div>
    </div>
    <!--/列表-->
</body>
<!-- My97DatePicker -->
<script language="JavaScript" type="text/javascript" src="/public/resource/js/sea-modules/alias/My97DatePicker/WdatePicker.js" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){
        $('#clearLog').click(function(){
            _confirm('确认清空？', function(){
                location.href = '<?php echo for_url('admin','system','system_log_clear'); ?>';
            })
        })
    })
</script>