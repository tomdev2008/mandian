<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simpla Admin </title>
    <!--                       CSS                       -->
    <!-- Reset Stylesheet -->
    <link rel="stylesheet" href="/resource/css/reset.css" type="text/css" media="screen" />
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/resource/css/style.css" type="text/css" media="screen" />
    <!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
    <link rel="stylesheet" href="/resource/css/invalid.css" type="text/css" media="screen" />
</head>
<body id="login">
<div id="login-wrapper" class="png_bg">
    <div id="login-top">
        <h1>Simpla Admin</h1>
        <!-- Logo (221px width) -->
        <a href="#"><img id="logo" src="/resource/images/logo.png" alt="Simpla Admin logo" /></a> </div>
    <!-- End #logn-top -->
    <div id="login-content">
        <form  action="<?php echo for_url('system', 'welcome','login_act'); ?>"  method="post">
            <p>
                <label>Username</label>
                <input class="text-input" name="user_name" type="text" />
            </p>
            <div class="clear"></div>
            <p>
                <label>Password</label>
                <input class="text-input" name="password" type="password" />
            </p>
            <div class="clear"></div>
            <p id="remember-password">
                <input type="checkbox" />
                Remember me </p>
            <div class="clear"></div>
            <p>
                <input class="button" type="submit" value="登陆" />
            </p>
        </form>
    </div>
    <!-- End #login-content -->
</div>
<!-- End #login-wrapper -->
</body>
</html>
