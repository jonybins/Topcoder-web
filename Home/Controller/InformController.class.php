<?php
//U函数使用时要注意
//********Unable to load template file 'rj\ThinkPHP/Tpl/dispatch_jump.tpl'----  thinkphp3.2.3
// 1.报错原因：将thinkphp默认模板引擎改为smarty模板引擎，导致调用success()和error()方法失败。
// 2.解决方案一：
// 找到ThinkPHP\Library\Think\Controller.class.PHP文件中的protected function error()和protected function success()方法，替换为如下代码~~
namespace Home\Controller;

class InformController extends CommonController
{
    public function userlist()
    {
        $user = new \Model\GreatestModel;
        if (session('username') == '' || null) {
            $this->Mes('请先登录', 'login');
        } else {
            $id = session('id');
            $class = $user->where("id='$id'")->find();
            if ($class['class'] == 'common') {
                $this->Mes_back('小主不具备该权限');
            } else {
                if ($_POST['drop']) {
                    $this->userLogout();
                }

                $total = $user->count();
                $Page = new \Think\Page($total, 3);
                $show = $Page->show();
                $list = $user->limit($Page->firstRow . ',' . $Page->listRows)->select();
                // $this->assign('list',$list);
                if ($_POST['xiugai']) {
                    //var_dump($_POST);
                    $status = "'" . $_POST['status'] . "'";
                    $class = "'" . $_POST['class'] . "'";
                    $id = "'" . $_POST['id'] . "'";
                    $update = $user->execute("update  `tc_greatest` set `status`=$status,`class`=$class where `id`=$id");
                    $list = $user->limit($Page->firstRow . ',' . $Page->listRows)->select();
                } elseif ($_POST['search']) {
                    $username = $_POST['username'];
                    $p['username'] = array('like', "%$username%");
                    $list = $user->limit($Page->firstRow . ',' . $Page->listRows)->where($p)->select();
                    if (empty($list)) {
                        $list = $user->limit($Page->firstRow . ',' . $Page->listRows)->select();
                    }
                }
                $this->assign('time',date("Y"));
                $this->assign('list', $list);
                $this->assign('page', $show);
            }
        }
        $this->display();
    }

    public function add()
    {
        if (session('username') == '' || null) {
            $this->Mes("请先登录", 'login');
        }
        // function userLogout(){
        //     $_SESSION=array();
        //     if(isset($_COOKIE[session_name()])){
        //         setcookie(session_name(),"",time()-1);
        //     }
        //     session_destroy();
        //     header("location:login");
        // }
        if ($_POST['drop']) {
            $this->userLogout();
        }
        if ($_POST['submit']) {
            $g = new \Model\GreatestModel();
            if (!empty($_POST)) {
                if (!$g->create()) {
                    show_bug($g->getError());
                    //$info=show_bug($name->getError());
                    //$this->assign('info',$info);
                } else {
                    $name = "'" . $_POST['name'] . "'";
                    $sex = "'" . $_POST['sex'] . "'";
                    $grade = "'" . $_POST['grade'] . "'";
                    $groups = "'" . $_POST['groups'] . "'";
                    $phone = "'" . $_POST['phone'] . "'";
                    $qq = "'" . $_POST['qq'] . "'";
                    $wechat = "'" . $_POST['wechat'] . "'";
                    $email = "'" . $_POST['email'] . "'";
                    $address = "'" . $_POST['address'] . "'";
                    $l_exp = "'" . $_POST['l_exp'] . "'";
                    $w_exp = "'" . $_POST['w_exp'] . "'";
                    $motto = "'" . $_POST['motto'] . "'";
                    $username = "'" . session('username') . "'";
                    $rst = $g->execute("update `tc_greatest` set `name`=$name,`sex`=$sex,`grade`= $grade,`groups`=$groups,`phone`=$phone,`qq`=$qq,`wechat`=$wechat,`email`=$email,`address`=$address,`l_exp`=$l_exp,`w_exp`=$w_exp,`motto`=$motto where `username`=$username ");
                    //var_dump($rst);
                    if ($rst) {
                        $this->Mes("信息录入成功", 'show');
                    } else {
                        $this->Error("信息录入失败", 'add');
                    }
                }
            }
        }
        $this->display();
    }

