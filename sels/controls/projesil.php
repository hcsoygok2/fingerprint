<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';


extract($_GET);

$sql_copy="INSERT INTO proje_basvuru_silinen
SELECT *
FROM proje_basvuru
WHERE id=$id;";
if (mysqli_query($conn, $sql_copy)) {
    $sql = "DELETE FROM proje_basvuru
WHERE id=$id;";

if (mysqli_query($conn, $sql)) {
    header("Location: ../projeler.php?success=2");
} else {
    header("Location: ../projeler.php?error=2");
}
} else {
    header("Location: ../projeler.php?error=1");
}


mysqli_close($conn);
?>
