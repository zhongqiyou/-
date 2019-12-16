<?php
header("Content-type:text/html;charset=utf-8");

$link = @mysql_connect("localhost" , "root" , "");
$id = $_GET['id'];
$user = $_GET['user'];
$name = $_GET["name"];
$tel = $_GET["tel"];
$addressDetail = $_GET['addressDetail'];
$city = $_GET['city'];
$county = $_GET['county'];
$postalCode = $_GET['postalCode'];
$province = $_GET['province'];
$address = $_GET['address'];
$isDefault = $_GET['isDefault'];







if(!$link){
   echo "连接失败？？？<br/>";
}

mysql_select_db("wx" , $link);

$sql = "update  addr set `address`='$address' , `name`='$name' , `tel`='$tel' , `addressDetail`='$addressDetail' , `city`='$city' , `county`='$county' , `postalCode`='$postalCode' , `isDefault`='$isDefault' , `province`='$province' where `id`='$id' and `user`='$user'";

$res_sql =  mysql_query($sql);

if($res_sql){
    echo "修改成功";
}else{
    echo "删除失败";
}



?>