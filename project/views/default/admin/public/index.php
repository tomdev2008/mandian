<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php echo config_item('charset'); ?>">
    <title><?php echo config_item('site_name'); ?>--管理后台</title>
    <meta name="keywords" content="<?php echo config_item('site_keyword'); ?>" />
    <meta name="description" content="<?php echo config_item('site_description'); ?>" />

    <!-- jquery -->
    <script src="/public/resource/js/sea-modules/alias/jquery/jquery-1.8.3.min.js"></script>

    <!-- art dialog -->
    <script src="/public/resource/js/sea-modules/alias/artDialog4.1.7/jquery.artDialog.js?skin=default"></script>
    <script type="text/javascript" src="/public/resource/js/sea-modules/alias/artDialog4.1.7/plugins/iframeTools.js"></script> <!-- 对iframe的新工具 -->

    <!-- css -->
    <link href="/public/resource/css/admin.css" rel="stylesheet"/>

    <!-- easyui -->
    <link href="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/default/easyui.css" rel="stylesheet"/>
    <link href="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/icon.css" rel="stylesheet"/>
    <script src="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/jquery.easyui.min.js"></script>
    <script src="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/locale/easyui-lang-zh_CN.js"></script>

</head>
<body class="easyui-layout">
<div data-options="region:'north',border:false" style="height:74px;padding:0px">
    <div id="header">
        <div class="logo">
        </div>
        <p>
            <span>当前环境[<?php echo ENVIRONMENT; ?>]</span>
            <a href="javascript:logOut();">退出管理</a>
            <a href="<?php echo for_url('admin', 'index', 'index' ,'?pc_hash='. $pc_hash) ?>">后台首页</a>
            <a href="#" target='_blank'>站点首页</a>
            <span>您好 <label class='bold'><?php echo $user_name; ?></label>，
            当前身份 <label class='bold'><?php echo $role_name; ?></label></span>
        </p>
    </div>
</div>
<div data-options="region:'west',split:true,title:'导航'" style="width:220px;padding:5px;">
    <ul class="easyui-tree">
        <?php
            foreach($tree_list as $tree){
                $cls = empty($tree['entext']) ? 'iconCls="icon-action_check"' : 'iconCls="icon-' . $tree['entext'] .'"';
                echo '<li ',$cls,' ><span>',$tree['text'],'</span>';
                if($tree['children']){
                    echo '<ul>';
                    foreach($tree['children'] as $tree_child){
                        $cls = empty($tree_child['entext']) ? 'iconCls="icon-action_check"' : 'iconCls="icon-' . $tree_child['entext'] .'"';
                        echo '<li ',$cls,' ><a href="javascript:open1(\'',$tree_child['text'],'\',\'',$tree_child['attributes']['url'],'\')">',$tree_child['text'],'</a></li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }
        ?>
    </ul>

    <!--<ul class="easyui-tree" id="tt"></ul>-->
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

        /*$('#tt').tree({
            url:'<?php echo for_url('admin', 'index', 'get_admin_menu'); ?>',
            animate:true,
            onClick: function(node){
                if(typeof node.attributes != 'undefined')
                {
                    open1( node.text,base_url + node.attributes.url + '?' + Math.random());
                }
            },
            onLoadError: function(){
                art.dialog({
                    title: '提示',
                    content: '获取失败了，重新登录试试',
                    icon: 'error',
                    cancelVal: '关闭',
                    lock: true,
                    ok: function () {
                        location.href = '<?php echo for_url('admin', 'index', 'login'); ?>';
                    },
                    cancel:function(){}
                });
            }
        });*/

    })();

    function open1(name, plugin){
        if ($('#tabs-el').tabs('exists',name)){
            $('#tabs-el').tabs('close', name);
        }
        var Body = $(window);
        var heights = Body.height() - 110;
        $('#tabs-el').tabs('add',{
            title:name,
            content: '<iframe name="right" src="'+base_url + '/' + plugin+'" frameborder="false" style="border: 0px;" scrolling="auto" width="100%" height="'+heights+'px" allowtransparency="true"></iframe>',
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