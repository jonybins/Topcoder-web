<?php
//后台分组，普通控制器的父类
namespace Tools;
use Think\Controller;
 class AdminController extends Controller{
 	//构造方法；实现各个方法的过滤效果

 	function __construct(){
        parent::__construct();
		 //$nowac= CONTROLLER_NAME."-".ACTION_NAME;
		    //避免覆盖父类的构造方法，让其先执行；
		   //  $admin_id = session('admin_id');
         // $loginac = "Manager-login,Manager-verifyImg,Manager-logout";
        //$admin_name=session('admin_name');
         // if(empty($admin_name) && strpos($loginac,$nowac)==false){
// $moduleurl= __MODULE__;
//         $js = <<<eof 
//         <script type="text/javascript">
//        window.top.location.href="{$moduleurl}/Manager/login";

//         </script>
//         eof;
//         echo $js;
         // 	$this->redirect('Manager/login');
         // 	exit;
        //未登录用户判断，未登录调到登录界面
         // }
        // $manager_info=D('Manager')->find($admin_id);
        // $roleid=$manager_info['mg_role_id'];
        // $roleinfo=D('Role')->find($roleid);
        // $auth_ac = $roleinfo['mg_role_id'];

        //1：默认大家都可以访问的权限
        // $allow_ac = "Manager-login,Manager-logout,Manager-verifyImg,Index-index,Index-left,Index-right,Index-head";
        //2：不是超级管理员admin
        //strpos()判断一个小的字符串在大的字符串中的第一次出现的位置
        //$xb='Manager-login';
        //:3 当前用户没有的权限 
        // if(strpos('xb',$xb)==false && strpos($xb,$allow_ac)==false && $admin_name!=='admin'){
        // exit('没有权限访问');

        // }//从零开始计算出现的位置
                 // echo '这里可以实现功能限制';
 	}

                function Mes($mes,$url){
                echo "<script>
                        alert('$mes');
                        window.location.href='$url';
                </script>";

        }                
                function Mes_back($mes){
                echo "<script>
                        alert('$mes');
                        history.back(-1);
                </script>";

        }
        function Mes_go($mes,$url){
                echo "<script>
                        alert('$mes');
                        history.go(0);
                </script>";

        }
//                  function alert(){
//                 echo "
//                 <script>

//   var msg=confirm("你确定删除此记录吗？");
// if(msg==true){
//    return true;
//  }else{
//   return false;
//  }
// </script>";


// }

//         function I_login(){
            
// $ss=<<<EOF
//                    <div class="modal-body">
//              <form  class="form-horizontal" action="" method="post">
//                  <div class="form-group">
//                      <label for="" class="col-sm-2 control-label">用户名</label>
//                      <div class="col-sm-10">
//                          <input type="text" name="username" class="form-control" placeholder="请输入用户名"/>
//                      </div>
//                      <label for="" class="col-sm-2 control-label">密码</label>
//                      <div class="col-sm-10" style="margin-top:10px;">
//                          <input type="password" class="form-control" name="password" placeholder="请输入密码"/>
//                      </div>
//                  </div>
//                     <div class="modal-footer">
//              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> -->

//              <input type="submit" class="btn btn-primary" id="logo" name="submit" />
//           </div>
//              </form>
//           </div>
// EOF;
//             echo $ss;
//         }
 
                  
 }