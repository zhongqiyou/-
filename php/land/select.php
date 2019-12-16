<?php
header("Content-type:text/html;charset=utf-8");

$username = $_GET["username"];
$password = $_GET["password"];

$link = @mysql_connect("localhost" , "root" , "");

if(!$link){
  echo "连接失败";
}
 
mysql_select_db("wx" , $link);

$sql = "select `username` , `password` from  register where `username`='$username' and `password`='$password'";


$res_sql = mysql_query($sql);

if(!$res_sql){
     echo "错误";
}

if(mysql_num_rows($res_sql)){
     echo "登陆成功";
}else{
     echo "账号密码不匹配 , 请重试";
}
?>