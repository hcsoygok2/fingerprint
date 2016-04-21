<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';


$sql = "UPDATE asama SET asama=3, tanim='3. Aşama (Final)' WHERE id=1";

if (mysqli_query($conn, $sql)) {
   
    header("Location: ../asama.php?success=1");
} else {
    header("Location: ../asama.php?error=0");
}

mysqli_close($conn);
?>