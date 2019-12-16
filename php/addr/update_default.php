<?php
header("Content-type:text/html;charset=utf-8");

$link = @mysql_connect("localhost" , "root" , "");

$user = $_GET['user'];
$isDefault = $_GET['isDefault'];



if(!$link){
   echo "连接失败？？？<br/>";
}

mysql_select_db("wx" , $link);

$sql = "update  addr set `isDefault`='$isDefault'  where `user`='$user'";

$res_sql =  mysql_query($sql);

if($res_sql){
    echo "修改成功";
}else{
    echo "删除失败";
}



?>