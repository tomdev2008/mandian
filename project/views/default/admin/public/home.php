<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Full Layout - jQuery EasyUI Demo</title>
    <!-- jquery -->
    <script src="/public/resource/js/sea-modules/alias/jquery/jquery-1.8.3.min.js"></script>

    <!-- art dialog -->
    <script src="/public/resource/js/sea-modules/alias/artDialog4.1.7/jquery.artDialog.js?skin=default"></script>
    <script type="text/javascript" src="/public/resource/js/sea-modules/alias/artDialog4.1.7/plugins/iframeTools.js"></script> <!-- 对iframe的新工具 -->

    <!-- css -->
    <link href="/public/resource/css/admin.css" rel="stylesheet"/>

    <!-- easyui -->
    <link href="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/default/easyui.css" rel="stylesheet"/>
    <script src="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/jquery.easyui.min.js"></script>
    <script src="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/locale/easyui-lang-zh_CN.js"></script>

</head>
<body class="easyui-layout">
<div data-options="region:'north',border:false" style="height:60px;padding:0px">
    <div style="background-color:#600; width: 100%; height: 60px; color: #fff;">
        <div style="font-size: 20px; line-height: 30px; text-align: left;">后台</div>
        <div style="float: right;">[]<a href="javascript:logOut();" >退出</a></div>
    </div>
</div>
<div data-options="region:'west',split:true,title:'导航'" style="width:220px;padding:5px;">
    <ul class="easyui-tree" id="tt"></ul>
</div>
<div data-options="region:'center'" style="overflow-y: hidden">
    <iframe name="right" id="rightMain" src="<?php echo for_url('admin', 'index', 'user_list'); ?>" frameborder="false" scrolling="auto" width="100%" height="auto" allowtransparency="true"></iframe>
</div>
</body>
</html>
<script type="text/javascript">
    window.base_url = '<?php echo base_url(); ?>';
    (function(){

        $('#tt').tree({
            url:'<?php echo for_url('admin', 'index', 'get_admin_menu'); ?>',
            animate:true,
            onClick: function(node){
                if(typeof node.attributes != 'undefined')
                {
                    $('#rightMain').attr('src', base_url + node.attributes.url);
                }
            }
        });
        //高度设置
        var Body = $(window);
        var heights = Body.height() - 60;
        $('#rightMain').css({height:heights});
    })();

    function logOut(){

        if(confirm('确认退出？'))
        {
            location.href = '<?php echo for_url('admin', 'index', 'logout')?>';
        }
    }
</script>