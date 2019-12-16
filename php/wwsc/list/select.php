<?php
header("Content-type:text/html;charset=utf-8");

$link = @mysql_connect("localhost" , "root" , "");

if(!$link){
   echo "连接失败？？？<br/>";
}

mysql_select_db("wx" , $link);

$sql_insert = "select * from details";

$res_select =  mysql_query($sql_insert);

if(!$res_select){
   echo "服务器 ，出错"; 
}

$arr = array();

for($i = 0;$i < mysql_num_rows($res_select); $i++){
    $arr[$i] = mysql_fetch_assoc($res_select);
}

$str =  json_encode($arr);
echo $str;
?>