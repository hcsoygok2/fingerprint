<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_GET);
$sql = "UPDATE proje_basvuru SET seviye=2 WHERE id=".$id;

if (mysqli_query($conn, $sql)) {
     $sql2= 'SELECT * FROM uyeler WHERE id='.$id;
  $result = $conn->query($sql2);
  $row=$result->fetch_assoc();
    $name = "Hacettepe Hamle";
$email = "info@bigghamle.com";
$message = "Projeniz değerlendirilmiştir hesabınızdan durumunuzu kontrol edebilirsiniz www.bigghamle.com/basvuru";

$alici = $row["posta"]; //Buraya iletişim formunun gönderileceği mail adresini yazıyoruz.
$konu = "Proje Değerlendirme";

 


$mesajlar="Hacettepe Hamle Bilgilendirme Maili<br/><br/>";
$mesajlar.="İsim: ".$name."<br/>";
$mesajlar.="E-Mail: ".$email."<br/>";

$mesajlar.="Mesaj: ".$message."<br/>";
    header("Location: ../projeler.php?success=1");
} else {
    header("Location: ../projeler.php?error=0");
}

mysqli_close($conn);
?>