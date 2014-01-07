    <div class="tabs-panels" style="height: 429px; width: 498px;">
        <div class="panel" style="display: none;">

        </div>
        <div class="panel" style="display: block; width: 498px;">
            <div style="padding:10px" title="" class="panel-body panel-body-noheader panel-body-noborder" id="">
                <div title="" class="panel-body panel-body-noheader panel-body-noborder" style="width: 498px; height: 429px;">
                        <div class="tab-content-title">
                            <fieldset id="swfupload">
                                <legend>列表</legend>
                                <ul id="fsUploadProgress" class="attachment-list">
                                    <?php
                                        foreach($rows as $val){
                                            echo '<li><div class="img-wrap" id=""><a class="off"  name="img-handle" href="javascript:;">
                                            <div class="icon"></div><img width="80"  data="',$val['attachment_id'],'" title="',$val['img_url'],'" src="',img_url($val['img_url'],$val['upload_time']),'"></a></div></li>';
                                        }
                                    ?>
                                </ul>
                            </fieldset>
                        </div>
                        <div class="tab-content-title">
                            <div class="pagination" id="seaPager">
                                <script type="text/javascript">
                                    seajs.config({
                                        base: "<?php echo base_url(); ?>public/resource/js/sea-modules/",
                                        alias: {
                                            "pager": "alias/pager/pager"
                                        }
                                    });
                                    var _pg = null;
                                    seajs.use(["pager"], function(pager){
                                        _pg = pager;
                                        _pg.pageCount = <?php echo $total; ?>; //定义总页数(必要)
                                        _pg.argName = 'p';    //定义参数名(可选,缺省为page)
                                        _pg.printHtml('seaPager');        //显示页数
                                    });
                                </script>
                            </div>
                        </div>
                    <div class="tab-content-title">
                        <input type="button" value="确定" id="selectBtn" />
                        <input type="button" value="取消" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="att-status"></div>
</body>
</html>