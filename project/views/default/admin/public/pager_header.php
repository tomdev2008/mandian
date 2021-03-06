<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="<?php echo config_item('charset'); ?>">
    <title><?php echo config_item('site_name'); ?>--管理后台</title>
    <meta name="keywords" content="<?php echo config_item('site_keyword'); ?>" />
    <meta name="description" content="<?php echo config_item('site_description'); ?>" />

    <!-- jquery -->
    <script src="/public/resource/js/sea-modules/alias/jquery/jquery-1.8.3.min.js"></script>

    <!-- css -->
    <link href="/public/resource/css/admin.css" rel="stylesheet"/>

    <!-- easyui -->
    <link href="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/default/easyui.css" rel="stylesheet"/>
    <link href="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/icon.css" rel="stylesheet"/>
    <script src="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/jquery.easyui.min.js"></script>
    <script src="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/locale/easyui-lang-zh_CN.js"></script>

    <!-- js模块 -->
    <script charset="utf-8" type="text/javascript" src="/public/resource/js/sea-modules/seajs/seajs/2.1.1/sea.js" id="seajsnode"></script>
    <script charset="utf-8" type="text/javascript">

        $(function(){
            //art.dialog({ content: '我支持HTML' });

        })
        // Set configuration
        seajs.config({
            base: "<?php echo base_url(); ?>public/resource/js/sea-modules/",
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