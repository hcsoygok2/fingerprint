<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_GET);

//tek tırnak girerse

$formfield5 = mysqli_real_escape_string($conn, $formfield5);

$formfield8 = mysqli_real_escape_string($conn, $formfield8);

$sql = "INSERT INTO users (name, surname, path,mail,method)
VALUES ('$formfield5', '$formfield6', '$formfield7','$formfield10','3')";
if (mysqli_query($conn, $sql)) {
    
   
   
    header("Location: ../user_add.php?success=1");
} else {
    header("Location: ../user_add?error=0");
}

mysqli_close($conn);
?>