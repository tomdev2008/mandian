<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simpla Admin </title>
    <!-- jquery -->
    <script src="/public/resource/js/sea-modules/alias/jquery/jquery-1.8.3.min.js"></script>

    <!-- css -->
    <link href="/public/resource/css/admin.css" rel="stylesheet"/>

    <!-- easyui -->
    <link href="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/default/easyui.css" rel="stylesheet"/>
    <script src="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/jquery.easyui.min.js"></script>
    <script src="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/locale/easyui-lang-zh_CN.js"></script>
</head>
<body style="background: url(/public/resource/images/bg-login.gif);">
<div class="easyui-window" title="登陆" style="height:300px;width:500px;background:#fafafa"
     collapsible="false" minimizable="false" maximizable="false" closable="false" >
    <div class="header" style="height:60px;padding:0px;magin:0px; background-color: #600">
        <div style="margin:0 auto;padding:20px 160px;font-size:22px;text-shadow:1px 1px rgba(152,135,162,.5);color:#fff;">旅游管理系统</div>
    </div>
    <div style="padding:30px 0px;">
        <form  action="<?php echo for_url('admin', 'index','login_act'); ?>"  method="post">
            <div style="text-align:right; margin-top: 10px;">
                <label style="text-align:right; font-size: 14px;">用户名：</label>
                <input class="input-text" style="margin-right: 150px;" name="user_name" type="text" />
            </div>
            <div style="text-align:right; margin-top: 10px;">
                <label style="text-align:right; font-size: 14px;">密码：</label>
                <input class="input-text" style="margin-right: 150px;" name="password" type="password" />
            </div>
            <div style="text-align:center;margin-top:20px;">
                <input class="button" type="submit" value="登陆" />
            </div>
        </form>
    </div>
</div>
</body>
</html>
