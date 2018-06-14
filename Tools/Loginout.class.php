<?php
namespace Tools;
function logout(){

	$_SESSION=array();//清空session
	if(isset($_COOKIE[session_name()])){//清空自动登录
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['adminId'])){
		setcookie("adminId","",time()-1);
	}
	if(isset($_COOKIE['adminName'])){
		setcookie("adminName","",time()-1);
	}
	session_destroy();
	header("location:../login.php");
}