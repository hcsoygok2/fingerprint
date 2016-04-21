<?php 
 

ob_start();
 include_once 'database/db_connect.php';
include_once 'database/functions.php';
session_start();
 
$kadi = $_POST['log'];
$sifre = $_POST['pwd'];
 
$sql_check = mysqli_query($conn,"select * from admin where name='".$kadi."' and password='".$sifre."' ") or die(mysqli_error());
 
if(mysqli_num_rows($sql_check))  {
    $_SESSION["login"] = "true";
    $_SESSION["user"] = $kadi;
    $_SESSION["pass"] = $sifre;
    header("Location:main.php");
}
else {
    if($kadi=="" or $sifre=="") {
        echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
    else {
        echo "<center>Kullanici Adi/Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
		
    }
}
 
ob_end_flush();
?>