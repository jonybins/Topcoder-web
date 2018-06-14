<?php
/* 
* @Author: anchen
* @Date:   2016-10-26 13:57:53
* @Last Modified by:   anchen
* @Last Modified time: 2016-10-26 14:12:12
*/ 
 namespace Model;
 use Think\Model;
//ThinkPHP/Library/Think/Model.class.php
 class UserModel extends Model{
//增删改查都已经分装好
    // 是否批处理验证
    protected $patchValidate    =   true;
 	//可以自定义方法
    protected $_validate        =   array(
        array('username','require','用户名必须填写'),
        array('password','require','密码必须填写'),
        array('confirmpassword','require','确认密码必须填写'),
        array('confirmpassword','password','必须要跟密码一样','0','confirm'),
        //array('password2','password','与密码必须一致',0,'confirm'),
        //验证邮箱
        array('user_email','email','邮箱格式不正确'),
        //验证qq，都是数字，长度在5-10位，首位部位零
        //正则表达式验证/^[1-9]\d[4，9]$/
        //array('user_qq',"/^[1-9]\d{4,9}$/",'qq格式不正确'),
    );
    // function checkNamePwd($name,$password){
    //     //$info=$this->getByMg_name($name);
    //     $info=$this->getByUsername($name);
    //     //var_dump($info);
    //     exit();
    //     if($info){
    //         if($info['password']!=$password){
    //             return false;
    //         }else{
    //             return $info;
    //         }
    //     }else{
    //         return false;
    //     }
    // }
    function checkNamePwd($username,$password) {
      $Info=$this->getByUsername($username);
      if($Info!=null){
          if($password==$Info['password']){
            return $Info;
          }else{
            return false;
          }
      }else {
        return false;
      }


  }

 	function CheckLogin($username,$password){
    $info=$this->where("username='$username'")->find();

    if($info){
        if($info['password']==$password){
        	session('username',$username);
        	return $this->Mes("登陆成功,您可以上传照片了哦！",'project.html');
        }else{
          return $this->Mes("密码错误，请重新填写",'project.html');
        }
    }else{
    	return $this->Mes("账号或密码错误，请确认后登陆",'project.html');
    }
   





 	}
 	function Mes($mes,$url){
 		echo "<script>
 			alert('$mes');
 			window.location.href='$url';
 		</script>";

 	}


 }
