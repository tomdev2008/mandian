
        <!--表格-->
        <form name="frm" id="form1" action="<?php echo for_url('admin', 'productliner','other_info_update'); ?>"  method="post">
        <table width="100%" class="table-form contentWrap">
            <tbody>
            <tr>
                <td width="80">签证信息</td>
                <td>
                    <textarea name="liner[visa_info]" style="width: 500px; height: 150px"><?php echo $liner['visa_info']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td width="80">费用信息</td>
                <td>
                    <textarea  name="liner[contains]" style="width: 500px; height: 150px"><?php echo $liner['contains']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td width="80">重要信息</td>
                <td>
                    <textarea name="liner[important_tips]" style="width: 500px; height: 150px"><?php echo $liner['important_tips']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td width="80">友情提示</td>
                <td>
                    <textarea name="liner[friendly_tips]" style="width: 500px; height: 150px"><?php echo $liner['friendly_tips']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="liner[pro_id]" value="<?php echo $liner['pro_id']; ?>">
                    <input type="submit" rel="btn" class="button" value="保存并下一步">
                </td>
            </tr>
            </tbody>
        </table>
        </form>
        <!--/表格-->
    </div>
    <!--/内容-->
</div>
</body>
<!--/内容区-->
<script type="text/javascript">
    $(function(){

       $('#form1').submit(function(){
            doForm($('#form1').attr('action'),$('#form1').serialize(), function(data){
                _alert(data.msg, function(){
                    if(data.state){
                        location.href = '<?php echo for_url('admin', 'product','other_info', array( $pro_id)); ?>';
                    }
                })
                return ;
            });
            return false;
        });
    });
</script>
