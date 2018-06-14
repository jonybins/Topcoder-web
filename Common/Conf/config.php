<?php
return array(
    //'配置项'=>'配置值'
    //页面底部显示跟踪信息
    //'SHOW_PAGE_TRACE' => true,
    //默认分组设置
    'DETAULT_MODULE' => 'Home',//默认模块
    'URL_MODEL'          => '2', //URL模式这里是地址的方式  index.php/Project/home/about
    'MODULE_ALLOW_LIST' => array('Home,', 'Admin'),//默认分组
    //Smarty 模板引擎切换
    'TMPL_ENGINE_TYPE' => 'Smarty',//默认模板引擎
    //為smarty作配置
    //  'TMPL_ENGINE_CONFIG'  =>array(
    // 'left_delimiter'=>'{',
    // 'right_delimiter'=>'}',
    //     ),

    //数据库操作
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'qdm195426336.my3w.com',
    'DB_NAME' => 'qdm195426336_db',
    'DB_USER' => 'qdm195426336',
    'DB_PWD'  =>   '910820818xb520',
    //'DB_PWD' => '',
    'DB_PORT' => '3306',
    'DB_PREFIX' => 'tc_',//数据库表前缀
    'DB_FIELDS_CACHE' => true,//启用字段缓存
    'DB_CHARSET' => 'utf8',
);
