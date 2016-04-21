<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';


$sql = "UPDATE basvuru_durum SET durum=0, aciklama='Başvurular Kapalıdır' WHERE id=1";

if (mysqli_query($conn, $sql)) {
   
    header("Location: ../basvuru_kapat.php?success=1");
} else {
    header("Location: ../basvuru_kapat.php?error=0");
}

mysqli_close($conn);
?>