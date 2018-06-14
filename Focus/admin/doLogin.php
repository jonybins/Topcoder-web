<?php
require_once '../include.php'; 
 $username=$_POST['username'];
 $password=$_POST['password'];
 $verify=$_POST['verify'];
 $verify1=$_SESSION['verify'];
 if($verify==$verify1) {
    $sql="SELECT * FROM `user` where username='$username' and password='{$password}'";
     $res=mysql_query($sql);
    if($res){
        echo '登录成功';
    }else{
        echo '登陆失败';
    }
    $row=checkAdmin($sql);
    if ($row) {
        $_SESSION['adminName']=$row['username'];
        $_SESSION['adminId']=$row['id'];
        //header("location:guanli.php");
        alertMes("欢迎用户".$_SESSION['adminName']."登录","personal.php");
    }else{
           alertMes("登陆失败，重新登录","index1.html");
    } 

 }else{
    alertMes("验证码错误","index1.html");
}
?>
