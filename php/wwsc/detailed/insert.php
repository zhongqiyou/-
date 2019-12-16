<?php
header("Content-type:text/html;charset=utf-8"); 


$link = @mysql_connect("localhost" , "root" , "");
$shop = $_GET['shop'];
$primary = $_GET['primary'];
$price = $_GET['price'];
$discount = $_GET['discount'];
$volume = $_GET['volume'];
$src = $_GET['src'];
$title = $_GET['title'];


if(!$link){
    echo "连接失败";
}

mysql_select_db("wx" , $link);

$sql = "insert details (`title` , `price` , `primary` , `src` ,  `volume` ,  `discount` , `shop`) values ('$title' , '$price' , '$primary' , '$src' , '$volume' , '$discount' , '$shop')";

$res_sql = mysql_query($sql);
if($res_sql){
      echo "添加成功!!!";
      exit;
}

?>