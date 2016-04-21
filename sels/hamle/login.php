<?php 
include_once 'database/db_connect.php';
include_once 'database/functions.php';

ob_start();
session_start();
 
$eposta = $_POST['eposta'];
$sifre = $_POST['sifre'];
 
$sql = "select * from uyeler where posta='".$eposta."' and password='".$sifre."'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0){
     $row = $result->fetch_assoc();
     $_SESSION["type"]=$row["type"];
     $_SESSION["id"]=$row["id"];
    $_SESSION["login"] = "true";
    $_SESSION["status"] = $row["status"];
    $_SESSION["user"] = $eposta;
    $_SESSION["pass"] = $sifre;
    if($row["type"]==0){
        header("Location:anasayfa.php");
    }
    else  if($row["type"]==1){
        header("Location:projeler.php");
    }
    else  if($row["type"]==2){
        header("Location:projeler.php");
    }
    
}
else {
    if($kadi==" " or $sifre==" ") {
        echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
		
    header("Location:index.php");
    }
    else {
        echo "<center>Kullanici Adi/Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Don</a></center>";
		header("Refresh: 2; url=index.php");
    }
}
 
ob_end_flush();
?>