<?php
header("Content-type:text/html;charset=utf-8");

$link = @mysql_connect("localhost" , "root" , "");

$id = $_GET['id'];
$shop = $_GET['shop'];
$primary = $_GET['primary'];
$price = $_GET['price'];
$discount = $_GET['discount'];
$volume = $_GET['volume'];
$src = $_GET['src'];
$title = $_GET['title'];



if(!$link){
   echo "连接失败？？？<br/>";
}

mysql_select_db("wx" , $link);

$sql = "update  details set `shop`='$shop' , `primary`='$primary' , `price`='$price' , `discount`='$discount' , `volume`='$volume' , `src`='$src' , `title`='$title'  where `id`='$id'";

$res_sql =  mysql_query($sql);

if($res_sql){
    echo "修改成功";
}else{
    echo "删除失败";
}