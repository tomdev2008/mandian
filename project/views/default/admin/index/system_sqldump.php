
<body>
<!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>数据库备份/恢复</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <!--表格-->
        <table width="100%" class="table-form contentWrap">
            <form name="frm" action="<?php echo for_url('admin', 'index','system_sqldump_act'); ?>" method="post">
                <tbody>
                <tr>
                    <td width="220">备份类型</td>
                    <td>
                        <select name="dump[type]">
                            <option selected value="all">全部</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="220">使用扩展插入(Extended Insert)方式</td>
                    <td>
                        <select name="dump[extend]">
                            <option value="1">是</option>
                            <option selected value="0">否</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="220">分卷备份 - 文件长度限制(kb)</td>
                    <td>
                        <p><input type="text" value="65536" class="input-text" size="30" name="dump[length]"></p>
                    </td>
                </tr>
                <tr>
                    <td width="220">备份文件名</td>
                    <td>
                        <p><input type="text" value="backup_<?php echo date('Ymd_His', time()); ?>.sql" class="input-text"
                                  size="30" name="dump[name]"></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" id="btn" class="button" value="备份数据库">
                    </td>
                </tr>
                </tbody>
            </form>
        </table>
        <!--/表格-->
    </div>
    <!--/内容-->

    <p>&nbsp;</p>
    <!--导航-->
    <div class="lines-wrap">
        <p>数据库恢复</p>
    </div>

    <!--列表-->
    <div class="table-list">
        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <th align="left" width="80%">备份名称</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($file_list as $val) { ?>
                <?php if ($val == 'index.html') {
                    continue;
                } ?>
                <tr>
                    <td align="left"><?php echo $val; ?></td>
                    <td align="center"><a
                            href="javascript:if(confirm('确认要恢复？')){restore('<?php echo $val; ?>');}">[恢复]</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="btn">
        </div>
        <div id="pages"></div>
    </div>
    <!--/列表-->
</div>
<!--/内容-->
</div>
<!--/内容区-->
</body>


<script type="text/javascript">
    function restore(val){
        location.href='<?php echo for_url('admin', 'index','restoresql_act'); ?>/' + val;
    }
</script>


