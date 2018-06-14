<?php

namespace Home\Model;

use Think\Model;

class SeniorModel extends Model
{
    protected $trueTableName = 'tc_user';
    protected $tableProfic = 'tc_';
    // 是否批处理验证
    protected $patchValidate = true;
    //实现表单项目验证
    //通过重写父类属性$_validate实现表单验证
    protected $_validate = array(
        array('username', 'require', '用户名必须填写'),
        array('password', 'require', '密码必须填写'),
        //为同一个项目设置多个验证
        array('password2', 'require', '确认密码必须填写'),
        array('password2', 'password', '与密码必须一致', '0', 'confirm'),
        //验证邮箱
        array('user_email', 'email', '邮箱格式不正确'),
        //验证qq，都是数字，长度在5-10位，首位部位零
        //正则表达式验证/^[1-9]\d[4，9]$/
        array('user_qq', "/^[1-9]\d{4,9}$/", 'qq格式不正确'),
    );

}