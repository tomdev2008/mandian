
        <!--表格-->
        <form name="frm" id="form1" action="<?php echo for_url('admin', 'product','refer_trip_update'); ?>"  method="post">
            <?php  foreach($trip as $key => $val) { ?>
                <table width="100%" class="table-form contentWrap">
                    <tbody>
                    <thead>
                    <tr>
                        <th colspan="3">第<b><?php echo ($key + 1); ?></b>天</th>
                    </tr>
                    </thead>
                    <tr>
                        <td width="80">行程交通</td>
                        <td colspan="2">
                            <input type="text" value="<?php echo $val['traffic']; ?>" size="50" class="input-text" name="liner[<?php echo $key; ?>][traffic]">
                        </td>
                    </tr>
                    <tr>
                        <td width="80">行程描述</td>
                        <td colspan="2">
                            <textarea name="liner[<?php echo $key; ?>][trip_info]" style="width: 500px; height: 150px"><?php echo $val['trip_info']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="80">住宿</td>
                        <td>
                            <select id="liner_<?php echo $key; ?>_hotel_star" name="liner[<?php echo $key; ?>][hotel_star]">
                                    <option value="其他">-------其他-------</option>
                                    <option value="客栈">-------客栈-------</option>
                                    <option value="农家院">------农家院-----</option>
                                    <option value="二星">二星</option>
                                    <option value="三星">三星</option>
                                    <option value="四星">四星</option>
                                    <option value="五星">五星</option>
                                    <option value="六星">六星</option>
                                    <option value="七星">七星</option>
                                    <option value="八星">八星</option>
                                    <option value="住在交通工具上">住在交通工具上</option>
                                    <option value="酒店转机住宿">酒店转机住宿</option>
                                </select>
                            <br />
                            <br />
                            <textarea name="liner[<?php echo $key; ?>][hotel_info]" style="width: 500px; height: 30px"><?php echo $val['hotel_info']; ?></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="80">餐饮</td>
                        <td colspan="2">
                            早：<input type="text" value="<?php echo $val['breakfast']; ?>" size="30" class="input-text" name="liner[<?php echo $key; ?>][breakfast]">
                            中：<input type="text" value="<?php echo $val['lunch']; ?>" size="30" class="input-text" name="liner[<?php echo $key; ?>][lunch]">
                            晚：<input type="text" value="<?php echo $val['dinner']; ?>" size="30" class="input-text" name="liner[<?php echo $key; ?>][dinner]">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <input type="hidden" name="liner[<?php echo $key; ?>][refer_trip_id]" value="<?php echo $val['liner_trip_id']; ?>">
                <p>&nbsp;</p>
            <?php } ?>


        <table width="100%" class="table-form contentWrap">
            <tbody>
            <tr>
                <td>
                    <input type="hidden" name="liner[pro_id]" value="<?php echo $pro_id; ?>">
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
<!-- My97DatePicker -->
<script language="JavaScript" type="text/javascript" src="/public/resource/js/sea-modules/alias/My97DatePicker/WdatePicker.js" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){

       $('#form1').submit(function(){
            doForm($('#form1').attr('action'),$('#form1').serialize(), function(data){
                _alert(data.msg, function(){
                    if(data.state){
                        location.href = '<?php echo for_url('admin', 'product','refer_trip', array( $pro_id)); ?>';
                    }
                })
                return ;
            });
            return false;
        });
    });
</script>
