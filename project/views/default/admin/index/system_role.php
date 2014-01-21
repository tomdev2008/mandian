<style type="text/css">
    fieldset{ width: 400px; height: 120px; float: left; margin: 5px; padding: 5px 10px; border: #999 1px solid; box-shadow: 2px 2px 2px #999;}
    fieldset span{ display: inline-block;}
    legend{ padding:1px 5px; border: #999; border: #999 1px solid; background-color: #f1f1f1;}
</style>


<body>
<!--内容区-->
<div class="middle-wrap">
    <!--内容-->
    <div class="content-wrap">
        <!--表格-->
        <table width="100%" class="table-form contentWrap">
            <form name="frm" action="<?php echo for_url('admin','role','system_role_act') ; ?>"  method="post">
            <tbody>
            <tr>
                <td align="center">
                   当前用户：<b style="color: red"><?php echo $user['user_name'] ; ?></b>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset>
                        <legend><?php echo $user['user_name'] ; ?></legend>
                        <?php foreach($roles as $val){ ?>
                            <?php $checked = ($val['role_id'] == $user['role_id']) ? 'checked' : '' ; ?>
                            <span><input type="radio" name="role_id" <?php echo $checked; ?> value="<?php echo $val['role_id'] ; ?>" />&nbsp;<?php echo $val['role_name'] ; ?></span>
                        <?php } ?>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" id="btn" class="btn btn-success" value="提交">
                    <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                </td>
            </tr>
            </tbody>
            </form>
        </table>
        <!--/表格-->
    </div>
    <!--/内容-->
</div>
<!--/内容区-->
</body>
