
    <div class="tabs-panels" style="height: 429px; width: 498px;">
        <div class="panel" style="display: block; width: 498px;">
            <div title="" class="panel-body panel-body-noheader panel-body-noborder"
                 style="width: 498px; height: 429px;">
                <div class="tab-content">
                    <div class="demo-info">
                        最多上传 1 个附件,单文件最大 2 MB ；支持 jpg、jpeg、gif、png、bmp 格式。
                    </div>
                    <div class="tab-content-title op">
                        <div class="btnaddnew" id="addnew">
                            <span id="buttonPlaceHolder"></span>
                        </div>
                        <input type="button" value="开始上传" class="btn" onclick="swfu.startUpload();">
                    </div>
                    <div class="tab-content-title">
                        <fieldset id="swfupload">
                            <legend>列表</legend>
                            <ul id="fsUploadProgress" class="attachment-list">
                            </ul>
                        </fieldset>
                    </div>
                    <div class="tab-content-title">
                        <input type="button" value="确定" id="selectBtn" />
                        <input type="button" value="取消" />
                    </div>
                </div>
            </div>
        </div>
        <div class="panel" style="display: none;">
            <div style="padding:10px" title="" class="panel-body panel-body-noheader panel-body-noborder" id="">
            </div>
        </div>
    </div>
</div>
<div id="att-status"></div>
</body>
</html>