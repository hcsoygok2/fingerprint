<?php
$host="localhost";
$db="hacettepehamledb";
$user="hacettepehamle";
$pass="Natro123";
$conn=@mysql_connect($host,$user,$pass) or die("Mysql Baglanamadi");
 
mysql_select_db($db,$conn) or die("Veritabanina Baglanilamadi");
mysql_query("SET NAMES UTF8");
mysql_set_charset('utf8',$conn);
?>

