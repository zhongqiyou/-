<?php
header("Content-type:text/html;charset=utf-8"); 
 
$link = @mysql_connect("localhost" , "root" , "");

$number = $_GET['number'];
$id = $_GET["id"];
$user = $_GET['user'];




if(!$link){
    echo "连接失败";
}

mysql_select_db("wx" , $link);

$sql = "update crat set `number`='$number' where `id`='$id' and `user`='$user'";
$res_sql = mysql_query($sql);
    if(!$res_sql){
        echo "服务器出错";
        exit;
    }
