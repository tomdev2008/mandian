
<body>
    <!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>修改用户信息</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <!--表格-->
        <table width="100%" class="table-form contentWrap">
            <form name="form1" id="form1" action="<?php echo for_url('admin','user','user_save'); ?>"  method="post">
                <tbody>
                <tr>
                    <td width="80">用户名</td>
                    <td width="260"><input type="text" value="<?php echo $data['user_name'] ?>" size="30" class="input-text" id="user_name" name="user[user_name]"></td>
                    <td><div id="user_nameTip" class="input-tip"></div></td>
                </tr>
                <tr>
                    <td width="80">密码</td>
                    <td width="260"><input type="password" value="" size="30" class="input-text" id="pwd" name="user[password]"></td>
                    <td><div id="pwdTip" class="input-tip"></div></td>
                </tr>
                <tr>
                    <td width="80">E-mail</td>
                    <td width="260"><input type="text" value="<?php echo $data['email'] ?>" size="30" id="email" class="input-text" name="user[email]"></td>
                    <td><div id="emailTip" class="input-tip"></div></td>
                </tr>
                <tr>
                    <td>注册状态</td>
                    <td width="260">
                        <select name="user[enabled]"  id="enabled">
                            <?php if($data['enabled']){ ?>
                                <option selected value="1">是</option>
                                <option value="0">否</option>
                            <?php }else{ ?>
                                <option value="1">是</option>
                                <option selected value="0">否</option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><div id="enabledTip" class="input-tip"></div></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" id="btn" class="button" value="提交">
                        <input type="hidden" name="user[user_id]" value="<?php echo $data['user_id'] ?>">
                    </td>
                </tr>
                </tbody>
            </form>
            <div id="output"></div>
        </table>
        <!--/表格-->

    </div>
    <!--/内容-->
</div>
<!--/内容区-->
</body>
<!-- formValidator-4.1.0.js -->
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidator-4.1.0.js" type="text/javascript" charset="UTF-8"></script>
<script src="/public/resource/js/sea-modules/alias/formValidator4.1.0/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){
        $.formValidator.initConfig({formID:"form1",theme:'ArrowSolidBox',mode:'AutoTip',onError:function(msg){
            _alert(msg,'error')
        },inIframe:true});

        $("#user_name").formValidator({onShow:"请输入用户名",onFocus:"用户名不能为空",onCorrect:""}).inputValidator({min:1,onError:"用户名不能为空,请确认"});
        $("#pwd").formValidator({onShow:"请输入密码",onFocus:"密码不能为空",onCorrect:"密码合法"}).inputValidator({min:1,onError:"密码不能为空,请确认"}).defaultPassed();
        //$("#pwd2").formValidator({onShow:"请输入重复密码",onFocus:"两次密码必须一致",onCorrect:""}).inputValidator({min:1,onError:"重复密码不能为空,请确认"}).compareValidator({desid:"pwd",operateor:"=",onError:"2次密码不一致,请确认"}).defaultPassed();
        $("#email").formValidator({onShow:"请输入邮箱",onFocus:"邮箱至少6个字符,最多100个字符",onCorrect:""}).inputValidator({min:6,max:100,onError:"你输入的邮箱长度非法,请确认"}).regexValidator({regExp:"^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$",onError:"你输入的邮箱格式不正确"}).defaultPassed();
        //$("#enabled").formValidator({onShow:"请选择激活状态",onFocus:"激活状态必须选择",onCorrect:"",defaultValue:"1"}).inputValidator({min:1,onError: "忘记选择激活状态了!"}).defaultPassed();

        $.formValidator.reloadAutoTip();
    });
</script>


