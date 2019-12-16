<?php
header("Content-type:text/html;charset=utf-8");
$keyword = $_GET["keyword"];



$link = @mysql_connect("localhost" , "root" , "");

if(!$link){
   echo "连接失败？？？<br/>";
}

mysql_select_db("wx" , $link);

$sql = "select * from details where `title` like '%$keyword%' order by `price` desc";

$res_sql =  mysql_query($sql);

if(!$res_sql){
   echo "服务器 ，出错";  
   exit;  
}

$arr = array();

for($i = 0;$i < mysql_num_rows($res_sql); $i++){
    $arr[$i] = mysql_fetch_assoc($res_sql);
}

$str =  json_encode($arr);
echo $str;

?>