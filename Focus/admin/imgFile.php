<?php
$fil = $_FILES['file1'];
print_r($fil);
//$num = print_r($fil);
//$imgName = "";
////遍历图片数组
//for($i=0;$i<count($fil['name']);$i++){
//	//获取图片类型并重命名
//	$imgType = explode("/",$fil['type'][$i])[1];
//	$imgN = "../img/".time().md5($fil['name'][$i]).'.'.$imgType;
//	//储存到本地
//	move_uploaded_file($fil['tmp_name'][$i], $imgN);
//	//拼接图片路径
//	$imgName = $imgName."|".$imgN;
//}
echo '成功';
?>