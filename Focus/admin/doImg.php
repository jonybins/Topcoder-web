<?php
/* 
* @Author: anchen
* @Date:   2018-01-12 10:27:53
* @Last Modified by:   anchen
* @Last Modified time: 2018-01-13 18:22:18
*/
require_once '../lib/string.func.php';
require_once '../lib/mysql.func.php';
require_once '../include.php';
header("content-type:text/html;charset=utf-8");
//print_r($_FILES);
/**
 * 
 *构建上传文件信息
 * @return [type] [description]
 */
function buildInfo(){
    $i=0;
    foreach($_FILES as $v){
        //单文件
        if (is_string($v['name'])) {
            $files[$i]=$v;
            $i++;
        }else{
            //多文件
        foreach($v['name'] as $key=>$val){
            $files[$i]['name']=$val;
            $files[$i]['size']=$v['size'][$key];
            $files[$i]['tmp_name']=$v['tmp_name'][$key];
            $files[$i]['error']=$v['error'][$key];
            $files[$i]['type']=$v['type'][$key];
            $i++;
            }
        }
    }
    return $files;
}
// $info=buildInfo();
// print_r($info);
function uploadFile($path="../uploads",$allowExt=array("gif","jpeg","png","jpg","wbmp"),$maxSize=2097152,$imgFlag=true){
    if (file_exists($path)){
        @mkdir($path,0777,true);
    }
    $i=0;
    $files=buildInfo();
    foreach($files as $file){
        if($file['error']==UPLOAD_ERR_OK){
            $ext=getExt($file['name']);
            //检查文件的扩张名
            if(!in_array($ext,$allowExt)){
                exit("非法文件类型");
            }
            //校验是否是真正的图片类型
            if ($imgFlag){
                if (!getimagesize($file['tmp_name'])){
                    exit("不是真正的图片类型");
                }
            }
            //上传文件的大小
                if ($file['size']>$maxSize){
                    exit("上传文件过大");
                }
                // if(!is_uploaded_file($file['tmp_name']){
                // exit("不是通过HTTP POST方式上传上来的");
                // }
                if(!is_uploaded_file($file['tmp_name'])){
                exit("不是通过HTTP POST方式上传上来的");
            }
         $filename=getUniName().".".$ext;
         $destination=$path."/".$filename;
         if (move_uploaded_file($file['tmp_name'], $destination)){
                    $file['name']=$filename;
            unset($file['error'],$file['tmp_name'],$file['size'],$file['type']);
                    $uploadedFiles[$i]=$file;
                    $i++;
                }       
        }else{
             switch($file['error']){
                case 1:
                    $mes="超过了配置文件上传文件的大小";//UPLOAD_ERR_INI_SIZE
                    break;
                case 2:
                    $mes="超过了表单设置上传文件的大小";          //UPLOAD_ERR_FORM_SIZE
                    break;
                case 3:
                    $mes="文件部分被上传";//UPLOAD_ERR_PARTIAL
                    break;
                case 4:
                    $mes="没有文件被上传";//UPLOAD_ERR_NO_FILE
                    break;
                case 6:
                    $mes="没有找到临时目录";//UPLOAD_ERR_NO_TMP_DIR
                    break;
                case 7:
                    $mes="文件不可写";//UPLOAD_ERR_CANT_WRITE;
                    break;
                case 8:
                    $mes="由于PHP的扩展程序中断了文件上传";//UPLOAD_ERR_EXTENSION
                    break;    
            }
            echo $mes;
        }
    }
    return $uploadedFiles;
}
$fileInfo=uploadFile();
print_r($fileInfo);
    $i=0;
    foreach($_FILES as $v){
        foreach($v['name'] as $key=>$val){
            $i++;
            }
        }
            for($j=0;$j<=$i-1;$j++)
            {
                $arr=array("album"=>"{$fileInfo[$j]['name']}");
               if(insert("img", $arr))
               {
                alertMes("上传成功！","../admin/show.php");
               }else
               {
                alertMes("上传失败，请重新上传！","../admin/show.php");
               }
            };
        