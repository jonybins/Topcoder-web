<?php
/* 
* @Author: anchen
* @Date:   2017-04-18 10:08:02
* @Last Modified by:   anchen
* @Last Modified time: 2017-04-18 10:11:39
*/

namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{
    public function verifyImg()
    {
        $config = array(
            'imageH' => 50,
            'imageW' => 130,
            'fontSize' => 20,
            'fontttf' => '4.ttf',
            'bg' => array(243, 255, 150),
            'length' => 4,
        );
        $verify = new \Think\Verify($config);
        $verify->entry();
    }

    public function userLogout()
    {
        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), "", time() - 1);
        }
        session_destroy();
        header("location:login");
    }

    public function CheckSession()
    {
        if (!empty(session('id'))) {
            $greatest = new \Model\GreatestModel();
            $p['id'] = array('EQ', session('id'));
            $res = $greatest->where($p)->find();
            if ($res['name'] == '' || null) {
                if ($res['grade'] == '' || null) {
                    $this->Mes('请完善您的信息后，再来发表或评论吧', add);
                }
                $this->Mes('请完善您的信息后，再来发表或评论吧', add);
            } else {
                return $res;
            }
        } else {
            $this->Mes('请登陆后，再来发表', login);
        }
    }

    public function Mes($mes, $url)
    {
        echo "<script>alert('$mes');window.location.href='$url';</script>";
    }

    public function Mes_back($mes)
    {
        echo "<script>alert('$mes');history.back(-1);</script>";
    }

    public function Mes_go($mes)
    {
        echo "<script>alert('$mes');history.go(1);</script>";
        echo '<meta http-equiv="refresh" content="1"/>';
    }

}
