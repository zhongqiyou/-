<?php
$link = @mysql_connect("localhost" , "root" , "");

$check = $_GET['check'];




if(!$link){
    echo "连接失败";
}

mysql_select_db("wx" , $link);

$sql = "update crat set `check`='$check'";
$res_sql = mysql_query($sql);
    if(!$res_sql){
        echo "服务器出错";
        exit;
    }

?>