<?php
header("Content-type:text/html;charset=utf-8");

$link = @mysql_connect("localhost" , "root" , "");

if(!$link){
   echo "连接失败？？？<br/>";
}

mysql_select_db("wx" , $link);

$sql_insert = "select * from user";

$res_select =  mysql_query($sql_insert);

if($res_select){
    echo mysql_fetch_row($res_select)[0];
}else{
    echo "查询失败？？？<br/>";
}


?>