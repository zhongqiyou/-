<?php
header("Content-type:text/html;charset=utf-8");

$link = @mysql_connect("localhost" , "root" , "");

$username = $_GET['username'];

if(!$link){
   echo "连接失败？？？<br/>";
}

mysql_select_db("wx" , $link);

$sql_insert = "delete from register where `username`='$username'";

$res_select =  mysql_query($sql_insert);

if($res_select){
    echo "删除成功";
}else{
    echo "删除失败";
}
?>