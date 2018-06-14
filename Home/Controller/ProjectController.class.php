<?php

namespace Home\Controller;

// use Think\Controller;
use Tools\AdminController;

//新生注册
class ProjectController extends AdminController
{
    public function about()
    {
        $this->assign('time',date("Y"));
        $this->display();
    }

    public function contact()
    {
        $student = new \Model\NewstudentModel();
        if (isset($_POST)) {
            if (!$student->create()) {

            } else {
                $rst = $student->add();
                if ($rst) {
                    $this->Mes("已提交,等待进步通知", 'contact');
                } else {
                    $this->Mes("报名失败", 'contact');
                }
            }
        } else {
            $this->Mes("信息不能为空", 'contact');
        }
        //新生进群链接
        $link = M('program')->find();
        $qq_link = $link['copyright'];
        $qq = $link['email'];
        $this->assign('qq',$qq);
        $this->assign('qq_link',$qq_link);
        $this->assign('time',date("Y"));
        $this->display();
    }

    public function show()
    {
        // if(session('n_name')==''||null){
        //         $this->Error('请先登录',U('Inform/login'));
        //       }
        $student = new \Model\NewstudentModel();
        $total = $student->count();
        $page = new \Think\Page($total, 2);
        $show = $page->show();
        $list = $student->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('show', $show);
        $this->assign('time',date("Y"));
        $this->assign('list', $list);
        $this->display();
    }

    public function project()
    {

        $brand = M('brand')->select();
        // var_dump($brand);
        $this->assign('brand',$brand);
        $this->display();
    }

    public function single()
    {
        $this->display();
    }

    public function suanfa()
    {
        $this->display();
    }

    public function xiangce()
    {

        $image = new \Model\ImageModel();
        if ($_GET['im']) {
            $im = $_GET['im'];
            $p = "$im";
            $brand = M('brand')->where('id='.$p)->find();
            //相册列表
            $listRows = 4;
            $where = array(
                'path'=>$p,
                'del'=> '0',
                'is_show'=>'1');
            $total = $image->where($where)->count();
            $page = new \Think\Page($total, $listRows);
            $info = M('image')->where($where)->order('addtime')->limit($page->firstRow,$listRows)->select();
            $pagelist = $page->show(); 
            $this->assign('pagelist', $pagelist);
            $this->assign('info', $info);
            $this->assign('name', $brand['name']);
            $this->assign('im', $im);
            $this->assign('time',date("Y"));

            $this->display();
        }
    }

}