    public function register()
    {
        $result = array(
            array('username', 'require', '用户名必须填写'),
            array('password', 'require', '密码必须填写'),
            array('confirmpassword', 'require', '确认密码必须填写'),
            array('confirmpassword', 'password', '必须要跟密码一样', '0', 'confirm'),
            array('email', 'email', '邮箱格式不正确', 2),
        );
        $user = new \Model\GreatestModel();
        if (!empty($_POST)) {
            if (!$user->validate($result)->create()) {
                show_bug($user->getError());
            } else {
                $rst = $user->add();
                if ($rst) {
                    $this->Mes("注册成功,待管理员审核通过，方可登陆", 'login');
                } else {
                    $this->Mes('注册失败', 'register');
                }
            }
        } else {
            $this->display();
        }
    }

    public function show()
    {
        $name = new \Model\GreatestModel();
        if (session('username') == '' || null) {
            $this->Mes('请先登录', './login');
        }
        // function userLogout(){
        //     $_SESSION=array();
        //     if(isset($_COOKIE[session_name()])){
        //         setcookie(session_name(),"",time()-1);
        //     }
        //     session_destroy();
        //     header("location:login");
        // }
        if ($_POST['drop']) {
            $this->userLogout();
        }

        $total = $name->count();
        $Page = new \Think\Page($total, 3);
        $show = $Page->show();
        if (!empty($_POST)) {
            $grade = $_POST['grade'];
            $groups = $_POST['groups'];
            $n = $_POST['name'];
            $info = $name->where("grade='$grade' or groups='$groups'or name='$n' or(grade='$grade' and groups='$groups')or(grade='$grade' and name='$n')or(name='$n' and groups='$groups')or(grade='$grade' and groups='$groups'and name='$n')")->select();
        } else {
            $info = $name->limit($Page->firstRow . ',' . $Page->listRows)->select();
        }
        $this->assign('time',date("Y"));
        $this->assign('info', $info);
        $this->assign('page', $show);
        $this->display();
    }

