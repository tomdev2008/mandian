<style type="text/css">
    .labelspan{ margin: 2px 5px; display: inline-block;}
    .labelspan input{ margin: 0px 3px;}
</style>
<body>
<!--内容区-->
<div class="middle-wrap">
    <!--导航-->
    <div class="lines-wrap">
        <p>修改信息</p>
    </div>
    <!--/导航-->
    <!--内容-->
    <div class="content-wrap">
        <table width="100%" class="table-form contentWrap">
            <tr>
                <td>
                    <div class="tabs-container" style="width: auto; height: auto;">
                        <div class="tabs-header">
                            <div class="tabs-wrap" style="margin-left: 0px; margin-right: 0px; width: 5004px;">
                                <ul class="tabs" style="height: 26px;">
                                    <?php if(empty($liner_id)){ ?>
                                        <li class="tabs-selected">
                                            <a class="tabs-inner" href="javascript:" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">基本信息</span>
                                            </a
                                        </li>
                                        <li class="">
                                            <a class="tabs-inner" href="javascript:" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">参考行程</span></a>
                                        </li>
                                        <li class="">
                                            <a class="tabs-inner" href="javascript:" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">价格/库存</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a class="tabs-inner" href="javascript:" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">其他信息</span>
                                            </a>
                                        </li>
                                    <?php }else{ ?>
                                        <li class="<?php if($t == 'basic_info'){ echo 'tabs-selected';} ?>">
                                            <a class="tabs-inner" href="<?php echo for_url('admin','productliner','basic_info', array($liner_id)); ?>" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">基本信息</span>
                                            </a
                                        </li>
                                        <li class="<?php if($t == 'refer_trip'){ echo 'tabs-selected';} ?>">
                                            <a class="tabs-inner" href="<?php echo for_url('admin','productliner','refer_trip', array($liner_id)); ?>" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">参考行程</span></a>
                                        </li>
                                        <li class="<?php if($t == 'trip_price'){ echo 'tabs-selected';} ?>">
                                            <a class="tabs-inner" href="<?php echo for_url('admin','productliner','trip_price', array($liner_id)); ?>" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">价格/库存</span>
                                            </a>
                                        </li>
                                        <li class="<?php if($t == 'other_info'){ echo 'tabs-selected';} ?>">
                                            <a class="tabs-inner" href="<?php echo for_url('admin','productliner','other_info', array($liner_id)); ?>" style="height: 25px; line-height: 25px;">
                                                <span class="tabs-title">其他信息</span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>