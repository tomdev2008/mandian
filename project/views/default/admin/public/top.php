<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simpla Admin </title>
    <!-- jquery -->
    <script src="/public/resource/js/sea-modules/alias/jquery/jquery-1.8.3.min.js"></script>

    <!-- art dialog -->
    <script src="/public/resource/js/sea-modules/alias/artDialog4.1.7/jquery.artDialog.js?skin=default"></script>
    <script type="text/javascript" src="/public/resource/js/sea-modules/alias/artDialog4.1.7/plugins/iframeTools.js"></script> <!-- 对iframe的新工具 -->

    <style type="text/css">
        *{ margin: 0px; padding: 0px;}
    </style>
</head>

<body>
<div style="background-color:#600; width: 100%; height: 62px; color: #fff;">
    <div style="font-size: 20px; line-height: 30px; text-align: left;">后台</div>
    <div style="float: right;"><?php echo $user_name; ?>[<?php echo $user_name; ?>]<a href="javascript:logOut();" >退出</a></div>
</div>
</body>
</html>
<script>
    function logOut(){

        if(confirm('确认退出？'))
        {
            location.href = '<?php echo for_url('admin', 'index', 'logout')?>';
        }
    }
</script>