    public function login()
    {
        $result = array(
            array('name', 'require', '用户名必须填写'),
            array('password', 'require', '密码必须填写'),
        );
        $user = new \Model\GreatestModel;

        if (!empty($_POST)) {
            $username = $_POST['username'];
            $status = $user->where("username='$username'")->find();
            if ($status['status'] == 'pass') {
                if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['verify'])) {
                    $this->Mes("用户名密码和验证码均不能为空", 'login');
                }
                $verify = new \Think\Verify();
                if (!$verify->check($_POST['verify'])) {
                    $this->Mes("验证码错误", 'login');
                } else {
                    $res = $user->validate($result)->checkNamePwd($_POST['username'], $_POST['password']);
                    if ($res === false) {
                        $this->Mes("登录失败", 'login');
                    } else {
                        //登录信息持久化
                        session('id', $res['id']);
                        session('username', $res['username']);
                        session('password', $res['password']);
                        $this->Mes("登录成功", 'add');
                    }
                }
            } elseif ($status['status'] == 'on') {
                $this->Mes("审核中。。。", 'login');
            } else {//Mes($mes,$url){
                $this->Mes("已被管理员限制权限", 'login');
            }
        }
        $this->display();
    }

    public function detail()
    {
        $username = session('username');
        if ($_POST) {
            $res = $this->CheckSession();
            $username = $res['username'];
            if ($username) {
                session('username', $username);
            } else {
                $username = session('username');
            }
            if (!empty($_POST['commit'])) {
                $id['id'] = I('post.uid');
                $conf = M('bbs')->where($id)->find();
                if ($conf['conf'] === 'on') {
                    $comm = array(
                        'pid' => I('post.pid'),
                        'uid' => I('post.uid'),
                        'name' => $res['name'],
                        'grade' => $res['grade'],
                        'tc_group' => $res['groups'],
                        'content' => I('post.content'),
                        'date' => time()
                    );
                    $this->addComment($comm);
                } else {
                    $this->Mes_go('此贴，禁止评论');

                }
            }
            if (!empty($_POST['response'])) {
                $comm = array(
                    'pid' => I('post.pid'),//评论人的
                    'uid' => I('post.uid'),//帖子的id
                    'name' => $res['name'],
                    'grade' => $res['grade'],
                    'tc_group' => $res['groups'],
                    'content' => I('post.content'),
                    'date' => time()

                );
                $this->addComment($comm);
            }
            if (!empty($_POST['search'])) {
                $cont = I('post.content');
                $content['content'] = array('LIKE', "%$cont%");
                $bbs = M('bbs')->order("id DESC")->limit($page->firstRow . ',' . $page->listRows)->where($content)->select();
                $total = count($bbs);
                $page = new \Think\Page($total, 2);
                $show = $page->show();
                $this->assign('pagelist', $show);
                $this->assign('info', $bbs);
                $this->display();
            }

        } else {
            $this->ContentList();
            $com = $this->CommentList($pid = 0, $commentlist = array(), $spac = 0);
            $this->assign('comment', $com);

            // $this->assign('name',$username);
            $this->display();
        }


    }

    public function addComment($comm)
    {
        $inf = M('bbscof')->add($comm);
        if ($inf) {
            $this->Mes_go('评论成功!');
        } else {
            $this->Mes_go('评论失败');
        }
    }

    public function ContentList()
    {
        $total = M('bbs')->count();

        $page = new \Think\Page($total, 2);
        $show = $page->show();

        $bbs = M('bbs')->order("id DESC")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('pagelist', $show);
        $this->assign('info', $bbs);

    }

    public function CommentList($pid = 0, &$commentlist = array(), $spac = 0)
    {
        static $i = 0;
        $spac = $spac + 1;//field('id','pid','name','grade','tc_group','conf','title','content')
        $List = M('bbscof')->where(array('pid' => $pid))->order("id DESC")->select();
        // var_dump($List);
        foreach ($List as $k => $v) {
            $commentlist[$i]['level'] = $spac;//评论层级
            $commentlist[$i]['id'] = $v['id'];//评论层级
            $commentlist[$i]['pid'] = $v['pid'];//评论层级
            $commentlist[$i]['uid'] = $v['uid'];//评论层级
            $commentlist[$i]['name'] = $v['name'];//评论层级
            $commentlist[$i]['grade'] = $v['grade']; //评论层级
            $commentlist[$i]['tc_group'] = $v['tc_group'];//评论层级
            $commentlist[$i]['conf'] = $v['conf'];//评论层级
            $commentlist[$i]['title'] = $v['title'];//评论层级
            $commentlist[$i]['content'] = $v['content'];//评论层级
            $commentlist[$i]['date'] = $v['date'];//评论层级
            $i++;
            $this->CommentList($v['id'], $commentlist, $spac);

        }
        return $commentlist;
    }

    public function share()
    {
        $username = session('username');
        if (!empty($_POST)) {
            $res = $this->CheckSession();
            $username = $res['username'];
            session('username', $username);
            $in['pid'] = $_POST['pid'];
            $in['name'] = $res['name'];
            $in['grade'] = $res['grade'];
            $in['tc_group'] = $res['groups'];
            $in['name'] = $res['name'];
            $in['conf'] = $_POST['bbs_conf'];
            $in['title'] = $_POST['bbs_title'];
            $in['content'] = $_POST['bbs_content'];
            $in['date'] = time();
            $bbs = new \Model\bbsModel();
            $inns = $bbs->add($in);
            if ($inns) {
                $this->Mes_back('发表成功');
            } else {
                $this->Mes_back('发表失败');
            }
        }
        if ($_GET['lg']) {
            echo 888888;
            $this->userLogout();
        }
        $this->assign('time',date("Y"));
        $this->assign('name', $username);
        $this->display();

    }

}

    	