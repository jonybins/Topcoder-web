<?php 
header("content-type:text/html;charset=utf-8");
function show_bug($mes){
	echo "<pre style='red'>";
	var_dump($mes);
	echo "</pre>";
}
define("APP_DEBUG",true);
define('css','../Public/css');
define('fonts','../Public/fonts');
define('image','../Public/image');
define('images','../Public/images');
define('js','../Public/js');
define('jsjs','../Public/jsjs');
define('BT','/');
define('Bbs_share','/Home/Public/share');
define('Bbs_css','/Home/Public/css/Bbs_css');
define('Bbs_app','/Home/Public/app/bbs_app');
define('Bbs_share_editor','/Home/Public/share/editor');
define('Bbs_editor','/Home/Public/editor');
define('Bbs_images','/Home/Public/images/Bbs_images');
//define('Bbs_app','/XXXX/TC/Home/Public/app/bbs_app');
include "ThinkPHP/ThinkPHP.php";