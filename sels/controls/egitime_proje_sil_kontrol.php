<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';


extract($_GET);
$sql = "DELETE FROM kamp_proje
WHERE id=$id;";

if (mysqli_query($conn, $sql)) {
    header("Location: ../grup.php?success=2&id=".$kamp_id);
} else {
    header("Location: ../grup.php?error=2&id=".$kamp_id);
}

mysqli_close($conn);
?>