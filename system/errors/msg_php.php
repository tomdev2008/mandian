<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $msg['content']; ?></title>
    <?php if($msg['auto_redirect']){ ?>
        <meta http-equiv="refresh" content="1;URL=<?php echo $msg['back_url'];?>"/>
    <?php } ?>
    <style type="text/css">
        <!--
        *{margin:0;padding:0;}
        body{color:#333;background-color:#f1f1f1; font-family: "微软雅黑",tahoma,arial,sans-serif;}
        .box404{height:200px;width:600px;border:1px solid #ccc;margin-top:40px;margin-right:auto;margin-left:auto;background-color:#FFF; box-shadow: 5px 5px 3px #e1e1e1;}
        .box404 ul{float:left;width:100%;list-style: none;}
        .box404 ul li{font-size: 14px;line-height: 20px; margin-left: 5px; padding: 3px 1px;}
        .box404 ul li.title{ display: block; font-weight: bold; font-size: 14px; line-height: 25px; height: 25px; margin-bottom:10px; margin-right: 10px; border-bottom: 1px solid #ff8400; list-style-type: none;}
        .box404 .left{float:left;width:200px;height:200px;background-image:url(/public/resource/images/sorry.gif) ;background-repeat:no-repeat;height:200px;}
        .box404 .right{float:right;width:350px;height:200px;padding-left:20px;}
        a:link {
            color: #00438a;
        }
        a:visited {
            color: #666;
        }
        a:hover {
            color: #C00;
        }
        a:active {
            color: #666;
        }
        .box_header {
            right: 0;
            left: 0;
            top: 0;
            -webkit-box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.1);
            background-image: linear-gradient(to bottom, #FFF, #F2F2F2);
            padding: 5px;
            border: 1px solid #D4D4D4;
        }
        .box_header_info{
            font-size: 12px; line-height: 20px;
            text-align: right;
            width: 1000px;
            margin: 0px auto;
        }
        .box-bottom{
            width: 600px;
            height: 30px;
            margin: 5px auto;
        }
        .box-bottom ul{ list-style: none;}
        .box-bottom li {
            display: block;
            width: 100%;
            text-align: right;
            font-size: 12px;
        }
        -->
    </style>
</head>
<body>
<div class="box_header">
    <div class="box_header_info">
        <b>秋刀鱼工作室</b>为您提供简单易用、稳定可靠的客户关系管理系统，让您更专注于您的专业领域！
    </div>
</div>
<div class="box404">
    <div class="left"></div>
    <div class="right">
        <ul>
            <li class="title"><?php echo $msg['content']; ?></li>
            <li>您可以选择以下操作：<br>
            <li>等待，约2秒钟后跳转。<br>
            <li>
                <?php
                if($msg['url_info']){
                    foreach($msg['url_info'] as $info => $url){
                        echo '<p><a href="'.$url.'">'.$info.'</a></p>';
                    }
                }
                ?>
            </li>
        </ul>
    </div>
</div>
<div class="box-bottom">
    <ul>
        <li>秋刀鱼工作室</li>
        <li>chchmlml@163.com</li>
    </ul>
</div>
</body>
</html>