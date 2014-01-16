
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="<?php echo base_url(); ?>public/resource/" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/admin.css" rel="stylesheet"/>
    <title>旅行</title>
    <style type="text/css">

        /* login style start */
        body#login,body#login #footer{background:#ebebeb url(images/login_bg.gif) 0 0 repeat-x;}
        body#login{background-position:0 36px;}
        .login_box,.login_title,.login_cont input.normal,.login_cont input.submit,.login_cont a.pwd{background:#fff url(images/loginbox_bg.gif) no-repeat}
        .login_box{position:absolute;top: 50%;left:50%;width:334px;height:220px;margin: -132px 0 0 -167px;padding-bottom:30px;background-position:0 -15px;_background:none;}
        .login_title{height:37px;padding-left:35px;color:#fff;text-align:left;font:bold 14px/37px Arial, Helvetica, sans-serif;}
        .login_cont{height:152px;padding-top:30px;border:1px solid #b8b7b7;background:#fff}
        .login_cont input.normal{width:175px;height:22px;padding:0 3px;border:1px solid #ccc;background-position:0 -66px;}
        .login_cont .form_table th{font-size:14px; background:none}
        .login_cont input.submit{width:82px;height:29px;margin:10px 14px 0 0;background-position:0 -37px;}
        .login_cont a.pwd{padding-right:11px;color:#5d5d5d;background-position:right -111px;}
        body#login #footer{position:absolute;left:0;bottom:0;width:100%;height:36px; line-height:36px;text-align:center; color:#fff}
        /* login style end */
        input.submit, .login_cont a.pwd {
            background: #FFF url(images/loginbox_bg.gif) no-repeat;
        }
        .submit {
            margin: 10px 10px 10px 0;
            border: 1px #E35C00 solid;
            font-weight: bold;
            color: #FFF;
            cursor: pointer;
            background: url(images/admin_bg.gif) 0 -271px repeat-x;
        }
        .verify_image{ float: right; margin-right: 70px; cursor: pointer}
    </style>
    <!-- jquery -->
    <script src="/public/resource/js/sea-modules/alias/jquery/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.verify_image').click(function(){
                $(this).attr('src', '<?php echo for_url('admin', 'index', 'verify_image') ?>?_=' + Math.random());
            });
        })
    </script>
</head>
<body id="login">
<div class="container">
    <div id="header">
        <div class="logo">
        </div>
    </div>
    <div id="wrapper" class="clearfix">
        <div class="login_box">
            <div class="login_title">管理登录</div>
            <div class="login_cont">
                <b style="color:red"></b>

                <form action="<?php echo for_url('admin', 'index', 'login_act'); ?>" method="post">
                    <div style="display:none">
                        <input type="hidden" name="dilicms_csrf_token" value="a41917424569e02e36c3ed735af94e1a"/>
                    </div>
                    <table class="form_table">
                        <col width="90px"/>
                        <col/>
                        <tr>
                            <th>用户名：</th>
                            <td><input class="normal" type="text" name="user_name" alt="请填写用户名"/></td>
                        </tr>
                        <tr>
                            <th>密码：</th>
                            <td><input class="normal" type="password" name="password" alt="请填写密码"/></td>
                        </tr>
                        <tr>
                            <th>验证码：</th>
                            <td>
                                <input class="normal" type="text" name="verify_code" style="width: 50px;" alt="请填写验证码"/>
                                <img class="verify_image" src="<?php echo for_url('admin', 'index', 'verify_image') ?>" alt="点击刷新验证码" title="点击刷新验证码">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="submit" type="submit" value="登录"/>
                                <input class="submit" type="reset" value="取消"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
