<?php
//-----------------------------------------------
// 常用函数，自己收集

/**
 * 获取随机字符串
 */
if (!function_exists('rand_str')) {
    function rand_str($length)
    {
        $rndstring = '';
        $template = "1234567890abcdefghijklmnopqrstuvwxyz";
        for ($a = 0; $a <= $length; $a++) {
            $b = rand(0, strlen($template) - 1);
            $rndstring .= $template [$b];
        }

        return $rndstring;
    }
}

/**
 * 是否数字
 * @param $str
 * @return bool
 */
if (!function_exists('is_digital')) {
    function is_digital($str)
    {
        return ctype_digit($str);
    }
}

/**
 * 邮箱
 * @param $str
 * @return bool
 */
if (!function_exists('is_email')) {
    function is_email($str)
    {
        return preg_match('/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/', $str) === 0 ? false : true;
    }
}

/**
 * 第一个数组做key 第二个做value
 */
if (!function_exists('array_combine')) {
    function array_combine($a, $b)
    {
        $c = array();
        if (is_array($a) && is_array($b))
            while (list (, $va) = each($a))
                if (list (, $vb) = each($b))
                    $c [$va] = $vb;
                else
                    break 1;
        return $c;
    }
}

if (!function_exists('pp')) {
    function pp($data = null, $exit = true)
    {
        $tmp = debug_backtrace();
        $last = end($tmp);
        $title = isset ($last ['class']) ? $last ['class'] . $last ['type'] : '';
        $args = array();
        if (isset ($last ['args']) && is_array($last ['args'])) {
            foreach ($last ['args'] as $arg) {
                if (is_object($arg))
                    $args [] = get_class($arg);
                elseif (is_array($arg))
                    $args [] = 'Array(' . count($args) . ')'; else
                    $args [] = $arg;
            }
        }
        $title .= isset ($last ['function']) ? $last ['function'] . '(' . implode(',', $args) . ')&nbsp;' : '';
        $title .= $last ['file'] . '&nbsp;Line:' . $last ['line'] . '';
        echo '<pre style="font-size:14px; border: 1px solid #ccc; background:#fff; padding:5px; margin-bottom:10px; text-align:left; -moz-border-radius: 10px;-webkit-border-radius: 10px; border-radius: 10px;">';
        echo '<div style="background:#093; font-weight:bold; widht:100%; height:30px; line-height:30px; color:#fff; padding-left:10px; -moz-border-radius: 10px;-webkit-border-radius: 10px; border-radius: 10px;">' . $title . '</div>';
        print_r($data);
        echo '</pre>';
        if ($exit)
            exit ();
    }
}

/**
 * 获取字符编码类型
 */
if (!function_exists('get_str_chart')) {
    function get_str_chart($str)
    {
        $re = array();
        $re ['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re ['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re ['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re ['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        foreach ($re as $key => $r) {
            $match = array();
            $value = preg_match($r, $str, $match);
            if ($value !== FALSE) {
                return $key;
            }
        }
    }
}

if (!function_exists('xml2array')) {
    function xml2array($xml)
    {
        $parser = xml_parser_create();
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, $xml, $tags);
        xml_parser_free($parser);

        $elements = array(); // the currently filling [child] XmlElement array
        $stack = array();
        foreach ($tags as $tag) {
            $index = count($elements);
            if ($tag ['type'] == "complete" || $tag ['type'] == "open") {
                $elements [$index] = array();
                $elements [$index] ['name'] = isset ($tag ['tag']) ? $tag ['tag'] : null;
                $elements [$index] ['attributes'] = isset ($tag ['attributes']) ? $tag ['attributes'] : null;
                $elements [$index] ['content'] = isset ($tag ['value']) ? $tag ['value'] : null;
                if ($tag ['type'] == "open") { // push
                    $elements [$index] ['children'] = array();
                    $stack [count($stack)] = & $elements;
                    $elements = & $elements [$index] ['children'];
                }
            }
            if ($tag ['type'] == "close") { // pop
                $elements = & $stack [count($stack) - 1];
                unset ($stack [count($stack) - 1]);
            }
        }
        return $elements [0]; // the single top-level element
    }
}

/**
 * 编码转换
 */
if (!function_exists('ex_iconv')) {
    function ex_iconv($inCharset, $outCharset, $strArr)
    {
        if (is_array($strArr)) {
            $returnArr = array();
            foreach ($strArr as $key => $str) {
                $returnArr[$key] = ex_iconv($inCharset, $outCharset, $str);
            }
            return $returnArr;
        } else {
            return iconv($inCharset, $outCharset, $strArr);
        }
    }
}

if (!function_exists('debug_it')) {
    function debug_it()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }
}




