<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_GET);
print_r($_GET);


 for($i=0; $i<count($my_multi_select2); $i++){
   
   $sql3 =  "INSERT INTO kamp_proje (kamp_id, tc) VALUES (".$kamp_id.", '".$my_multi_select2[$i]."')";

   if(!mysqli_query($conn, $sql3)){
       header("Location: ../grup.php?error=1&id=".$kamp_id);
   }
    }
    header("Location: ../grup.php?success=1&id=".$kamp_id);