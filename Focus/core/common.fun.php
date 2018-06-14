<?php
/* 
* @Author: anchen
* @Date:   2017-04-11 19:41:20
* @Last Modified by:   anchen
* @Last Modified time: 2017-04-11 19:43:13
*/
function alertMes($mes,$url){
     echo "<script>alert('{$mes}');</script>";
     echo "<script>window.location='{$url}';</script>";
?>
