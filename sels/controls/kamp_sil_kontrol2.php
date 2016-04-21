<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';


extract($_GET);
$sql = "DELETE FROM kamp2
WHERE id=$id;";

if (mysqli_query($conn, $sql)) {
    header("Location: ../egitim2.php?success=2");
} else {
    header("Location: ../egitim2.php?error=2");
}

mysqli_close($conn);
?>