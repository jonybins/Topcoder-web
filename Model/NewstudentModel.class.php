<?php
namespace Model;
use \Think\Model;
class NewstudentModel extends Model{
	protected  $patchValidate    =   true;
    //可以自定义方法
    protected $_validate        =   array(
        //验证用户
        array('n_ame','require','用户名必须填写'),
        //验证性别
        array('n_sno','require','学号必须填写'),
        //验证年级
        array('n_grade','require','班级必须填写'),
        //验证手机号
        array('n_phone','require','手机号必须填写'),
        //array('phone',"^(13[0-9]|15[0|3|6|7|8|9]|18[8|9])\d{8}$",'手机号不正确'),
        //验证qq，都是数字，长度在5-10位，首位部位零
        //正则表达式验证/^[1-9]\d[4，9]$/
        array('n_user_qq',"/^[1-9]\d{4,9}$/",'qq格式不正确'),
        array('n_why','require','原因必须填写'),
        );
}