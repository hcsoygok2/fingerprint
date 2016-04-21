<?php
ob_start();
session_start();
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

if(isset($_SESSION["return_form_elements"]["result"])){
    $form=$_SESSION["return_form_elements"];
    
    print_r($form);
    
        
    
$sql_select= "SELECT * FROM proje_basvuru WHERE tc='".$form["tc"]."'";
$result_select=$conn->query($sql_select);
if ($result_select->num_rows > 0) {
    $row_select=$result_select->fetch_assoc();
   $previous_result=$row_select["asama"];
   $previous_result+=$form["result"];

   $sql = "INSERT INTO proje_degerlendirme (tc, juri, esik1, esik2, esik3, esik4, esik5, esik6, sonuc, `not`)
VALUES ('".$form["tc"]."', '".$form["juri_id"]."', '".$form["esik1"]."' , '".$form["esik2"]."', '".$form["esik3"]."', '".$form["esik4"]."' , '".$form["esik5"]."' , '".$form["esik6"]."', '".$form["result"]."','".$form["not"]."');";

if (mysqli_query($conn, $sql) ) {
    
     $sql_nihai_sonuc= "UPDATE proje_basvuru SET asama=".$previous_result." WHERE tc='".$form["tc"]."'";
   if(mysqli_query($conn, $sql_nihai_sonuc)){

     header("Location: ../projeler.php?success=1");
}
     else {
    $_SESSION["form_elements"]=$_GET;
    header("Location: ../projeler.php?error=3");
    
}
    
    
//    $sql2 = "UPDATE proje_basvuru SET asama=".$result." WHERE tc='".$tc."'";
//    if (mysqli_query($conn, $sql2) ) {
//    header("Location: ../projeler.php?success=1");
//    }
//    else {
//    $_SESSION["form_elements"]=$_GET;
//    header("Location: ../projeler.php?error=1");
    
}
else{
    $_SESSION["form_elements"]=$_GET;
    header("Location: ../projeler.php?error=2");
}

   
} else {
    $_SESSION["form_elements"]=$_GET;
    header("Location: ../projeler.php?error=1");
    
}
 


}
else{
extract($_GET);
$result=1;
if($esik1!="on" || $esik2!="on")
{
    $result=-1;
}
else {
    $cnt=0;
    if($esik4==3){
        $cnt++;
    }
    if($esik5==3){
        $cnt++;
    }
    if($esik6==3){
        $cnt++;
    }
    if($cnt>=2){
        $result=-1;
    }
}

if($result==-1){
    
    $_SESSION["return_form_elements"]["esik1"]=$esik1;
    $_SESSION["return_form_elements"]["esik2"]=$esik2;
    $_SESSION["return_form_elements"]["esik3"]=$esik3;
    $_SESSION["return_form_elements"]["esik4"]=$esik4;
    $_SESSION["return_form_elements"]["esik5"]=$esik5;
    $_SESSION["return_form_elements"]["esik6"]=$esik6;
    $_SESSION["return_form_elements"]["tc"]=$tc;
    $_SESSION["return_form_elements"]["juri_id"]=$juri_id;
    $_SESSION["return_form_elements"]["proje_id"]=$proje_id;
    $_SESSION["return_form_elements"]["result"]=$result;
    $_SESSION["return_form_elements"]["not"]=$formfield10;
    header("Location: ../proje_detay.php?warning=1&proje_id=".$proje_id);
}
else{
    
    
    
$sql_select= "SELECT * FROM proje_basvuru WHERE tc='".$tc."'";
$result_select=$conn->query($sql_select);
if ($result_select->num_rows > 0) {
    $row_select=$result_select->fetch_assoc();
   $previous_result=$row_select["asama"];
   $previous_result+=$result;

   $sql = "INSERT INTO proje_degerlendirme (tc, juri, esik1, esik2, esik3, esik4, esik5, esik6, sonuc, `not`)
VALUES ('$tc', '$juri_id', '$esik1' , '$esik2', '$esik3', '$esik4' , '$esik5' , '$esik6', '$result','$formfield10');";
echo $sql;
if (mysqli_query($conn, $sql) ) {
    
     $sql_nihai_sonuc= "UPDATE proje_basvuru SET asama=".$previous_result." WHERE tc='".$tc."'";
   if(mysqli_query($conn, $sql_nihai_sonuc)){

     header("Location: ../projeler.php?success=1");
}
     else {
    $_SESSION["form_elements"]=$_GET;
    header("Location: ../projeler.php?error=3");
    
}
    
    
//    $sql2 = "UPDATE proje_basvuru SET asama=".$result." WHERE tc='".$tc."'";
//    if (mysqli_query($conn, $sql2) ) {
//    header("Location: ../projeler.php?success=1");
//    }
//    else {
//    $_SESSION["form_elements"]=$_GET;
//    header("Location: ../projeler.php?error=1");
    
}
else{
    $_SESSION["form_elements"]=$_GET;
    header("Location: ../projeler.php?error=2");
}

   
} else {
    $_SESSION["form_elements"]=$_GET;
    header("Location: ../projeler.php?error=1");
    
}
}

}



   







       


?>