define("projects/1.0.0/user", [], function (require) {

    return {

        'roleList': function (el) {
            var _h = $(window).height() - 145;
            $(el).datagrid({
                url: crm_base_url + '/system/user/role_list_json',
                height: _h,
                width: 'auto',
                columns: [
                    [
                        //{field: 'user_id', title: 'ID', width: 100},
                        {field: 'role_name', title: '用户名', width: 100},
                        {field: 'enabled', title: '状态', width: 100, formatter: function (v, d, i) {
                            return (v == 1) ? '<font style="color:green;">√</font>' : '<font style="color:red;">×</font>';
                        }},
                        {field: 'rights_per', title: '权限级别', width: 100, formatter: function (v, d, i) {
                            return '<div style="height: 18px; width: '+v+'%; background-color:#3A6EA5; font-weight:bold; color:white">&nbsp;'+v+'%</div>';
                        }},
                        {field: 'op', title: '操作', width: 100, align: 'center', formatter: function (v, d, i) {
                            var op = '';
                            op += '[<a href="javascript:if(confirm(\'确定要删除吗？\')) { location.href = \''+ crm_base_url + 'system/user/role_del/'+ d.role_id+'\'; }">删除</a>]&nbsp;';
                            op += '[<a href="'+ crm_base_url + 'system/user/role_edit/'+ d.role_id+'">编辑</a>]';
                            op += '[<a href="'+ crm_base_url + 'system/system/role_access/'+ d.role_id+'">权限管理</a>]';
                            return op;
                        }}
                    ]
                ],
                autoRowHeight: true,
                loadMsg:'加载中……',
                striped: true,
                fitColumns: true,
                nowrap: false,
                singleSelect: true,
                rownumbers: true,
                pagination: true,
                showFooter: true,
                //pageList: [50],
                toolbar: [
                    {
                        text: '添加新角色',
                        iconCls: 'icon-add',
                        handler: function () {
                            window.location.href = crm_base_url + '/system/user/role_add';
                        }
                    }
                ],
                onDblClickRow:function(i,d){
                    window.location.href = crm_base_url + 'system/user/role_edit/'+ d.role_id;
                },
                onLoadError: function(){
                    $.messager.confirm('提示', '获取失败，请重新登陆试试', function(r){
                        if (r){
                            window.location.href = crm_base_url + 'system/welcome/login';
                        }
                    });
                }
            });
        },

        'list': function (el) {
            var _h = $(window).height() - 145;
            $(el).datagrid({
                url: crm_base_url + '/system/user/user_list_json',
                height: _h,
                width: 'auto',
                columns: [
                    [
                        //{field: 'user_id', title: 'ID', width: 100},
                        {field: 'user_name', title: '用户名', width: 80},
                        {field: 'role_name', title: '角色', width: 80},
                        {field: 'email', title: 'E-mail', width: 100},
                        {field: 'reg_time', title: '注册时间', width: 100},
                        {field: 'last_time', title: '上次登录时间', width: 100},
                        {field: 'last_ip', title: '上次登录IP', width: 60},
                        {field: 'visit_count', title: '登陆次数', width: 30},
                        {field: 'enabled', title: '状态', width: 40, formatter: function (v, d, i) {
                            return (v == 1) ? '<font style="color:green;">√</font>' : '<font style="color:red;">×</font>';
                        }},
                        {field: 'op', title: '操作', width: 100, align: 'center', formatter: function (v, d, i) {
                            var op = '';
                            op += '[<a href="javascript:if(confirm(\'确定要删除吗？\')) { location.href = \''+ crm_base_url + 'system/user/user_del/'+ d.user_id+'\'; }">删除</a>]&nbsp;';
                            op += '[<a href="'+ crm_base_url + 'system/user/user_edit/'+ d.user_id+'">编辑</a>]';
                            op += '[<a href="'+ crm_base_url + 'system/system/system_role/'+ d.user_id+'">角色关联</a>]';
                            return op;
                        }}
                    ]
                ],
                autoRowHeight: true,
                loadMsg:'加载中……',
                striped: true,
                fitColumns: true,
                nowrap: false,
                singleSelect: true,
                rownumbers: true,
                pagination: true,
                showFooter: true,
                //pageList: [50],
                toolbar: [
                    {
                        text: '添加新用户',
                        iconCls: 'icon-add',
                        handler: function () {
                            window.location.href = crm_base_url + '/system/user/user_add';
                        }
                    }
                ],
                onDblClickRow:function(i,d){
                    window.location.href = crm_base_url + 'system/user/user_edit/'+ d.user_id;
                },
                onLoadError: function(){
                    $.messager.confirm('提示', '获取失败，请重新登陆试试', function(r){
                        if (r){
                            window.location.href = crm_base_url + 'system/welcome/login';
                        }
                    });
                }
            });
        }
    };

});
