<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Full</title>
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
    <div style="background-color:#600; width: 100%; height: 60px; color: #fff; overflow: hidden">
        <div style="font-size: 20px; height: 60px;  line-height: 30px; text-align: left; padding: 10px; width: 50%; float: left;">后台</div>
        <div style=" width: 20%;float: right; height: 60px; font-size: 14px; font-weight: bold; line-height: 30px; padding: 10px; text-align: right;">
            <?php echo $user_name; ?>&nbsp;[<?php echo $role_name; ?>]&nbsp;
            <a href="javascript:logOut();" >退出</a>&nbsp;&nbsp;
        </div>
    </div>
</div>
<div data-options="region:'west',split:true,title:'导航'" style="width:220px;padding:5px;">
    <ul class="easyui-tree" id="tt"></ul>
</div>
<div region="center" border="false">
    <div id="tabs-el" class="easyui-tabs" fit="true" border="false" plain="true">
        <div title="welcome" href="<?php echo for_url('admin', 'index', 'home'); ?>"></div>
    </div>
</div>
<!--<div data-options="region:'center'" style="overflow-y: hidden">
    <iframe name="right" id="rightMain" src="" frameborder="false" style="border: 0px; overflow: hidden;" scrolling="auto" width="100%" height="auto" allowtransparency="true"></iframe>
</div>-->
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
                    open1( node.text,base_url + node.attributes.url + '?' + Math.random());
                }
            }
        });

    })();

    function open1(name, plugin){
        if ($('#tabs-el').tabs('exists',name)){
            $('#tabs-el').tabs('close', name);
        }
        var Body = $(window);
        var heights = Body.height() - 100;
        $('#tabs-el').tabs('add',{
            title:name,
            content: '<iframe name="right" src="'+plugin+'" frameborder="false" style="border: 0px;" scrolling="auto" width="100%" height="'+heights+'px" allowtransparency="true"></iframe>',
            closable:true
        });
    }

    function logOut(){

        if(_confirm('确认退出？',function(){
            location.href = '<?php echo for_url('admin', 'index', 'logout')?>';
        }));
    }

    window._confirm = function(_t, _call){
        if(typeof _call != 'function'){
            _call = function(){};
        }
        art.dialog({
            title: '提示',
            content: _t,
            icon: 'question',
            cancelVal: '关闭',
            lock: true,
            ok: function () {
                _call();
            },
            cancel:function(){}
        });
    }
</script>