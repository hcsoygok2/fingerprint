<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_GET);

$sql = "UPDATE proje_degerlendirme2 SET tekrar=1 WHERE juri=".$juri_id." AND tc='".$proje_tc."'";

if (mysqli_query($conn, $sql)) {
   
      $sql= 'SELECT * FROM uyeler WHERE id='.$juri_id;
  $result = $conn->query($sql);
  $row=$result->fetch_assoc();
    $name = "Hacettepe Hamle";
$email = "info@bigghamle.com";
$message = "Yeniden değerlendirmeniz için proje hesabınıza atanmıştır. .";

$alici = $row["posta"]; //Buraya iletişim formunun gönderileceği mail adresini yazıyoruz.
$konu = "Yeni Proje";

 


$mesajlar="Hacettepe Hamle Bilgilendirme Maili<br/><br/>";
$mesajlar.="İsim: ".$name."<br/>";
$mesajlar.="E-Mail: ".$email."<br/>";

$mesajlar.="Mesaj: ".$message."<br/>";

    header("Location: ../proje_detay2.php?success=1&proje_id=".$proje_id);
} else {
    header("Location: ../proje_detay2.php?error=0&proje_id=".$proje_id);
}

mysqli_close($conn);
?>