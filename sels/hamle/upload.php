<?php
$ds          = DIRECTORY_SEPARATOR;  //1
 echo $ds;
$storeFolder = 'uploads';   //2
 print_r($_FILES['file']['tmp_name']);
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
    print_r($tempFile);
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
     
}
?>     
