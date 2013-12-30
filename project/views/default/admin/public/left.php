<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Documentation - jQuery EasyUI</title>
    <!-- css -->
    <!-- jquery -->
    <script src="/public/resource/js/sea-modules/alias/jquery/jquery-1.8.3.min.js"></script>

    <!-- easyui -->
    <link rel="stylesheet" href="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/default/easyui.css"
          type="text/css" media="screen"/>
    <script src="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/jquery.easyui.min.js"></script>
    <script src="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/locale/easyui-lang-zh_CN.js"></script>
</head>

<body class="easyui-layout" style="text-align:left">
<div region="west" border="true" title="导航" style="width:220px;padding:5px;">
    <ul class="easyui-tree" id="tt"></ul>
</div>
</body>
</html>
<script type="text/javascript">
    window.base_url = '<?php echo base_url(); ?>';
    $('#tt').tree({
        url:'<?php echo for_url('admin', 'index', 'get_admin_menu'); ?>',
        animate:true,
        onClick: function(node){
            if(typeof node.attributes != 'undefined')
            {
                window.parent.frames['mainFrame'].location.href = base_url + node.attributes.url;
            }
        }
    });
</script>
