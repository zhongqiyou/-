<?php
header("Content-type:text/html;charset=utf-8"); 
 

$link = @mysql_connect("localhost" , "root" , "");

$user = $_GET['user'];

if(!$link){
    echo "连接失败";
}

mysql_select_db("wx" , $link);

$sql_select = "select * from crat where `user`='$user'";

$res_select = mysql_query($sql_select);

$res_select_length = mysql_num_rows($res_select);

echo $res_select_length;
 


?>