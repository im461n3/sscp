<?php
//Gravatar
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://secure.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

// 格式化流量
function formatMBytesToString($mbytes)
{
    $units = array('MB', 'GB', 'TB');
    for ($i = 0; $mbytes >= 1024 && $i < 2; $i++) $mbytes /= 1024;
    return round($mbytes, 2) . $units[$i];
}