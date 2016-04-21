<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';


extract($_GET);
$sql = "DELETE FROM users
WHERE id=$id;";

if (mysqli_query($conn, $sql)) {
    header("Location: ../users.php?success=2");
} else {
    header("Location: ../users.php?error=2");
}

mysqli_close($conn);
?>