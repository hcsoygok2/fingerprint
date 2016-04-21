<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';


extract($_GET);
$sql = "DELETE FROM kamp_egitim
WHERE id=$id;";

if (mysqli_query($conn, $sql)) {
    header("Location: ../grup.php?success=2");
} else {
    header("Location: ../grup.php?error=2");
}

mysqli_close($conn);
?>