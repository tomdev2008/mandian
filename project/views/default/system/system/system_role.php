<style type="text/css">
    fieldset{ width: 400px; height: 120px; float: left; margin: 5px; padding: 5px 10px; border: #999 1px solid; box-shadow: 2px 2px 2px #999;}
    fieldset span{ display: inline-block;}
    legend{ padding:1px 5px; border: #999; border: #999 1px solid; background-color: #f1f1f1;}
</style>

<div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
    <ul class="shortcut-buttons-set">
        <li><a class="shortcut-button" href="<?php echo for_url('system','user','role_add') ?>"><span> <img src="/public/resource/images/icons/pencil_48.png" alt="icon" /><br />
        添加新角色 </span></a></li>
        <!--<li><a class="shortcut-button" href="#"><span> <img src="/resource/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
        Create a New Page </span></a></li>
        <li><a class="shortcut-button" href="#"><span> <img src="/resource/images/icons/image_add_48.png" alt="icon" /><br />
        Upload an Image </span></a></li>
        <li><a class="shortcut-button" href="#"><span> <img src="/resource/images/icons/clock_48.png" alt="icon" /><br />
        Add an Event </span></a></li>
        <li><a class="shortcut-button" href="#messages" rel="modal"><span> <img src="/resource/images/icons/comment_48.png" alt="icon" /><br />
        Open Modal </span></a></li>-->
    </ul>
    <!-- End .shortcut-buttons-set -->

    <!-- Page Head -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
        <!-- Start Content Box -->
        <div class="content-box-header">
            <h3>角色关联</h3>
            <div class="clear"></div>
        </div>
        <!-- End .content-box-header -->
        <div class="content-box-content">
            <div class="tab-content default-tab">
                <!--表格-->
                <table width="100%" class="table-form contentWrap">
                    <form name="frm" action="/default/system/system_role_act"  method="post">
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
                                <input type="submit" id="btn" class="button" value="提交">
                                <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">
                            </td>
                        </tr>
                        </tbody>
                    </form>
                </table>
                <!--/表格-->
            </div>
        </div>
        <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
</div>
<!-- End #main-content -->
<script type="text/javascript">
    function del(id){
        _confirm('确认删除？',function(){location.href = '<?php echo for_url('system','system','system_del') ;?>'+id;});
    }
</script>