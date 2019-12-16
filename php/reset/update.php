<?php
header("Content-type:text/html;charset=utf-8"); 
 
$username = $_GET["username"];
$password = $_GET["password"];



$link = @mysql_connect("localhost" , "root" , "");

if(!$link){
    echo "连接失败";
}

mysql_select_db("wx" , $link);


$sql = "select `username` from  register where `username`='$username'";
$res_sql = mysql_query($sql);

if(!$res_sql){
     echo "错误";
}

if(mysql_num_rows($res_sql)){
   $sql = "update register set `password`='$password' where `username`='$username'";
    $res_sql = mysql_query($sql);
    if(!$res_sql){
        echo "服务器出错";
        exit;
    }
     echo "恭喜你 , 密码重置完成";
}else{
    echo "用户不存在 , 请重试";
}







?>