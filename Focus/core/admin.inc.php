<?php
/* 
* @Author: anchen
* @Date:   2017-01-08 09:03:38
* @Last Modified by:   anchen
* @Last Modified time: 2018-01-15 08:47:27
*/
/**
 * 监察管理员是否存在
 * @param  [type] $sql [description]
 * @return [type]      [description]
 */
function checkAdmin($sql){
     return fetchOne($sql);
}
/**
 * 检查是否有管理员登录
 * @return [type] [description]
 */
function checkLogined(){
    if($_SESSION['adminId']==""){
        alertMes("请先登录","index1.html");
    }
}
/**
 * 注册管理员
 */
function addAdmin(){
    //var_dump($_POST);
    $arr=$_POST;
    if (insert("user",$arr)){
        //$mes="注册成功！<br><a href='addAdmin.php'>继续注册</a>";
                alertMes("注册成功！返回登录","index1.html");

    }else{
       // var_dump($res);
        alertMes("注册失败！重新注册","index1.html");
    }
    return $mes;
}
/**
 *注销
 * @return [type] [description]
 */
function logout(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['adminId'])){
        setcookie("adminId","",time()-1);
    }
    if(isset($_COOKIE['adminName'])){
        setcookie("adminName","",time()-1);
    }
    session_destroy();
    header("location:index1.html");
}
/**
 * 添加留言
 */
function addView(){
    //var_dump($_POST);
    $arr=$_POST;
    if (insert("message",$arr)){
        //$mes="注册成功！<br><a href='addAdmin.php'>继续注册</a>";
                alertMes("发表成功","discuss.php");

    }else{
       // var_dump($res);
        alertMes("发表失败，重新发表","discuss.php");
    }
    return $mes;
}