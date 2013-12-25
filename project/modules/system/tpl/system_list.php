<!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>系统模块列表</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <!--表格-->
        <table id="user-list"></table>
        <!--/表格-->
    </div>
    <!--/内容-->
</div>
<!--/内容区-->
<script>
    seajs.use('projects/1.0.0/system', function(user) {
        user.list('#user-list');
    });
</script>
