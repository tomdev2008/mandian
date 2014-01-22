<style type="text/css">
    .labelspan{ margin: 2px 5px; display: inline-block;}
    .labelspan input{ margin: 0px 3px;}
</style>
<body>
    <!--内容区-->
    <!--查询表单-->
    <form name="frm" id="form1"   method="post">
        <table width="100%" cellspacing="0" class="search-form">
            <tbody>
            <tr>
                <td>
                    <div class="explain-col">
                        <select id="select-time">
                            <option value="0">--快速设置--</option>
                            <option value="prevfy">上财年</option>
                            <option value="thisfy">本财年</option>
                            <option value="prevfq">上季度</option>
                            <option value="thisfq">本季度</option>

                        </select>
                        <input type="text" size="8" id="start_time" name="start_date"  onfocus="WdatePicker()" class="input-text">-
                        <input type="text" size="8" id="end_time" name="end_date"  onfocus="WdatePicker()" class="input-text">
                        &nbsp;
                        分组：
                        <select id="xtype" name="xtype">
                            <option value="m" selected>月</option>
                            <option value="d">日</option>
                        </select>
                        <input type="button" id="btn" class="btn btn-success" value="生成报表">
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        </form>
    <!--/查询表单-->
    <div id="container1" style="width: 100%; height: 260px;"></div>
    <div id="container2" style="width: 100%; height: 260px;"></div>
    <div id="container3" style="width: 100%; height: 260px;"></div>
</div>
</body>
<!--/内容区-->

<script src="/public/resource/js/sea-modules/alias/jqPlot/js/jquery.1.7.1.js"></script>

<!-- easyui -->
<link href="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/default/easyui.css" rel="stylesheet"/>
<link href="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/icon.css" rel="stylesheet"/>
<script src="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/jquery.easyui.min.js"></script>
<script src="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/locale/easyui-lang-zh_CN.js"></script>

<script src="/public/resource/js/sea-modules/alias/jqPlot/js/highcharts.js"></script>
<script src="/public/resource/js/sea-modules/alias/jqPlot/js/modules/exporting.js"></script>
<!-- My97DatePicker -->
<script language="JavaScript" type="text/javascript" src="/public/resource/js/sea-modules/alias/My97DatePicker/WdatePicker.js" charset="UTF-8"></script>
<script type="text/javascript">
    var opt = {
        chart: {
            renderTo: 'container'
        },
        title: {
            text: '订单基本报表'
        },
        tooltip: {
            formatter: function() {
                var s = '';
                if (this.series.name) { // the pie chart
                    s = '['+ this.series.name +']: '+ this.y + '/'+ this.x;
                }
                return s;
            }
        }
    };

    $(function () {
        $('#btn').click(function(){
            var win = $.messager.progress({
                title:'提示',
                msg:'数据加载中...'
            });
            var starDate = $('#start_time').val();
            var endDate = $('#end_time').val();
            var xtype = $('#xtype').val();
            if(starDate == '' || endDate == '' || xtype ==''){
                return;
            }
            $.ajax({
                url: '<?php echo for_url('admin', 'order', 'stat_get') ?>',
                type: 'post',
                data: $('#form1').serialize(),
                dataType: 'json',
                success: function (data) {
                    opt.xAxis = data.xAxis;

                    opt.series = data.series1;
                    opt.chart.renderTo = 'container1';
                    new Highcharts.Chart(opt);

                    opt.series = data.series2;
                    opt.chart.renderTo = 'container2';
                    new Highcharts.Chart(opt);

                    opt.series = data.series3;
                    opt.chart.renderTo = 'container3';
                    new Highcharts.Chart(opt);

                    $.messager.progress('close');
                },
                error: function () {
                    alert('出错了');
                }
            });
        });


        $('#select-time').change(function(){
            var _t = $(this).val();
            var starDate = '';
            var endDate = '';
            switch(_t){
                case 'prevfy'://上财年
                    var year = (new Date()).getFullYear()-1;
                    starDate = year + '-01-01';
                    endDate = year + '-12-31';
                    break;
                case 'thisfy'://本财年
                    var year = (new Date()).getFullYear();
                    starDate = year + '-01-01';
                    endDate = year + '-12-31';
                    break;
                    break;
                case 'prevfq'://上季度
                    <?php  $season = ceil((date('n'))/3);//当月是第几季度 ?>
                    starDate = '<?= date('Y-m-d', mktime(0, 0, 0,$season*3-3+1,1,date('Y')))?>';
                    endDate = '<?= date('Y-m-d', mktime(23,59,59,$season*3,date('t',mktime(0, 0 , 0,$season*3,1,date("Y"))),date('Y')))?>';
                    break;
                case 'thisfq'://本季度
                    <?php  $season = ceil((date('n'))/3);//当月是第几季度 ?>
                    starDate = '<?= date('Y-m-d H:i:s', mktime(0, 0, 0,$season*3-3+1,1,date('Y')))?>';
                    endDate = '<?= date('Y-m-d H:i:s', mktime(23,59,59,$season*3,date('t',mktime(0, 0 , 0,$season*3,1,date("Y"))),date('Y')))?>';
                    break;
            }
            $('#start_time').val(starDate);
            $('#end_time').val(endDate);
        })
    });
</script>