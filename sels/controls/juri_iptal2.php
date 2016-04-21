<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_GET);
$sql = "DELETE FROM juri_proje2 WHERE juri_id=".$juri_id." AND proje_tc='".$proje_tc."'";
if (mysqli_query($conn, $sql)) {
    $sql2="SELECT * FROM uyeler WHERE type=1";
    //echo $sql2;
    $result2=$conn->query($sql2);
if($result2->num_rows>0){
     while($row2=$result2->fetch_assoc()){
      $name = "Hacettepe Hamle";
$email = "info@bigghamle.com";
$message = "Bir jüri projeyi değerlendirmekten vazgeçmiştir. Proje Kodu: ".$proje_kod." Jüri id: ".$juri_id."Nedeni: ".$formfield10;

   

$alici = $row2["posta"]; //Buraya iletişim formunun gönderileceği mail adresini yazıyoruz.
$konu = "Hacettepe Hamle Eğitim";

 


$mesajlar="Hacettepe Hamle Bilgilendirme Maili<br/><br/>";
$mesajlar.="İsim: ".$name."<br/>";
$mesajlar.="E-Mail: ".$email."<br/>";

$mesajlar.="Mesaj: ".$message."<br/>";
mail($alici, $konu, $mesajlar, "Content-type: text/html; charset=utf-8\r\n");
    }
   
}
    header("Location: ../projeler2.php?success=5");
} else {
    header("Location: ../proje_detay2.php?error=0&proje_id=".$proje_id);
}

mysqli_close($conn);
?>