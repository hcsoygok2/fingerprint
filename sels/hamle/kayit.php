<?php 
 
include("ayar.php");
ob_start();
session_start();
 
 





$adi = $_POST['adi'];

$sadi = $_POST['sadi'];
$posta = $_POST['posta'];
$sifre = $_POST['sifre'];
$sifre2 = $_POST['sifre2'];

if($posta=="" || $sifre=="" || $sifre!=$sifre2) {
        
		
        header("Location:kayitform.php?error=1");
        
    }
    else{
        
 print_r($_FILES);
$target_dir = "uploads/profilepics/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("Location:index.php");
    } else {
        echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
}

$sql = "insert into uyeler (name, surname, password, posta, foto)
values ('$adi', '$sadi', '$sifre', '$posta', '".$_FILES["fileToUpload"]["name"]."')";
$kayit = mysql_query($sql);
 

if (isset ($kayit)){
echo "�ye Kayd�n�z Yap�lm��t�r";
header("Location:index.php?success=1");
}
else {
     
    
}

ob_end_flush();
    }
?>