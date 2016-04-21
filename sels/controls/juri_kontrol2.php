<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';


extract($_GET);
$sql = "UPDATE uyeler SET name='$formfield5', surname='$formfield6', password='$formfield8',posta='$formfield11',department='$formfield7',phone='$formfield10'
WHERE id=".$id;

if (mysqli_query($conn, $sql)) {
    for($i=0; $i<count($my_multi_select2); $i++){
   
   $sql3 =  "INSERT INTO juri_proje2 (juri_id, proje_tc) VALUES (".$id.", '".$my_multi_select2[$i]."')";
   
   mysqli_query($conn, $sql3);
    }
    header("Location: ../juri_ekle2.php?success=1");
} else {
    header("Location: ../juri2.php?error=0");
}

mysqli_close($conn);
?>