<?php
header("Content-type:text/html;charset=utf-8");

$id = $_GET["id"];

$link = @mysql_connect("localhost" , "root" , "");

if(!$link){
   echo "连接失败？？？<br/>";
}

mysql_select_db("wx" , $link);

$sql = "select * from details where `id`='$id'";



$res_sql =  mysql_query($sql);

if(!$res_sql){
   echo "服务器 ，出错";    
}

$arr = array();

for($i = 0;$i < mysql_num_rows($res_sql); $i++){
    $arr[$i] = mysql_fetch_assoc($res_sql);
}

$str =  json_encode($arr);
echo $str;
?>