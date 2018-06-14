<?php
require_once "../include.php";
checkLogined();
$page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
$sql="select * from message";
$totalRows=getResultNum($sql);
$pageSize=3;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select id,content from message  order by id desc limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="../css/discuss.css" type="text/css" rel="stylesheet">
    </head>
    <body>
    <div class="Top">
            <a href="index1.html"><img src="1.png" class="Top_img"></a>
            <img src="logo1.png" class="logo1">
            <div class="Top-bar"></div>
            <div class="Top-center" id="Top">
            </div>
            <div class="Top-right-button">
                <input type="checkbox" id="menu" />
                <label for="menu" class="menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
                <nav class="nav">
                    <ul>
                        <li><a href="index1.html">首页</a></li>
                        <li><a href="#">个人信息</a></li>
                        <!-- <li><a href="discuss.php">讨论区</a></li> -->
                        <li><a href="show.php">作品展示</a></li>
                        <li><a href="home.html">人物</a></li>
                        <li><a href="city.html">城市</a></li>
                        <li><a href="nature.html">自然</a></li>
                        <li><a href="sheying.html">摄影名人</a></li>
                    </ul>
                </nav>
            </div>
        </div>
<div><img src="../uploads/<?php echo $_GET['filename']?>" class="img_sc"></div>

    <form class="message" action="doAdminAction.php?act=addView" method="post">
        <span class="message_tit">请在这留下您对图片的评价:</span>
        <textarea class="message_text" placeholder="请在这里留言:" name="content"></textarea>
        <input type="submit" class="submit01" value="发 表 留 言">
    </form>
    <div class="show">
        <span class="show_tit">Message Show</span>
        <div class="hr"></div>
            <div class="show_main">
            <?php foreach($rows as $row):?>
            <div class="show1">
                <img src="show1.jpg" class="show1_img">
                <div class="show1_tit">DESIGN</div>
                <span><?php echo $row['content'] ?></span>
                <div class="right"><img src="more.png" class="more"></div>
            </div>
        <?php endforeach;?>
            
            <?php if($totalRows>$pageSize):?>
                            <div style="position:absolute; top:110%; left:30%; font-size:18px; font-family:楷体;">
                              <tr>
                                <td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                              </tr>
                            </div>
            <?php endif;?> 
        </div>
    </div>
    <!-- <div class="page">
                  <a href="#"><input type="submit" value="上一页" class="page_btn"/></a><a href="#"><input type="submit" class="ha" value="1"/></a><a href="#"><input type="submit" class="ha" value="2" /></a><a href="#"><input type="submit" class="ha" value="3" /></a><a href="#"><input type="submit" class="ha" value="4" /></a><a href="#"><input type="submit" class="ha" value="5" /></a><a href="#"><input type="submit" class="ha" value="6" /></a><a href="#"><input type="submit" class="ha" value="7" /></a><a href="#"><input type="submit" class="ha" value="..." /></a><a href="#"><input type="submit" value="下一页" class="page_btn"/></a><span class="moerPage">共200页，到第</span><input type="text" class="pageNum"><span class="ye">页</span>
                  <a href="discuss.html"><input type="button" value="确定" class="page_btn"></a>
               </div> -->

               <div class="jian">
             <span><img src="../images/26.jpg" height="30px" width="30px" alt="" onclick="Topfun()" /></span>
    </div>
    <script type="text/javascript">
     var four;

    function Topfun(){
        four=setInterval(Fourby,10);    
    }
    function Fourby(eachHeight){
      if(document.documentElement && document.documentElement.scrollTop)  //IE
        {
            if(document.documentElement.scrollTop<=0){
                clearInterval(four);
            }else{
                window.scrollBy(0,-30);
            }
          }else{          //Chrome不支持documentElement.scrollTop
            if(document.body.scrollTop<=0){
                clearInterval(four);
            }else{
                window.scrollBy(0,-30);
            }
        }
    }
 </script>

    </body>
</html>