
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
                    <td></td>
                </tr>
                <tr>
                    <td width="80">站点网址</td>
                    <td><input type="text" value="<?php echo $data['site_domain']; ?>" size="30" class="input-text" name="system[site_domain]"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="80">站点logo</td>
                    <td><input type="text" value="<?php echo $data['site_logo']; ?>" size="15" class="input-text" name="system[site_logo]"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="80">备案号</td>
                    <td><input type="text" value="<?php echo $data['site_icp']; ?>" size="10" class="input-text" name="system[site_icp]"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="80">统计代码</td>
                    <td>
                        <textarea name="system[site_stats]" style="width: 500px; height: 150px"><?php echo $data['site_stats']; ?></textarea>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td width="80">站点底部</td>
                    <td>
                        <textarea name="system[site_footer]" style="width: 500px; height: 150px"><?php echo $data['site_footer']; ?></textarea>
                    <td></td>
                </tr>
                <tr>
                    <td width="80">站点关键字</td>
                    <td><input type="text" value="<?php echo $data['site_keyword']; ?>" size="30" class="input-text" name="system[site_keyword]"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="80">站点描述</td>
                    <td>
                        <textarea name="system[site_description]" style="width: 500px; height: 150px"><?php echo $data['site_description']; ?></textarea>
                    </td>
                    <td></td>
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
                    <td></td>
                </tr>
                <tr>
                    <td width="80">站点关闭原因</td>
                    <td>
                        <textarea name="system[site_close_reason]" style="width: 500px; height: 150px"><?php echo $data['site_close_reason']; ?></textarea>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td width="80">访问路径</td>
                    <td><input type="text" value="<?php echo $data['attachment_url']; ?>" size="30" class="input-text" name="system[attachment_url]"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="80">上传路径</td>
                    <td><input type="text" value="<?php echo $data['attachment_dir']; ?>" size="30" class="input-text" name="system[attachment_dir]"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="80">上传类型</td>
                    <td><input type="text" value="<?php echo $data['attachment_type']; ?>" size="40" class="input-text" name="system[attachment_type]"></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="80">上传大小限制</td>
                    <td><input type="text" value="<?php echo $data['attachment_maxupload']; ?>" size="20" class="input-text" name="system[attachment_maxupload]">单位：字节</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" id="btn" class="button" value="保存站点信息">
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
<!-- formValidator-4.1.0.js -->
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidator-4.1.0.js" type="text/javascript" charset="UTF-8"></script>
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){
        $.formValidator.initConfig({formID:"form1",theme:'ArrowSolidBox',mode:'AutoTip',onError:function(msg){
            _alert(msg,'error')
        },inIframe:true});

        $("#sys_name").formValidator({onShow:"请输入系统",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        //$("#sys_module").formValidator({onShow:"请输入控制器",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        //$("#sys_controller").formValidator({onShow:"请输入控制器",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        //$("#sys_action").formValidator({onShow:"请输入方法",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});
        $("#sys_order_id").formValidator({onShow:"请输入排序字段",onFocus:"不能为空",onCorrect:""}).inputValidator({min:1,onError:"不能为空,请确认"});

        $.formValidator.reloadAutoTip();
    });
</script>
