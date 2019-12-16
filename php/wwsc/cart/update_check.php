 <?php
$link = @mysql_connect("localhost" , "root" , "");

$check = $_GET['check'];
$id = $_GET["id"];
$user = $_GET['user'];

echo $check;

echo "`````````````````````````````";

echo $id;

echo "`````````````````````````````";

echo $user;


if(!$link){
    echo "连接失败";
}

mysql_select_db("wx" , $link);

$sql = "update crat set `check`='$check' where `id`='$id' and `user`='$user'";
$res_sql = mysql_query($sql);
    if(!$res_sql){
        echo "服务器出错";
        exit;
    }


?>