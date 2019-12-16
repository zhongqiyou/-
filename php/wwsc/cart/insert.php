<?php
header("Content-type:text/html;charset=utf-8"); 
 
$user = $_GET["user"];
$src = $_GET["src"];
$title = $_GET["title"];
$detailed = $_GET["detailed"];
$price = $_GET["price"];




$link = @mysql_connect("localhost" , "root" , "");

if(!$link){
    echo "连接失败";
}

mysql_select_db("wx" , $link);

$sql_select = "select `title` from crat where `user`='$user'";
$sql = "insert crat (`user` , `src` , `title` , `detailed` , `price`) values ('$user' , '$src' , '$title' , '$detailed' , '$price')";



$res_select = mysql_query($sql_select);
$res_select_length = mysql_num_rows($res_select);
 
for($i = 0; $i < $res_select_length; $i++){
    if(mysql_fetch_row($res_select)[0] == $title){
             echo "商品已在购物车 ，亲";
             exit;
    }
}

$res_sql = mysql_query($sql);
if($res_sql){
      echo "加入成功";
      exit;
}







?>