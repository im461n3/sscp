<?php
return array(
    //'配置项'=>'配置值'
    'URL_MODEL' => '2', //URL模式
    'URL_HTML_SUFFIX' => '',
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'wswing_mutiss', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => '', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => 'ss_', // 数据库表前缀
    'URL_MODULE_MAP' => array('sys' => 'admin'), // 隐藏后台地址

    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public',
    ),

    'SITE_NAME' => 'Anonymous', // 网站名称
);