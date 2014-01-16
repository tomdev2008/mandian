<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="<?php echo config_item('charset'); ?>">
    <title><?php echo $msg?></title>
    <meta name="keywords" content="<?php echo config_item('site_keyword'); ?>" />
    <meta name="description" content="<?php echo config_item('site_description'); ?>" />
    <style type="text/css">
        <!--
        *{ padding:0; margin:0; font-size:12px}
        body{ background-color: #ebebeb}
        a:link,a:visited{text-decoration:none;color:#0068a6}
        a:hover,a:active{color:#ff6600;text-decoration: underline}
        .showMsg{border: 1px solid #1e64c8; zoom:1; width:450px; background-color: #fff; height:172px;position:absolute;top:44%;left:50%;margin:-87px 0 0 -225px}
        .showMsg h5{background-image: url(/public/resource/images/msg.png);background-repeat: no-repeat; color:#fff; padding-left:35px; height:25px; line-height:26px;*line-height:28px; overflow:hidden; font-size:14px; text-align:left}
        .showMsg .content{ padding:46px 12px 10px 45px; font-size:14px; height:64px; text-align:left}
        .showMsg .bottom{ background:#e4ecf7; margin: 0 1px 1px 1px;line-height:26px; *line-height:30px; height:26px; text-align:center}
        .showMsg .ok,.showMsg .guery{background: url(/public/resource/images/msg_bg.png) no-repeat 0px -560px;}
        .showMsg .guery{background-position: left -460px;}
        -->
    </style>
    <!-- jquery -->
    <script src="/public/resource/js/sea-modules/alias/jquery/jquery-1.8.3.min.js"></script>
</head>
<body>
<div class="showMsg" style="text-align:center">
    <h5>提示</h5>
    <div class="content guery" style="display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline;max-width:330px"><?php echo $msg?></div>
    <div class="bottom">
        <?php if($url_forward=='goback' || $url_forward=='') {?>
            <a href="javascript:history.back();" >[点击返回]</a>
        <?php } elseif($url_forward=="close") {?>
        <input type="button" name="close" value="关闭" onClick="window.close();">
        <?php } elseif($url_forward=="blank") {?>

        <?php } elseif($url_forward) {
        //if(strpos($url_forward,'&pc_hash')===false) $url_forward .= '&pc_hash='.trim($_SESSION['pc_hash']);
        ?>
            <a href="<?php echo $url_forward?>">点击跳转</a>
            <script language="javascript">setTimeout("redirect('<?php echo $url_forward?>');",<?php echo $ms?>);</script>
        <?php }?>
        <?php if($returnjs) { ?> <script style="text/javascript"><?php echo $returnjs;?></script><?php } ?>
        <?php if ($dialog):?><script style="text/javascript">window.top.right.location.reload();window.top.art.dialog({id:"<?php echo $dialog?>"}).close();</script><?php endif;?>
    </div>
</div>
<script style="text/javascript">
    function close_dialog() {
        window.top.right.location.reload();window.top.art.dialog({id:"<?php echo $dialog?>"}).close();
    }
    function redirect(url) {
        location.href = url;
    }
</script>

</body>
</html>