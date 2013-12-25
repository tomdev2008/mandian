<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simpla Admin</title>

    <!--                       CSS                       -->
    <!-- Reset Stylesheet -->
    <link rel="stylesheet" href="/resource/css/reset.css" type="text/css" media="screen" />
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/resource/css/style.css" type="text/css" media="screen" />
    <!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
    <link rel="stylesheet" href="/resource/css/invalid.css" type="text/css" media="screen" />

    <!-- easyui 1.3.4 -->
    <link rel="stylesheet" type="text/css" href="/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/icon.css">

    <!-- jquery -->
    <script src="/resource/js/sea-modules/alias/jquery/jquery-1.8.3.min.js"></script>
    <script src="/resource/js/sea-modules/alias/jquery-easyui-1.3.4/jquery.easyui.min.js"></script>
    <script src="/resource/js/sea-modules/alias/jquery-easyui-1.3.4/locale/easyui-lang-zh_CN.js"></script>

    <!-- js模块 -->
    <script charset="utf-8" type="text/javascript" src="/resource/js/sea-modules/seajs/seajs/2.1.1/sea.js" id="seajsnode"></script>
    <script charset="utf-8" type="text/javascript">
        // Set configuration
        seajs.config({
            base: "<?php echo base_url(); ?>resource/js/sea-modules/",
            debug: true,
            alias:{
                'cookie': 'alias/jquery/jquery.cookie.js'
            }
        });
        window.crm_base_url = "<?php echo base_url(); ?>";
        // For development
        seajs.use(["projects/1.0.0/common"]);
    </script>

</head>
<body>
<!--[if lte IE 6]>
<div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>
    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'>
        &nbsp;&nbsp;
    </div>
    <div style='width: 800px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden;'>
        <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
            <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>提示：您还在用即将淘汰的IE 6？</div>
            <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>为了获得更好的用户检验，请升级您的浏览器！</div>
        </div>
    </div>
</div>
<![endif]-->

<!--[if IE 7]>
<div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>
    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'>
        &nbsp;&nbsp;
    </div>
    <div style='width: 800px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden;'>
        <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
            <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>提示：您还在用即将淘汰的IE 7？</div>
            <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>为了获得更好的用户检验，请升级您的浏览器！</div>
        </div>
    </div>
</div>
<![endif]-->
<div id="body-wrapper">
    <!-- Wrapper for the radial gradient background -->
    <div id="sidebar">
        <div id="sidebar-wrapper">
            <!-- Sidebar with logo and menu -->
            <h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
            <!-- Logo (221px wide) -->
            <a href="#"><img id="logo" src="/resource/images/logo.png" alt="Simpla Admin logo" /></a>
            <!-- Sidebar Profile links -->
            <div id="profile-links"> 你好, <a href="#" title="Edit your profile"><?php echo $user_name; ?>&nbsp;[<?php echo $role_name; ?>]</a><br />
                <a href="#" id="logout" title="Sign Out">退出</a> </div>
            <ul id="main-nav">
                <!-- Accordion Menu -->
                <?php
                    foreach($navgition as $main){
                        echo '<li> <a href="#" class="nav-top-item">  ', $main['sys_name'] , ' </a>';
                        if(!empty($main['children'])){
                            echo '<ul>';
                            foreach($main['children'] as $sub){
                                echo '<li><a href="', for_url($sub['sys_module'],$sub['sys_controller'],$sub['sys_action']) , '">', $sub['sys_name'] , '</a></li>';
                            }
                            echo '</ul>';
                        }
                        echo '</li>';
                    }
                ?>
            </ul>
            <!-- End #main-nav -->
        </div>
    </div>
    <!-- End #sidebar -->