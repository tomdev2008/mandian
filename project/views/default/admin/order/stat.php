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
                    <select>
                        <option value="custom">自定义</option>
                        <option value="prevfy">上财年</option>
                        <option value="thisfy">本财年</option>
                        <option value="nextfy">下财年</option>
                        <option value="prevfq">上季度</option>
                        <option value="thisfq">本季度</option>
                        <option value="nextfq">下季度</option>
                        <option value="yesterday">昨天</option>
                        <option value="today">今天</option>
                        <option value="tomorrow">明天</option>
                        <option value="lastweek">上星期</option>
                        <option value="thisweek">本星期</option>
                        <option value="nextweek">下星期</option>
                        <option value="lastmonth">上月</option>
                        <option value="thismonth">本月</option>
                        <option value="nextmonth">下月</option>
                        <option value="last7days">前7天</option>
                        <option value="last30days">前30天</option>
                        <option value="last60days">前60天</option>
                        <option value="last90days">前90天</option>
                        <option value="last120days">前120天</option>
                        <option value="next7days">后7天</option>
                        <option value="next30days">后30天</option>
                        <option value="next60days">后60天</option>
                        <option value="next90days">后90天</option>
                        <option value="next120days">后120天</option>
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
    $(function () {
        var chart;
        $(document).ready(function() {
            chart = new Highcharts.Chart();

    });
</script>