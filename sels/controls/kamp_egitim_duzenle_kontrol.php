<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';


extract($_GET);
$sql = "UPDATE kamp_egitim SET name='$formfield5', bastarih='$formfield6', bitistarih='$formfield7'
WHERE id=".$id;

if (mysqli_query($conn, $sql)) {
   
    header("Location: ../grup.php?success=1");
} else {
    header("Location: ../grup.php?error=0");
}

mysqli_close($conn);
?>