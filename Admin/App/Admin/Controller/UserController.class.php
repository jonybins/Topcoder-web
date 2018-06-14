<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends PublicController{

	//*************************
	// 普通会员的管理
	//*************************
	public function index(){
		$aaa_pts_qx=1;
		$type=$_GET['type'];
		$id=(int)$_GET['id'];
		$tel = trim($_REQUEST['tel']);
		$name = trim($_REQUEST['name']);

		$names=$this->htmlentities_u8($_GET['name']);
		//搜索
		$where="1=1";
		$name!='' ? $where.=" and n_name like '%$name%'" : null;
		$tel!='' ? $where.=" and n_phone like '%$tel%'" : null;

		define('rows',20);
		$count=M('newstudent')->where($where)->count();
		$rows=ceil($count/rows);
		// var_dump($count);
		$page=(int)$_GET['page'];
		$page<0?$page=0:'';
		$limit=$page*rows;
		$userlist=M('newstudent')->where($where)->order('id desc')->limit($limit,rows)->select();
		// var_dump($userlist);
		$page_index=$this->page_index($count,$rows,$page);
		foreach ($userlist as $k => $v) {
			$userlist[$k]['addtime']=date("Y-m-d H:i",$v['addtime']);
		}
		//====================
		// 将GET到的参数输出
		//=====================
		$this->assign('name',$name);
		$this->assign('tel',$tel);

		//=============
		//将变量输出
		//=============
		$this->assign('page_index',$page_index);
		$this->assign('page',$page);
		$this->assign('userlist',$userlist);
		$this->display();	
	}

	//*************************
	//会员地址管理
	//*************************
	public function address(){
		// $aaa_pts_qx=1;
		$id=(int)$_GET['id'];
		if($id<1){return;}
		if($_GET['type']=='del' && $id>0 && $_SESSION['admininfo']['qx']==4){
		  $this->delete('address',$id);
		}
		//搜索
		$address=M('address')->where("uid=$id")->select();
		
	    //=============
		//将变量输出
		//=============
		$this->assign('address',$address);
		$this->display();
	}

	public function n_pass()
	{
		$id = intval($_REQUEST['did']);
		$info = M('newstudent')->where('id='.intval($id))->find();
		// var_dump($info);exit;
		if (!$info) {
			$this->error('会员信息错误.'.__LINE__);
			exit();
		}

		$data=array();
		$data['n_sta'] =2;
		$up = M('newstudent')->where('id='.intval($id))->save($data);
		if ($up) {
			$this->redirect('User/index',array('page'=>intval($_REQUEST['page'])));
			exit();
		}else{
			$this->error('操作失败.');
			exit();
		}
	}
	public function pass()
	{
		$id = intval($_REQUEST['did']);
		$info = M('newstudent')->where('id='.intval($id))->find();
		if (!$info) {
			$this->error('会员信息错误.'.__LINE__);
			exit();
		}

		$data=array();
		$data['n_sta'] = 1;
		$up = M('newstudent')->where('id='.intval($id))->save($data);
		if ($up) {
			$this->redirect('User/index',array('page'=>intval($_REQUEST['page'])));
			exit();
		}else{
			$this->error('操作失败.');
			exit();
		}
	}	
}