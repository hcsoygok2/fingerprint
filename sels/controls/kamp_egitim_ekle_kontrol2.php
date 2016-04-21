<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_GET);
$date= date('Y-m-d', strtotime($formfield6));
$date2= date('Y-m-d', strtotime($formfield7));
//tek tırnak girerse

$formfield5 = mysqli_real_escape_string($conn, $formfield5);

$formfield8 = mysqli_real_escape_string($conn, $formfield8);

$sql = "INSERT INTO kamp_egitim2 (kamp_id, name, bastarih, bitistarih)
VALUES ($kamp_id, '$formfield5', '$date', '$date2')";
if (mysqli_query($conn, $sql)) {
    

    header("Location: ../kamp_egitim_ekle2.php?success=1&kamp_id=".$kamp_id);
}
else {
    header("Location: ../kamp_egitim_ekle2.php?error=0&kamp_id=".$kamp_id);
}




mysqli_close($conn);
?>