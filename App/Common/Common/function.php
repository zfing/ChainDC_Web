<?php
//数字转换(每一亿转)
function FormatMoney($money){
    return sprintf("%.1f", $money/100000000);
}

//接口接收数据方法
function makeRequest( $url, $params = array(), $expire = 5, $extend = array(),$is_browser=true)
{
    if (empty($url)) {
        return array('code' => '100');
    }

    $_curl = curl_init();
    $_header = array(
        'Accept-Language: zh-cn',
        'Connection: Keep-Alive',
        'Cache-Control: no-cache'
    );

    // 只要第二个参数传了值之后，就是POST的
    //如果是模拟浏览器形为，就要加上http_build_query,否则不要加，例如请求appstore的就不要
    if (!empty($params)) {
        if($is_browser){
            curl_setopt($_curl, CURLOPT_POSTFIELDS, http_build_query($params));
        }else{
            curl_setopt($_curl, CURLOPT_POSTFIELDS, $params);
        }
        curl_setopt($_curl, CURLOPT_POST, true);
    }
    if (strpos($url, 'https://') !== false) {
        curl_setopt($_curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($_curl, CURLOPT_SSL_VERIFYHOST, false);
    }

    curl_setopt($_curl, CURLOPT_URL, $url);
    curl_setopt($_curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($_curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:28.0) Gecko/20100101 Firefox/28.0 ');
    curl_setopt($_curl, CURLOPT_HTTPHEADER, $_header);

    if ($expire > 0) {
        curl_setopt($_curl, CURLOPT_TIMEOUT, $expire); // 处理超时时间
        curl_setopt($_curl, CURLOPT_CONNECTTIMEOUT, $expire); // 建立连接超时时间
    }

    // 额外的配置
    if (!empty($extend)) {
        curl_setopt_array($_curl, $extend);
    }

    $result['result'] = curl_exec($_curl);
    $result['code'] = curl_getinfo($_curl, CURLINFO_HTTP_CODE);
    if ($result['result'] === false) {
        $result['result'] = curl_error($_curl);
        $result['code'] = -curl_errno($_curl);
    }

    curl_close($_curl);

    return $result;
}