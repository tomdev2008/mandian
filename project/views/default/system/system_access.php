
<style type="text/css">
    fieldset{ width: 400px; height: 120px; float: left; margin: 5px; padding: 5px 10px; border: #999 1px solid; box-shadow: 2px 2px 2px #999;}
    fieldset span{ display: inline-block;}
    legend{ padding:1px 5px; border: #999; border: #999 1px solid; background-color: #f1f1f1;}
</style>

<div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
    <div class="clear"></div>
    <!-- End .content-box -->
    <div class="content-box">
        <!-- Start Content Box -->
        <div class="content-box-header">
            <h3>系统角色关联</h3>
            <div class="clear"></div>
        </div>
        <!-- End .content-box-header -->

        <div class="content-box-content">
            <div class="tab-content">
                <!--表格-->
                <table width="100%" class="table-form contentWrap">
                    <form name="frm" action="/system/system/role_access_act"  method="post">
                        <tbody>
                        <tr>
                            <td align="center">
                                当前角色：<b style="color: red"><?php echo $role['role_name'] ; ?></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span><input type="checkbox" id="checkedAll" value="" />&nbsp;全选</span>
                                <span><input type="checkbox" id="checkedUnAll" value="" />&nbsp;反选</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php foreach($syslist as $val){ ?>
                                    <fieldset>
                                        <?php $checked = in_array($val['sys_id'], $current_sys) ? 'checked' : '' ; ?>
                                        <legend><input type="checkbox" name="sys[]" <?php echo $checked; ?> value="<?php echo $val['sys_id'] ; ?>" />&nbsp;<?php echo $val['sys_name'] ; ?></legend>
                                        <?php foreach($val['children'] as $val_c){ ?>
                                            <?php $checked = in_array($val_c['sys_id'], $current_sys) ? 'checked' : '' ; ?>
                                            <span><input type="checkbox" name="sys[]" <?php echo $checked; ?> value="<?php echo $val_c['sys_id'] ; ?>" />&nbsp;<?php echo $val_c['sys_name'] ; ?></span>
                                        <?php } ?>
                                    </fieldset>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" id="btn" class="button" value="提交">
                                <input type="hidden" name="role_id" value="<?php echo $role_id ?>">
                            </td>
                        </tr>
                        </tbody>
                    </form>
                </table>
                <!--/表格-->
            </div>
            <!-- End #tab2 -->
        </div>
        <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
</div>
<!-- End #main-content -->

<script type="text/javascript">
    $(function(){
        (function(){

            //全选 反选
            $('#checkedAll').click(function(){
                var _this = $(this);
                var _checked = _this.attr('checked');
                if(_checked){
                    $('input[name^=sys]').attr('checked',true);
                }else{
                    $('input[name^=sys]').removeAttr('checked');
                }
            });

            $('#checkedUnAll').click(function(){
                $('input[name^=sys]').each(function(){
                    var _this = $(this);
                    var _checked = _this.attr('checked');
                    if(_checked){
                        _this.removeAttr('checked');
                    }else{
                        _this.attr('checked',true);
                    }
                });
            });

            $(document).find('legend > input').click(function(){
                var _this = $(this);
                var _checked = _this.attr('checked');
                if(_checked){
                    _this.parents('fieldset').find('input').attr('checked',true);
                }else{
                    _this.parents('fieldset').find('input').removeAttr('checked');
                }
            });
        })()
    });
</script>