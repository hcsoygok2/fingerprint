<?php
ob_start();
session_start();
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_GET);
$result=db_get_proje_bykamp($conn,$id);
if($result!="err101"){
    while($row=$result->fetch_assoc()){
      $name = "Hacettepe Hamle";
$email = "info@bigghamle.com";
$message = "Eğitim Tarihleriniz ve Dersleriniz Aşağıdaki Gibidir.";

    $sql2="SELECT kamp_egitim.name AS ders_adi, kamp_egitim.bastarih AS bastarih, kamp_egitim.bitistarih AS bitistarih FROM kamp, kamp_egitim, kamp_proje WHERE kamp.id=".$id." AND kamp.id=kamp_egitim.kamp_id AND kamp.id=kamp_proje.kamp_id AND tc='".$row["tc"]."'";
    //echo $sql2;
    $result2=$conn->query($sql2);
if($result2->num_rows>0){
    while($row2=$result2->fetch_assoc()){
        $message.="Ders: ".$row2["ders_adi"]." Başlangıç Tarihi: ".$row2["bastarih"]." Bitiş Tarihi: ".$row2["bitistarih"]."\n";
    }
}
$alici = $row["email"]; //Buraya iletişim formunun gönderileceği mail adresini yazıyoruz.
$konu = "Hacettepe Hamle Eğitim";

 


$mesajlar="Hacettepe Hamle Bilgilendirme Maili<br/><br/>";
$mesajlar.="İsim: ".$name."<br/>";
$mesajlar.="E-Mail: ".$email."<br/>";

$mesajlar.="Mesaj: ".$message."<br/>";
mail($alici, $konu, $mesajlar, "Content-type: text/html; charset=utf-8\r\n");
    }
    header("Location: ../grup.php?success=1&id=".$id);
}
else{
header("Location: ../grup.php?error=1&id=".$id);
}
