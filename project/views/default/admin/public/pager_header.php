<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simpla Admin</title>

    <!-- jquery -->
    <script src="/public/resource/js/sea-modules/alias/jquery/jquery-1.8.3.min.js"></script>

    <!-- art dialog -->
    <script src="/public/resource/js/sea-modules/alias/artDialog4.1.7/jquery.artDialog.js?skin=aero"></script>
    <script type="text/javascript" src="/public/resource/js/sea-modules/alias/artDialog4.1.7/plugins/iframeTools.js"></script> <!-- 对iframe的新工具 -->

    <!-- css -->
    <link href="/public/resource/css/admin.css" rel="stylesheet"/>

    <!-- easyui -->
    <link href="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/default/easyui.css" rel="stylesheet"/>
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