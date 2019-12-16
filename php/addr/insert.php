<?php
header("Content-type:text/html;charset=utf-8"); 
 
$name = $_GET["name"];
$tel = $_GET["tel"];
$address = $_GET["address"];
$code = $_GET["code"];
$addrbool = $_GET["addrbool"];
$user = $_GET["user"];
$addressDetail = $_GET['addressDetail'];
$areaCode = $_GET['areaCode'];
$city = $_GET['city'];
$county = $_GET['county'];
$postalCode = $_GET['postalCode'];
$province = $_GET['province'];
$isDefault = $_GET['isDefault'];




$link = @mysql_connect("localhost" , "root" , "");

if(!$link){
    echo "连接失败";
}

mysql_select_db("wx" , $link);

$sql = "insert addr (`name` , `tel` , `address` , `code` , `addrbool` , `user` , `addressDetail` , `areaCode` , `city` , `county` , `postalCode` , `province` , `isDefault`) values ('$name' , '$tel' , '$address' , '$code' , '$addrbool' , '$user' , '$addressDetail' , '$areaCode' , '$city' , '$county' , '$postalCode' , '$province' , '$isDefault')";


$res_sql = mysql_query($sql);
if($res_sql){
      echo "新增成功";
      exit;
}

?>