
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
            <form name="frm" action="<?php echo for_url('admin', 'db','system_sqldump_act'); ?>" method="post">
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
                            <input type="text" value="backup_<?php echo date('Ymd_His', time()); ?>.sql" class="input-text" size="30" name="dump[name]">

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" id="btn" class="button" value="备份数据库">
                        <input onclick="flushdb()" type="submit" value="清空备份" class="button" name="search">
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
                <th align="left">备份名称</th>
                <th>大小</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($file_list as $val) { ?>
                <?php if ($val == 'index.html') {
                    continue;
                }
                $path = ROOTPATH . 'temp' . DS . 'sqldump' . DS . $val;
                $info = get_file_info($path);
                $info['size'] = number_format($info['size']/1024, 2) . 'Kb';
                ?>
                <tr>
                    <td align="left"><?php echo $info['name']; ?></td>
                    <td><?php echo $info['size']; ?></td>
                    <td><?php echo date('Y-m-d H:i:s', $info['date']); ?></td>
                    <td>
                        <a href="javascript:restore('<?php echo $val; ?>');">[恢复]</a>
                        <a href="javascript:del('<?php echo $val; ?>');">[删除]</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!--/列表-->
</div>
<!--/内容-->
</div>
<!--/内容区-->
</body>


<script type="text/javascript">

    function flushdb(){
        _confirm('确认要清空？',function(){
            location.href='<?php echo for_url('admin', 'db','flushdbsql_act'); ?>';
        });
    }
    function restore(val){
        _confirm('确认要恢复？',function(){
            location.href='<?php echo for_url('admin', 'db','restoresql_act'); ?>/' + val;
        });
    }

    function del(val){
        _confirm('确认删除？',function(){
            location.href='<?php echo for_url('admin', 'db','delsql_act'); ?>/' + val;
        });
    }
</script>


