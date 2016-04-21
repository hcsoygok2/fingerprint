<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';


extract($_GET);
$sql = "UPDATE users SET name='$formfield5', surname='$formfield6', path='$formfield7',mail='$formfield10' WHERE id=".$id;

if (mysqli_query($conn, $sql)) {
    
   
   
    header("Location: ../user_edit.php?success=1");
} else {
    header("Location: ../user_edit?error=0");
}

mysqli_close($conn);
?>