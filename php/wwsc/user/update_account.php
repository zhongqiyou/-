<?php
header("Content-type:text/html;charset=utf-8");

$link = @mysql_connect("localhost" , "root" , "");

$username = $_GET['username'];
$password = $_GET['password'];


if(!$link){
   echo "连接失败？？？<br/>";
}

mysql_select_db("wx" , $link);

$sql = "update register set `password`='$password' where `username`='$username'";

$res_select =  mysql_query($sql);

if($res_select){
    echo "修改成功";
}
?>