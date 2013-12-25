<div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
    <div class="clear"></div>
    <!-- End .content-box -->
    <div class="content-box">
        <!-- Start Content Box -->
        <div class="content-box-header">
            <h3>表单</h3>

            <div class="clear"></div>
        </div>
        <!-- End .content-box-header -->

        <div class="content-box-content">
            <div class="tab-content">
                <form name="form1" id="form1" action="/system/user/user_save" method="post">
                    <fieldset>
                        <p>
                            <label>用户名</label>
                            <input type="text" value="<?php echo $data['user_name'] ?>" size="30" class="text-input small-input" id="user_name" name="user[user_name]">
                            <div id="user_nameTip" class="input-tip"></div>
                        </p>

                        <?php if (empty($data['user_id'])) { ?>
                            <p>
                                <label>密码</label>
                                <input type="text" value="<?php echo $data['password'] ?>" size="30" class="text-input small-input" id="pwd" name="user[password]">
                                <div id="pwdTip" class="input-tip"></div>
                            </p>
                        <?php } ?>
                        <p>
                            <label>E-mail</label>
                            <input type="text" value="<?php echo $data['email'] ?>" size="30" id="email" class="text-input small-input" name="user[email]">
                            <div id="emailTip" class="input-tip"></div>
                        </p>
                        <p>
                            <label>注册状态</label>
                            <select name="user[enabled]" id="enabled">
                                <?php if ($data['enabled']) { ?>
                                    <option selected value="1">是</option>
                                    <option value="0">否</option>
                                <?php } else { ?>
                                    <option value="1">是</option>
                                    <option selected value="0">否</option>
                                <?php } ?>
                            </select>
                        </p>
                        <p>
                            <input class="button" type="submit" value="保存"/>
                            <input type="hidden" name="user[user_id]" value="<?php echo $data['user_id'] ?>">
                        </p>
                    </fieldset>
                    <div class="clear"></div>
                    <!-- End .clear -->
                </form>
            </div>
            <!-- End #tab2 -->
        </div>
        <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
</div>
<!-- End #main-content -->

<script src="/resource/js/sea-modules/alias/formValidator4.1.0/formValidator-4.1.0.js" type="text/javascript" charset="UTF-8"></script>
<script src="/resource/js/sea-modules/alias/formValidator4.1.0/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript">
    $(function () {
        $.formValidator.initConfig({formID: "form1", theme: 'ArrowSolidBox', mode: 'AutoTip', onError: function (msg) {
            cAlert(msg, 'error')
        }, inIframe: true});

        $("#user_name").formValidator({onShow: "请输入用户名", onFocus: "用户名不能为空", onCorrect: ""}).inputValidator({min: 1, onError: "用户名不能为空,请确认"});
        $("#pwd").formValidator({onShow: "请输入密码", onFocus: "密码不能为空", onCorrect: "密码合法"}).inputValidator({min: 1, onError: "密码不能为空,请确认"}).defaultPassed();
        //$("#pwd2").formValidator({onShow:"请输入重复密码",onFocus:"两次密码必须一致",onCorrect:""}).inputValidator({min:1,onError:"重复密码不能为空,请确认"}).compareValidator({desid:"pwd",operateor:"=",onError:"2次密码不一致,请确认"}).defaultPassed();
        $("#email").formValidator({onShow: "请输入邮箱", onFocus: "邮箱至少6个字符,最多100个字符", onCorrect: "", defaultValue: "@"}).inputValidator({min: 6, max: 100, onError: "你输入的邮箱长度非法,请确认"}).regexValidator({regExp: "^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$", onError: "你输入的邮箱格式不正确"});
        //$("#enabled").formValidator({onShow:"请选择激活状态",onFocus:"激活状态必须选择",onCorrect:"",defaultValue:"1"}).inputValidator({min:1,onError: "忘记选择激活状态了!"}).defaultPassed();

        $.formValidator.reloadAutoTip();
    });
</script>


