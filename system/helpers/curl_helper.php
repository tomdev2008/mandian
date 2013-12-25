<?php
function _curl( $url, $post_data = null, $config = array(), $upload_file = array())
{
    settype($config, 'array');
    $ch = curl_init();
    if (substr($url, 0, 5) == 'https') {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    /*curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Expect:',
        'User-Agent:Mozilla/5.0 (Windows NT 5.1; rv:2.0) Gecko/20100101 Firefox/4.0' . trim(base_url()),
        "Referer:{$url}"
    ));*/
    foreach ($config as $k => $v) {
        curl_setopt($ch, $k, $v);
    }
    if ($post_data) {
        if (function_exists('http_build_query')) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        }
    }
    if ($upload_file) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, (array)$upload_file + (array)$post_data);
    }
    $curl_data = curl_exec($ch);
    if (curl_errno($ch)) {
        $curl_data = curl_error($ch);
    }
    curl_close($ch);
    return $curl_data;
}