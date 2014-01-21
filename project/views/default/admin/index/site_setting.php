
<body>
    <!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>站点设置</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <!--表格-->
        <table width="100%" class="table-form contentWrap">
            <form name="frm" id="form1" action="<?php echo for_url('admin','system','save_site_setting')?>"  method="post">
                <tbody>
                <tr>
                    <td width="80">站点名称</td>
                    <td><input type="text" value="<?php echo $data['site_name']; ?>" size="30" class="input-text" name="system[site_name]"></td>
                    
                </tr>
                <tr>
                    <td width="80">站点网址</td>
                    <td><input type="text" value="<?php echo $data['site_domain']; ?>" size="30" class="input-text" name="system[site_domain]"></td>
                    
                </tr>
                <tr>
                    <td width="80">站点logo</td>
                    <td><input type="text" value="<?php echo $data['site_logo']; ?>" size="15" class="input-text" name="system[site_logo]"></td>
                    
                </tr>
                <tr>
                    <td width="80">备案号</td>
                    <td><input type="text" value="<?php echo $data['site_icp']; ?>" size="10" class="input-text" name="system[site_icp]"></td>
                    
                </tr>
                <tr>
                    <td width="80">统计代码</td>
                    <td>
                        <textarea name="system[site_stats]" style="width: 500px; height: 150px"><?php echo $data['site_stats']; ?></textarea>
                    </td>
                    
                </tr>
                <tr>
                    <td width="80">站点底部</td>
                    <td>
                        <textarea name="system[site_footer]" style="width: 500px; height: 150px"><?php echo $data['site_footer']; ?></textarea>
                    
                </tr>
                <tr>
                    <td width="80">站点关键字</td>
                    <td><input type="text" value="<?php echo $data['site_keyword']; ?>" size="60" class="input-text" name="system[site_keyword]"></td>
                    
                </tr>
                <tr>
                    <td width="80">站点描述</td>
                    <td>
                        <textarea name="system[site_description]" style="width: 500px; height: 150px"><?php echo $data['site_description']; ?></textarea>
                    </td>
                    
                </tr>
                <tr>
                    <td width="80">站点状态</td>
                    <td>
                        <select id="site_status" name="system[site_status]">
                            <option value="0">关闭</option>
                            <option value="1">开启</option>
                        </select>
                        <script type="text/javascript">
                            $("#site_status").val(<?php echo $data['site_status'] ?>);
                        </script>
                    
                </tr>
                <tr>
                    <td width="80">站点关闭原因</td>
                    <td>
                        <textarea name="system[site_close_reason]" style="width: 500px; height: 150px"><?php echo $data['site_close_reason']; ?></textarea>
                    </td>
                    
                </tr>
                <tr>
                    <td width="80">访问路径</td>
                    <td><input type="text" value="<?php echo $data['attachment_url']; ?>" size="30" class="input-text" name="system[attachment_url]"></td>
                    
                </tr>
                <tr>
                    <td width="80">上传路径</td>
                    <td><input type="text" value="<?php echo $data['attachment_dir']; ?>" size="30" class="input-text" name="system[attachment_dir]"></td>
                    
                </tr>
                <tr>
                    <td width="80">上传类型</td>
                    <td><input type="text" value="<?php echo $data['attachment_type']; ?>" size="40" class="input-text" name="system[attachment_type]"></td>
                    
                </tr>
                <tr>
                    <td width="80">上传大小限制</td>
                    <td><input type="text" value="<?php echo $data['attachment_maxupload']; ?>" size="20" class="input-text" name="system[attachment_maxupload]">单位：字节</td>
                    
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" id="btn" class="btn btn-success" value="保存站点信息">
                        <input type="button" class="btn" value="更新缓存" onclick="location.href='<?php echo for_url('admin','system','site_setting_cache') ?>';">
                    </td>
                </tr>
                </tbody>
            </form>
        </table>
        <!--/表格-->

    </div>
    <!--/内容-->
</div>
</body>
<!--/内容区-->
