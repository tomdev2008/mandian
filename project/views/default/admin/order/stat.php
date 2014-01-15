<style type="text/css">
    .labelspan{ margin: 2px 5px; display: inline-block;}
    .labelspan input{ margin: 0px 3px;}
</style>
<body>
    <!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>修改酒店信息</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <!--表格-->
        <table width="100%" class="table-form contentWrap">
            <tbody>
            <tr>
                <td width="80">时间</td>
                <td>
                    <select id="select-time">
                        <option value="0">--请选择--</option>
                        <option value="prevfy">上财年</option>
                        <option value="thisfy">本财年</option>
                        <option value="nextfy">下财年</option>
                        <option value="prevfq">上季度</option>
                        <option value="thisfq">本季度</option>
                        <option value="nextfq">下季度</option>
                    </select>
                    <input type="text" size="8" id="start_time"  onfocus="WdatePicker({dateFmt:'yyyy-mm-dd'})" class="input-text">-
                    <input type="text" size="8" id="end_time"  onfocus="WdatePicker({dateFmt:'yyyy-mm-dd'})" class="input-text">

                </td width="420">
                <td width="80">订单状态</td>
                <td width="420">
                    <select id="order_state">
                        <option value="0">全部</option>
                        <option value="1">未支付</option>
                        <option value="2">未付款，已确认</option>
                        <option value="3">已支付已预定</option>
                        <option value="4">交易成功</option>
                        <option value="5">交易关闭</option>
                        <option value="6">退款中</option>
                        <option value="7">付款超时</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <input type="button" id="btn" class="button" value="生成报表">
                </td>
            </tr>
            </tbody>
        </table>
        <!--/表格-->

        <div id="container" style="width: 100%; height: 400px;"></div>
    </div>
    <!--/内容-->
</div>
</body>
<!--/内容区-->

<script src="/public/resource/js/sea-modules/alias/jqPlot/js/jquery.1.7.1.js"></script>
<script src="/public/resource/js/sea-modules/alias/jqPlot/js/highcharts.js"></script>
<script src="/public/resource/js/sea-modules/alias/jqPlot/js/modules/exporting.js"></script>
<!-- My97DatePicker -->
<script language="JavaScript" type="text/javascript" src="/public/resource/js/sea-modules/alias/My97DatePicker/WdatePicker.js" charset="UTF-8"></script>
<script type="text/javascript">
    var opt = {
        chart: {
            renderTo: 'container',
            type: 'column'
        },
        title: {
            text: '常用报表'
        },
        subtitle: {
            text: null
        },
        yAxis: {
            min: 0,
            title: {
                text: '收入 (元)'
            }
        },
        legend: {
            layout: 'vertical',
            backgroundColor: '#FFFFFF',
            align: 'left',
            verticalAlign: 'top',
            floating: true,
            shadow: true
        },
        tooltip: {
            formatter: function() {
                return  this.x +': ￥'+ this.y;
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        }
    };

    $(function () {
        $('#btn').click(function(){
            var starDate = $('#start_time').val();
            var endDate = $('#end_time').val();
            var t = $('#order_state').val();

            if(starDate == '' || endDate == ''){
                return;
            }
            $.ajax({
                url: '<?php echo for_url('admin', 'order', 'stat_get') ?>',
                type: 'post',
                data: 'start_date=' + starDate + '&end_date=' + endDate + '&order_state=' + t,
                dataType: 'json',
                success: function (data) {
                    console.log(data)
                    opt.xAxis = data.xAxis;
                    opt.series = data.series;
                    chart = new Highcharts.Chart(opt);
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
                case 'nextfy'://下财年
                    var year = (new Date()).getFullYear()+1;
                    starDate = year + '-01-01';
                    endDate = year + '-12-31';
                    break;
                case 'prevfq'://上季度
                    break;
                case 'thisfq'://本季度
                    break;
                case 'nextfq'://下季度
                    break;
            }
            $('#start_time').val(starDate);
            $('#end_time').val(endDate);
        })
    });
</script>