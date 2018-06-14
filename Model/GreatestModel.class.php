<?php
namespace Model;
use \Think\Model;
class GreatestModel extends Model{
	protected  $patchValidate    =   true;
    //可以自定义方法
    protected $_validate        =   array(
        //验证用户
        array('name','require','用户名必须填写'),
        //验证性别
        array('sex','require','性别必须填写',1),
        //验证年级
        array('grade','require','年级必须填写'),
        //验证组别
        array('groups','require','组别必须填写',1),
        //验证手机号
        array('phone','require','手机号必须填写'),
        array('phone',"/^0?(13|14|15|17|18)[0-9]{9}$/",'手机号格式不正确',2),
        //array('phone',"^(13[0-9]|15[0|3|6|7|8|9]|18[8|9])\d{8}$",'手机号格式不正确',2),
        //验证qq，都是数字，长度在5-10位，首位部位零
        //正则表达式验证/^[1-9]\d[4，9]$/
        array('user_qq',"/^[1-9]\d{4,9}$/",'qq格式不正确',2),
        //验证微信
        array("wechat",'require','微信号必须填写'),
        //验证邮箱
        array('email','email','邮箱格式不正确',2),
        //验证工作地址
        array('address','require','工作地址必须填写'),
        //验证学习经历
        array('l_exp','require','学习经历必须填写'),
        //验证工作经历
        array('w_exp','require','工作经历必须填写'),
        //验证寄语
        array('motto','require','寄语必须填写'),
   );
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