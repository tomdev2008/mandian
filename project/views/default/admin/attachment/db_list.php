<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>swfupload</title>
    <!-- jquery -->
    <script src="/public/resource/js/sea-modules/alias/jquery/jquery-1.8.3.min.js"></script>
    <!-- easyui -->
    <link href="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/default/easyui.css" rel="stylesheet"/>

    <script charset="utf-8" type="text/javascript" src="/public/resource/js/sea-modules/seajs/seajs/2.1.1/sea.js" id="seajsnode"></script>
    <style type="text/css">
        body {
            padding: 0px;
        margin: 0px;
            width: 500px;
            height: 460px;
            overflow: hidden;
        }
        .tab-content {
            width: 460px;
            margin: 10px;
        }
        .tab-content-title {
            padding: 5px;
        }
        .demo-info {
            background: none repeat scroll 0 0 #FFFEE6;
            color: #8F5700;
            padding: 12px;
        }
        fieldset {
            border: 1px solid #DCE3ED;
        }
        fieldset legend {
            background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
            border: medium none;
            color: #347ADD;
            font-weight: 700;
            padding: 3px 8px;
        }
        .op {
            height: 30px;
        }
        .btnaddnew {
            background: url("/public/resource/images/swfBnt.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
            color: #FFFFFF;
            float: left;
            font-weight: 700;
            height: 28px;
            line-height: 28px;
            margin-right: 10px;
            width: 75px;
            cursor: pointer;
            border: 0px;
            background-position: left bottom;
        }
        .btn {
            background: url("/public/resource/images/swfBnt.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
            color: #FFFFFF;
            float: left;
            font-weight: 700;
            height: 28px;
            line-height: 28px;
            margin-right: 10px;
            width: 75px;
            cursor: pointer;
            border: 0px;
        }
        .attachment-list {
            overflow: hidden;
        }
        .attachment-list li {
            float: left;
            overflow: hidden;
            padding: 10px 0;
            margin: 0px 10px;;
            width: 25%;
        }
        .attachment-list .img-wrap {
            background: none repeat scroll 0 0 #FFFFFF;
            border: medium none;
            overflow: hidden;
            position: relative;
            text-align: center;
        }
        .attachment-list .img-wrap {
            height: 94px;
            margin: auto;
            overflow: hidden;
            width: 104px;
        }

        .attachment-list .img-wrap a:hover, .attachment-list .img-wrap a.on {
            background: none repeat scroll 0 0 #F3F6FA;
            border-color: #D0DEF1;
        }
        .attachment-list .img-wrap a {
            border: 1px solid #EEEEEE;
            display: table-cell;
            height: 91px;
            text-align: center;
            vertical-align: middle;
            width: 101px;
        }
        .attachment-list .img-wrap a.on .icon {
            background: url("/public/resource/images/msg_bg.png") no-repeat scroll left -249px rgba(0, 0, 0, 0);
            bottom: 4px;
            height: 18px;
            overflow: hidden;
            position: absolute;
            right: 3px;
            width: 16px;
            z-index: 100;
        }
        .attachment-list .img-wrap a.off .icon {
            background: url("/public/resource/images/off.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
            bottom: 5px;
            height: 17px;
            overflow: hidden;
            position: absolute;
            right: 3px;
            width: 98px;
            z-index: 100;
        }

        /*------------------分页-----------------*/
        .pagination {
            text-align: right;
            padding: 20px 0 5px 0;
            font-family:  "微软雅黑",Arial;
            font-size: 12px;
        }
        .pagination a{
            margin: 0 5px 0 0;
            padding: 3px 6px;
            font-size: 12px;
        }

        .pagination a.number {
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            font-size: 12px;
        }
        .pagination a.number {
            border: 1px solid #DDD;
            font-size: 12px;
        }
        .pagination a.current {
            background: #5A85B2;
            border-color: #459300 !important;
            color: #FFF !important;
            font-size: 12px;
        }
    </style>
</head>

<body>

<div style="width:500px;height:460px" class="tabs-container">
    <div class="tabs-header" style="width: 498px;">
        <div class="tabs-scroller-left" style="display: none;"></div>
        <div class="tabs-scroller-right" style="display: none;"></div>
        <div class="tabs-wrap" style="margin-left: 0px; margin-right: 0px; width: 498px;">
            <ul class="tabs" style="height: 26px;">
                <li class="">
                    <a class="tabs-inner" href="<?php echo for_url('admin', 'attachment', 'swfupload'); ?>"  style="height: 25px; line-height: 25px;">
                        <span class="tabs-title">上传附件</span>
                    </a>
                </li>
                <li class="tabs-selected">
                    <a class="tabs-inner" href="<?php echo for_url('admin', 'attachment', 'db_list'); ?>"  style="height: 25px; line-height: 25px;">
                        <span class="tabs-title">图库</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tabs-panels" style="height: 429px; width: 498px;">
        <div class="panel" style="display: none;">

        </div>
        <div class="panel" style="display: block; width: 498px;">
            <div style="padding:10px" title="" class="panel-body panel-body-noheader panel-body-noborder" id="">
                <div title="" class="panel-body panel-body-noheader panel-body-noborder" style="width: 498px; height: 429px;">
                        <div class="tab-content-title">
                            <fieldset id="swfupload">
                                <legend>列表</legend>
                                <ul id="fsUploadProgress" class="attachment-list">
                                    <?php
                                        foreach($rows as $val){
                                            echo '<li><div class="img-wrap" id=""><a class="off"  name="img-handle" href="javascript:;">
                                            <div class="icon"></div><img width="80"  data="',$val['attachment_id'],'" title="',$val['img_url'],'" src="',img_url($val['img_url'],$val['upload_time']),'"></a></div></li>';
                                        }
                                    ?>
                                </ul>
                            </fieldset>
                        </div>
                        <div class="tab-content-title">
                            <div class="pagination" id="seaPager">
                                <script type="text/javascript">
                                    seajs.config({
                                        base: "<?php echo base_url(); ?>public/resource/js/sea-modules/",
                                        alias: {
                                            "pager": "alias/pager/pager"
                                        }
                                    });
                                    var _pg = null;
                                    seajs.use(["pager"], function(pager){
                                        _pg = pager;
                                        _pg.pageCount = <?php echo $total; ?>; //定义总页数(必要)
                                        _pg.argName = 'p';    //定义参数名(可选,缺省为page)
                                        _pg.printHtml('seaPager');        //显示页数
                                    });
                                </script>
                            </div>
                        </div>
                    <div class="tab-content-title">
                        <input type="button" value="确定" id="selectBtn" />
                        <input type="button" value="取消" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="att-status"></div>
</body>
</html>
<script>
    $(function(){
        $('#selectBtn').click(function(){
            var d = $('#att-status').text();
            window.opener.submit_ckeditor(d);
            window.close();
        });

        $('a[name=img-handle]').live(
            {
                'click': function(){
                    var _this = $(this);
                    _this.toggleClass('off');
                    _this.toggleClass('on');
                    var img = $('a[name=img-handle][class=on]').find('img');
                    var ids = '';
                    img.each(function(){
                        ids += $(this).attr('data')+'|';
                    });
                    $('#att-status').text(ids)
                }
            }
        );
    })
</script>