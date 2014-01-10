

<body>
    <!--查询表单-->
    <table width="100%" cellspacing="0" class="search-form">
        <tbody>
        <tr>
            <td>
                <div class="explain-col">
                    <input onclick="location.href = '<?php echo for_url('admin','system','system_add')?>';" type="submit" value="添加系统模块" class="button" name="search">
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <!--/查询表单-->

    <!--列表-->
    <table id="tg">
    </table>
    <!--/列表-->
</body>
<script type="text/javascript">
    $(function(){
        $('#tg').treegrid({
            url: '<?php echo for_url('admin','system','system_list_json'); ?>',
            height: ( $(window).height() - 60),
            width: 'auto',
            idField:'sys_id',
            treeField:'sys_name',
            rownumbers: true,
            animate: true,
            collapsible: true,
            columns: [
                [
                    //{field: 'user_id', title: 'ID', width: 100},
                    {field: 'sys_name', title: '模块名称', width: 200},
                    {field: 'sys_module', title: '类名', width: 100},
                    {field: 'sys_controller', title: '控制器', width: 100},
                    {field: 'sys_action', title: '响应', width: 100},
                    {field: 'sys_order_id', title: '排序', width: 40},
                    {field: 'enabled', title: '状态', width: 30, formatter: function (v, d, i) {
                        return (v == 1) ? '<font style="color:green;">√</font>' : '<font style="color:red;">×</font>';
                    }},
                    {field: 'visiabled', title: '可视', width: 30, formatter: function (v, d, i) {
                        return (v == 1) ? '<font style="color:green;">√</font>' : '<font style="color:red;">×</font>';
                    }},
                    {field: 'op', title: '操作', width: 100, align: 'center', formatter: function (v, d, i) {
                        var op = '';
                        op += '[<a href="javascript:_del('+ d.sys_id+');">删除</a>]&nbsp;';
                        op += '[<a href="'+ crm_base_url + 'admin/system/system_edit/'+ d.sys_id+'">编辑</a>]';
                        return op;
                    }}
                ]
            ],
            autoRowHeight: true,
            loadMsg:'加载中……',
            striped: true,
            fitColumns: true,
            nowrap: false,
            onDblClickRow:function(i,d){
                window.location.href = crm_base_url + '/admin/system/system_edit/'+ d.user_id;
            },
            onLoadError: function(){
                $.messager.confirm('提示', '获取失败，请重新登陆试试', function(r){
                    if (r){
                        window.location.href = crm_base_url + 'admin/index/login';
                    }
                });
            }
        });
    });
    function _del(id){
        _confirm('确认删除？',function(){location.href = '<?php echo for_url('admin','system','system_del') ;?>'+id;});
    }
</script>

