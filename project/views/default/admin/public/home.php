<body>
<!--内容区-->
<div class="middle-wrap">
    <!--内容-->
    <div class="content-wrap">
        <!--表格-->
        <table width="100%" class="table-form contentWrap">
            <thead>
            <tr>
                <th colspan="2">服务器信息</th>
            </tr>
            </thead>

            <tr>
                <td width="120" class="er">服务器域名</td>
                <td width="380" class="fl"><?= _SERVER('SERVER_NAME') ?></td>
            </tr>

            <tr>
                <td class="er">服务器端口</td>
                <td class="fl"><?= _SERVER('SERVER_ADDR') . ':' . _SERVER('SERVER_PORT') ?></td>
            </tr>

            <tr>
                <td class="er">服务器环境</td>
                <td class="fl"><?= stripos(_SERVER('SERVER_SOFTWARE'), 'PHP') ? _SERVER('SERVER_SOFTWARE') : _SERVER('SERVER_SOFTWARE') ?></td>
            </tr>

            <tr>
                <td class="er">PHP运行环境</td>
                <td class="fl"><?= PHP_SAPI . ' PHP/' . PHP_VERSION ?></td>
            </tr>

            <tr>
                <td class="er" style="color: #ff0000;">PHP配置文件</td>
                <td class="fl"><?= $Info['php_ini_file'] ?></td>
            </tr>

            <tr>
                <td class="er">服务器主目录</td>
                <td class="fl"><?= _SERVER('DOCUMENT_ROOT') ?></td>
            </tr>

            <tr>
                <td class="er">服务器标准时</td>
                <td class="fl"><?= gmdate('Y-m-d', time() + TimeZone * 3600) ?> <?= gmdate('H:i:s', time() + TimeZone * 3600) ?>
                    <span
                        style="color: #999999;">(<?= (TimeZone < 0 ? '-' : '+') . gmdate('H:i', abs(TimeZone) * 3600) ?>
                        )</span></td>
            </tr>
        </table>
        <table width="100%" class="table-form contentWrap">
            <thead>
            <tr>
                <th colspan="2">系统监测</th>
            </tr>
            </thead>

            <tr>
                <td width="120" class="er">系统日志</td>
                <td width="380" class="fl">今天有<b><?= $data['log_errors_count']; ?></b>个警告</td>
            </tr>
        </table>
        <!--/表格-->
    </div>
    <!--/内容-->
</div>
</body>
<!--/内容区-->
<?php
function _SERVER($n)
{
    return isset($_SERVER[$n]) ? $_SERVER[$n] : '[undefine]';
}

?>
