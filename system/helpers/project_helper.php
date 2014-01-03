<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-1-3
 * Time: 下午4:18
 */

function img_url($name = null, $time = null)
{
    if (empty($name)) {
        return false;
    }
    $y = date('Y', $time);
    if ($y < 2014) {
        return "http://ilvxing.qiniudn.com/" . date('Ym', $time) . "/" . date('d', $time) . "/" . $name;
    } else {
        return "/uploads/" . date('Ym', $time) . "/" . $name;
    }

}