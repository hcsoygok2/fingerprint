<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_GET);

//tek tırnak girerse

$formfield5 = mysqli_real_escape_string($conn, $formfield5);

$formfield8 = mysqli_real_escape_string($conn, $formfield8);

$sql = "INSERT INTO uyeler (name, surname, password,type,posta,department,phone)
VALUES ('$formfield5', '$formfield6', '$formfield8','2','$formfield11','$formfield7','$formfield10')";
if (mysqli_query($conn, $sql)) {
    $sql2 = "SELECT * FROM uyeler WHERE posta='".$formfield11."'";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
    $row=$result->fetch_assoc();
    
    for($i=0; $i<count($my_multi_select2); $i++){
   
   $sql3 =  "INSERT INTO juri_proje2 (juri_id, proje_tc) VALUES (".$row["id"].", '".$my_multi_select2[$i]."')";
    $name = "Hacettepe Hamle";
$email = "info@bigghamle.com";
$message = "Değerlendirmeniz için proje hesabınıza atanmıştır. .";

$alici = $row["posta"]; //Buraya iletişim formunun gönderileceği mail adresini yazıyoruz.
$konu = "Yeni Proje";

 


$mesajlar="Hacettepe Hamle Bilgilendirme Maili<br/><br/>";
$mesajlar.="İsim: ".$name."<br/>";
$mesajlar.="E-Mail: ".$email."<br/>";

$mesajlar.="Mesaj: ".$message."<br/>";
   mysqli_query($conn, $sql3);
    }
    header("Location: ../juri_ekle2.php?success=1");
} else {
    header("Location: ../juri_ekle2.php?error=0");
}
} else {
    header("Location: ../juri_ekle2.php?error=0");
}




mysqli_close($conn);
?>