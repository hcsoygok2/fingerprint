<?php 
 
ob_start();
session_start();
 include_once '../database/db_connect.php';
include_once '../database/functions.php';
 
 





extract($_POST);




        
 print_r($_FILES);
$target_dir = "../uploads/profilepics/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists

// Check file size
if ($_FILES["foto"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   
// if everything is ok, try to upload file
} else {move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    
       $sql = "UPDATE uyeler SET name='$formfield5', surname='$formfield6', password='$formfield8',posta='$formfield11',foto='".$_FILES["foto"]["name"]."'
WHERE id=".$id;
       // echo $sql;
$result = $conn->query($sql);

header("Location:../hesap.php?success=1");

     

}



ob_end_flush();
    
?>