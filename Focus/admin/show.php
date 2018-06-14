<?php 
require_once '../include.php';
$page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
$sql="select * from img";
$totalRows=getResultNum($sql);
$pageSize=8;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select id,album from img  order by id desc limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <link href="../CSS/show.css" type="text/css" rel="stylesheet">
      <link href="../CSS/gonggong3.css" type="text/css" rel="stylesheet">
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>

      <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
      <title>作品展示</title>
    </head>
    <body>
    <div class="top">
    <center><span>You are the best to the world</span></center>
    </div>
    <div class="logobar">
        <a href="index1.html"><img src="../images/111.jpg" width="100px" height="80px" class="logobar_img"></a><span class="logobar_text">Focus</span>
        <div class="user"></div>
    </div>
    <div class="nav_box">
        <ul class="nav">
           <a href="index1.html"><li class="nav_li"><center><span class="nav_text">首页</span></center></li></a>
            <a href="personal.php"><li class="nav_li"><center><span class="nav_text">个人主页</span></center></li></a>
            <!-- <a href="discuss.php"><li class="nav_li"><center><span class="nav_text">讨论区</span></center></li></a> -->
            <a href="show.php"><li class="nav_li"style="background-color:#D00355;"><center><span class="nav_text">作品展示</span></center></li></a>
            <a href="home.html"><li class="nav_li"><center><span class="nav_text">人物</span></center></li></a>
            <a href="city.html"><li class="nav_li"><center><span class="nav_text">城市</span></center></li></a>
            <a href="nature.html"><li class="nav_li" ><center><span class="nav_text">自然</span></center></li></a>
            <a href="sheying.html"><li class="nav_li"><center><span class="nav_text">摄影名人</span></center></li></a>
        </ul>
    </div>
    <div class="collect">
        <span class="collect_text1">It doesn't look like that page is here.</span>
        <span class="collect_text2">摄影即生活，每一天都是一份礼物。请点击这里上传你的作品。</span>
       <!--  <a href="javascript:void(0)" onclick="document.getElementById('main').style.display='block'; document.getElementById('shang').style.display='block';"><button style="height:30px; width:120px; font-size:20px; color:#333; border:1px solid #333; text-align:center; line-height:30px; opacity:0.8; background:#CCC; position:absolute; top:45%; left:50%;">上传作品</button></a> -->
       <div style="width: 100%;height: 100vh;position: relative;">
            <form id="upBox" action="doImg.php" method="post" enctype="multipart/form-data">
                 <div id="inputBox"><input type="file" title="请选择图片" id="file" name="myFile[]" multiple/>点击选择图片</div>
                 <div id="imgBox"></div>
                 <input id="btn" type="submit" name="submit" value="上传作品">
            </form>
        </div>
        <script src="../js/uploadImg.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
            imgUpload({
                inputId:'file', //input框id
                imgBox:'imgBox', //图片容器id
                buttonId:'btn', //提交按钮id
                upUrl:'php/imgFile.php',  //提交地址
                data:'file1', //参数名
                num:"3"//上传个数
            })
        </script>
        <div class="triangle"></div>
        <span class="collect_text3">优秀作品将会得到展示</span>
        <div class="triangle1"></div>
        <span class="collect_text4">优秀作品将会得到展示</span>
    </div>
    <div class="br_50"></div>
    <div class="box">
        <center><span class="box_tit">优 秀 作 品 展 示</span></center>
        <div class="img">
        <div class="img01">
            <a href="discuss.php"><div class="on01">
            <center><span>by Jared Lim</span></center>
            </div></a>
        </div>
        <div class="img02">
            <a href="discuss.php"><div class="on02">
            <center><span>by Popp-Hackner</span></center>
            </div></a>
        </div>
        <div class="img03">
            <a href="discuss.php"><div class="on03">
            <center><span>by bulgdog</span></center>
            </div></a>
        </div>
        </div>
        <div class="box_text01">
            <center><span>Jared Lim作品，群鸟</span></center>
        </div>
        <div class="box_text02">
            <center><span>Popp-Hackner作品，山水相映</span></center>
        </div>
        <div class="box_text03">
            <center><span>bulgdog作品，深山蘑菇</span></center>
        </div>
        <div class="img">
        <div class="img04">
            <div class="on04">
            <center><span>by Robert </span></center>
            </div>
        </div>
        <div class="img05">
            <div class="on05">
            <center><span>by Ralph Lee </span></center>
            </div>
        </div>
        <div class="img06">
            <div class="on06">
            <center><span>by Micheldog</span></center>
            </div>
        </div>
        </div>
        <div class="box_text04">
            <center><span>Robert作品，龙卷风</span></center>
        </div>
        <div class="box_text05">
            <center><span>Ralph Lee作品，北极熊</span></center>
        </div>
        <div class="box_text06">
            <center><span>Micheldog作品，斑马一家</span></center>
        </div>
        <div class="br_30"></div>
    </div>

    <div class="box2" style="position:relative;">
        <center><span class="box_tit">上 传 作 品 栏</span></center>
        <?php foreach($rows as $row):?>
        <div class="img">
            <a href="discuss.php?filename=<?php echo $row['album']?>"><img src="../uploads/<?php echo $row['album']?>" class="up1"></a>
        </div>
            <?php endforeach;?>
                        <?php if($totalRows>$pageSize):?>
                            <div style="position:absolute; top:90%; left:30%; font-size:18px; font-family:楷体;">
                              <tr>
                                <td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                              </tr>
                            </div>
                        <?php endif;?>   
    </div>
    </body>
</html>