<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_GET);
$date= date('Y-m-d', strtotime($formfield6));
$date2= date('Y-m-d', strtotime($formfield7));
//tek tırnak girerse

$formfield5 = mysqli_real_escape_string($conn, $formfield5);



$sql = "INSERT INTO kamp2 (name, bastarih, bitistarih,description)
VALUES ('$formfield5', '$date', '$date2','$formfield10')";
if (mysqli_query($conn, $sql)) {
    

    header("Location: ../kamp_ekle2.php?success=1");
}
else {
   //header("Location: ../kamp_ekle2.php?error=0");
}




mysqli_close($conn);
?>