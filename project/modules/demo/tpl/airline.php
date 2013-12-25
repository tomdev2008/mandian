<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="/resource/js/jquery-easyui-1.3.4/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="/resource/js/jquery-easyui-1.3.4/themes/icon.css">
    <script type="text/javascript" src="/resource/js/jquery-easyui-1.3.4/jquery.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="/resource/js/jquery-easyui-1.3.4/jquery.easyui.min.js" charset="utf-8"></script>
    <script type="text/javascript">
        $(function(){
            $('#citys').datagrid({
                rownumbers: true,
                url:'/demo/airline/get_lines',
                height: 450,
                width: 800,
                fitColumns: true,
                pagination: true,
                pageSize: 15,
                pageList:[15,50,100],
                columns:[[
                    {field:'Airline',title:'航班信息',width:100,formatter: function(value,row,index){
                        return row.Airline + ' ' + row.PlaneType;
                    }},
                    {field:'PlaneType',title:'机型',width:100},
                    {field:'dCity',title:'起飞城市',width:100},
                    {field:'DepartureTime',title:'起飞时间',width:200},
                    {field:'aCity',title:'地达城市',width:100},
                    {field:'ArrivalTime',title:'抵达时间',width:200},
                    {field:'AirportTax',title:'机建/燃油',width:100,formatter: function(value,row,index){
                        return row.AirportTax + '/' + row.FuelTax;
                    }}
                ]]
            });
        })
    </script>
</head>

<body>
<div id="w" class="easyui-window" title="Modal Window" data-options="modal:true,iconCls:'icon-save'" style="width:840px;height:500px;padding: 10px 0px 0px 10px;">
    <table id="citys"></table>
</div>

</body>
</html>