<?php

if (!function_exists('get_ip')) {
    function get_ip()
    {
        try {
            if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            else if (!empty($_SERVER["HTTP_CLIENT_IP"]))
                $ip = $_SERVER["HTTP_CLIENT_IP"];
            else if (!empty($_SERVER["REMOTE_ADDR"]))
                $ip = $_SERVER["REMOTE_ADDR"];
            else if (getenv("HTTP_X_FORWARDED_FOR"))
                $ip = getenv("HTTP_X_FORWARDED_FOR");
            else if (getenv("HTTP_CLIENT_IP"))
                $ip = getenv("HTTP_CLIENT_IP");
            else if (getenv("REMOTE_ADDR"))
                $ip = getenv("REMOTE_ADDR");
            else
                $ip = "Unknown";
            return $ip;
        } catch (Exception $e) {
        }
    }
}

if (!function_exists('browse_info')) {
    function browse_info()
    {
        $browser = "";
        $browserver = "";
        $Browsers = array("Lynx", "MOSAIC", "AOL", "Opera", "JAVA", "MacWeb", "WebExplorer", "OmniWeb");
        $Agent = $GLOBALS["HTTP_USER_AGENT"];
        for ($i = 0; $i <= 7; $i++) {
            if (strpos($Agent, $Browsers[$i])) {
                $browser = $Browsers[$i];
                $browserver = "";
            }
        }
        if (ereg("Mozilla", $Agent) && !ereg("MSIE", $Agent)) {
            $temp = explode("(", $Agent);
            $Part = $temp[0];
            $temp = explode("/", $Part);
            $browserver = $temp[1]; //oSPHP.COM.CN
            $temp = explode(" ", $browserver);
            $browserver = $temp[0];
            $browserver = preg_replace("/([d.]+)/", "1", $browserver);
            $browserver = " $browserver";
            $browser = "Netscape Navigator";
        }
        if (ereg("Mozilla", $Agent) && ereg("Opera", $Agent)) {
            $temp = explode("(", $Agent);
            $Part = $temp[1];
            $temp = explode(")", $Part);
            $browserver = $temp[1];
            $temp = explode(" ", $browserver);
            $browserver = $temp[2]; //PHP开源代码
            $browserver = preg_replace("/([d.]+)/", "1", $browserver);
            $browserver = " $browserver";
            $browser = "Opera";
        }
        if (ereg("Mozilla", $Agent) && ereg("MSIE", $Agent)) {
            $temp = explode("(", $Agent);
            $Part = $temp[1];
            $temp = explode(";", $Part);
            $Part = $temp[1]; //PHP开源代码
            $temp = explode(" ", $Part);
            $browserver = $temp[2];
            $browserver = preg_replace("/([d.]+)/", "1", $browserver);
            $browserver = " $browserver";
            $browser = "Internet Explorer";
        }
        if ($browser != "") {
            $browseinfo = "$browser$browserver";
        } else {
            $browseinfo = "Unknown";
        }
        return $browseinfo;
    }
}


if (!function_exists('turn_page')) {
    function turn_page($url = "index.php", $second = 2)
    {
        print "<meta http-equiv='refresh' content='" . $second . ";url=" . $url . "'>";
        print "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
        print "页面跳转中……";
        print "&nbsp;&nbsp;<a href=" . $url . ">如果你的浏览器不支持自动跳转,请按这里</a></td>";
        exit;
    }
}

