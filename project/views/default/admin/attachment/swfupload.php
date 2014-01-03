<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>swfupload</title>
    <!-- jquery -->
    <script src="/public/resource/js/sea-modules/alias/jquery/jquery-1.8.3.min.js"></script>
    <!-- easyui -->
    <link href="/public/resource/js/sea-modules/alias/jquery-easyui-1.3.4/themes/default/easyui.css" rel="stylesheet"/>
    <!-- swfupload -->
    <link href="/public/resource/js/sea-modules/alias/swfupload/css/default.css" rel="stylesheet" type="text/css"/>
    <script language="JavaScript" type="text/javascript" src="/public/resource/js/sea-modules/alias/swfupload/swfupload/swfupload.js"></script>
    <script language="JavaScript" type="text/javascript" src="/public/resource/js/sea-modules/alias/swfupload/swfupload/swfupload.queue.js"></script>
    <script language="JavaScript" type="text/javascript" src="/public/resource/js/sea-modules/alias/swfupload/js/fileprogress.js"></script>
    <script language="JavaScript" type="text/javascript" src="/public/resource/js/sea-modules/alias/swfupload/js/handlers.js"></script>
    <script type="text/javascript">
        var swfu = '';
        $(document).ready(function () {
            swfu = new SWFUpload({
                flash_url: "<?php echo base_url() ?>/public/resource/js/sea-modules/alias/swfupload/swfupload/swfupload.swf?" + Math.random(),
                upload_url: "<?php echo for_url('admin','attachment','swfupload',array(1)); ?>",
                file_post_name: "userfile",
                post_params: {"SWFUPLOADSESSID": "<?php echo session_id(); ?>", "module": "content", "catid": "8", "userid": "1", "siteid": "1", "dosubmit": "1", "thumb_width": "0", "thumb_height": "0", "watermark_enable": "0", "filetype_post": "jpg|jpeg|gif|png|bmp", "swf_auth_key": "e4619fee0c51bad913c4bb178883d841", "isadmin": "1", "groupid": "8"},
                file_size_limit: "2048",
                file_types: "*.jpg;*.jpeg;*.gif;*.png;*.bmp",
                file_types_description: "All Files",
                file_upload_limit: "1",
                custom_settings: {progressTarget: "fsUploadProgress", cancelButtonId: "btnCancel"},
                button_image_url: "",
                button_width: 75,
                button_height: 28,
                button_placeholder_id: "buttonPlaceHolder",
                button_text_style: "",
                button_text_top_padding: 3,
                button_text_left_padding: 12,
                button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
                button_cursor: SWFUpload.CURSOR.HAND,
                file_dialog_start_handler: fileDialogStart,
                file_queued_handler: fileQueued,
                file_queue_error_handler: fileQueueError,
                file_dialog_complete_handler: fileDialogComplete,
                upload_progress_handler: uploadProgress,
                upload_error_handler: uploadError,
                upload_success_handler: uploadSuccess,
                upload_complete_handler: uploadComplete
            });
        })
    </script>
    <style type="text/css">
        body {
            padding: 10px;
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
    </style>
</head>

<body>

<div style="width:500px;height:460px" class="tabs-container">
    <div class="tabs-header" style="width: 498px;">
        <div class="tabs-scroller-left" style="display: none;"></div>
        <div class="tabs-scroller-right" style="display: none;"></div>
        <div class="tabs-wrap" style="margin-left: 0px; margin-right: 0px; width: 498px;">
            <ul class="tabs" style="height: 26px;">
                <li class="tabs-selected">
                    <a class="tabs-inner" href="<?php echo for_url('admin', 'attachment', 'swfupload'); ?>"  style="height: 25px; line-height: 25px;">
                        <span class="tabs-title">上传附件</span>
                    </a>
                </li>
                <li class="">
                    <a class="tabs-inner" href="<?php echo for_url('admin', 'attachment', 'db_list'); ?>"  style="height: 25px; line-height: 25px;">
                        <span class="tabs-title">图库</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tabs-panels" style="height: 429px; width: 498px;">
        <div class="panel" style="display: block; width: 498px;">
            <div title="" class="panel-body panel-body-noheader panel-body-noborder"
                 style="width: 498px; height: 429px;">
                <div class="tab-content">
                    <div class="demo-info">
                        最多上传 1 个附件,单文件最大 2 MB ；支持 jpg、jpeg、gif、png、bmp 格式。
                    </div>
                    <div class="tab-content-title op">
                        <div class="btnaddnew" id="addnew">
                            <span id="buttonPlaceHolder"></span>
                        </div>
                        <input type="button" value="开始上传" class="btn" onclick="swfu.startUpload();">
                    </div>
                    <div class="tab-content-title">
                        <fieldset id="swfupload">
                            <legend>列表</legend>
                            <ul id="fsUploadProgress" class="attachment-list">
                            </ul>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel" style="display: none;">
            <div style="padding:10px" title="" class="panel-body panel-body-noheader panel-body-noborder" id="">
            </div>
        </div>
    </div>
</div>


</body>
</html>