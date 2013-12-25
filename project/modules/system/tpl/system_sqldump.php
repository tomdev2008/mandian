<div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
    <div class="clear"></div>
    <!-- End .content-box -->
    <div class="content-box">
        <!-- Start Content Box -->
        <div class="content-box-header">
            <h3>修改模块信息</h3>
            <div class="clear"></div>
        </div>
        <!-- End .content-box-header -->

        <div class="content-box-content">
            <div class="tab-content">
                <form name="frm" id="form1" action="<?php echo for_url('system', 'system','system_sqldump_act'); ?>"  method="post">
                    <fieldset>
                        <div>
                            <label>注册状态</label>
                            <select name="dump[type]">
                                <option selected value="all">全部</option>
                            </select>
                        </div>
                        <div>
                            <label>启用扩展</label>
                            <select name="dump[extend]">
                                <option value="1">是</option>
                                <option selected value="0">否</option>
                            </select>
                        </div>

                        <div>
                            <label>分卷备份 - 文件长度限制(kb)</label>
                            <input type="text" value="65536" class="text-input small-input" size="30" name="dump[length]">
                        </div>
                        <div>
                            <label>备份文件名</label>
                            <input type="text" value="backup_<?php echo date('Ymd_His', time()); ?>.sql" class="text-input small-input" size="30" name="dump[name]"></p>
                            <div id="sys_moduleTip" class="input-tip"></div>
                        </div>

                        <div>
                            <input class="button" type="submit" value="保存"/>
                        </div>
                    </fieldset>
                    <div class="clear"></div>
                    <!-- End .clear -->
                </form>
            </div>
            <!-- End #tab2 -->
        </div>
        <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->

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
                <table>
                    <thead>
                    <tr>
                        <th>名称</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($file_list as $val) { ?>
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
            </div>
        </div>
        <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
</div>
<!-- End #main-content -->


<script type="text/javascript">
    function restore(val){
        location.href='<?php echo for_url('system', 'system','restoresql_act'); ?>/' + val;
    }
</script>


