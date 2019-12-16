<?php
header("Content-type:text/html;charset=utf-8"); 
 

$link = @mysql_connect("localhost" , "root" , "");

$user = $_GET['user'];
$isDefault = $_GET['isDefault'];


if(!$link){
    echo "连接失败";
}

mysql_select_db("wx" , $link);

$sql_select = "select * from addr where `isDefault`='$isDefault' and `user`='$user'";

$res_select = mysql_query($sql_select);


$arr = array();

for($i = 0;$i <  mysql_num_rows($res_select); $i++){
    $arr[$i] = mysql_fetch_assoc($res_select);
}

$str =  json_encode($arr);
echo $str;
 


?>