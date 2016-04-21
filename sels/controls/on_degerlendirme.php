<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_GET);
$sql = "UPDATE proje_basvuru SET seviye=0 WHERE id=".$id;

if (mysqli_query($conn, $sql)) {
    
    header("Location: ../projeler.php?success=1");
} else {
    header("Location: ../projeler.php?error=0");
}

mysqli_close($conn);
?>