<?php
header("Content-type:text/html;charset=utf-8"); 
 
$username = $_GET["username"];
$password = $_GET["password"];



$link = @mysql_connect("localhost" , "root" , "");

if(!$link){
    echo "连接失败";
}

mysql_select_db("wx" , $link);

$sql_select = "select username from register";
$sql = "insert register (`username` , `password`) values ('$username' , '$password')";




$res_select = mysql_query($sql_select);
$res_select_length = mysql_num_rows($res_select);
 
for($i = 0; $i < $res_select_length; $i++){
    if(mysql_fetch_row($res_select)[0] == $username){
             echo "用户已注册过 , 请用另用";
             exit;
    }
}

$res_sql = mysql_query($sql);
if($res_sql){
      echo "恭喜你 注册成功!!!";
      exit;
}







?>