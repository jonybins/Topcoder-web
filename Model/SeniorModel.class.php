<?php
 namespace Model;
 use Think\Model;
class SenioModel extends Model{
	protected $trueTableName='tc_user';
	protected $tableProfic='tc_';
	// 是否批处理验证
    protected $patchValidate    =   true;
	//实现表单项目验证
	//通过重写父类属性$_validate实现表单验证
}