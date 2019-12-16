<?php
header("Content-type:text/html;charset=utf-8"); 
 
$username = $_GET["username"];


$link = @mysql_connect("localhost" , "root" , "");

if(!$link){
    echo "连接失败";
}

mysql_select_db("wx" , $link);

$sql = "insert user (`username`) values ('$username')";
$res_sql = mysql_query($sql);

if($res_sql){
      echo "插入成功";
      exit;
}


?>