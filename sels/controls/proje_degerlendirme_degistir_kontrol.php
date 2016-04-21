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

   $sql = "UPDATE proje_degerlendirme SET esik1='".$form["esik1"]."', esik2='".$form["esik2"]."', esik3='".$form["esik3"]."', esik4='".$form["esik4"]."', esik5='".$form["esik5"]."', esik6='".$form["esik6"]."', sonuc='".$form["result"]."', `not`='".$form["not"]."' , `tekrar`=2
WHERE tc='".$form["tc"]."' AND juri='".$form["juri_id"]."' ";

if (mysqli_query($conn, $sql) ) {
    $sql_total="SELECT SUM(sonuc) FROM proje_degerlendirme WHERE tc='".$form["tc"]."'";
    $result_total=$conn->query($sql_total);
    $row_total=$result_total->fetch_array();
     $sql_nihai_sonuc= "UPDATE proje_basvuru SET asama=".$row_total[0]." WHERE tc='".$form["tc"]."'";
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

   $sql = "UPDATE proje_degerlendirme SET esik1='".$esik1."', esik2='".$esik2."', esik3='".$esik3."', esik4='".$esik4."', esik5='".$esik5."', esik6='".$esik6."', sonuc='".$result."', `not`='".$formfield10."' , `tekrar`=2
WHERE tc='".$tc."' AND juri='".$juri_id."'";

if (mysqli_query($conn, $sql) ) {
    $sql_total="SELECT SUM(sonuc) FROM proje_degerlendirme WHERE tc='".$tc."'";
    echo $sql_total;
    $result_total=$conn->query($sql_total);
    
    $row_total=$result_total->fetch_array();
    print_r($row_total);
     $sql_nihai_sonuc= "UPDATE proje_basvuru SET asama=".$row_total[0]." WHERE tc='".$tc."'";
   if(mysqli_query($conn, $sql_nihai_sonuc)){

     header("Location: ../projeler.php?success=1");
}
     else {
    $_SESSION["form_elements"]=$_GET;
   // echo $sql_nihai_sonuc;
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