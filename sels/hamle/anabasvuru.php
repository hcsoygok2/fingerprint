<?php 
 
ob_start();
session_start();
 include_once '../database/db_connect.php';
include_once '../database/functions.php';
 
 





$tc = $_POST['tc'];




        
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
   
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("Location:anasayfa.php");
    } else {
       
    }
}

$sql = "insert into proje_basvuru (basvuruform2)
values ( '".$_FILES["fileToUpload"]["name"]."') WHERE tc='.$tc ";
$kayit = mysql_query($sql);
 

if (isset ($kayit)){

header("Location:anasayfa.php?success=1");
}
else {
     header("Location:anasayfa.php?error=0");
    
}

ob_end_flush();
    
?>