<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_GET);
print_r($_GET);


 for($i=0; $i<count($my_multi_select2); $i++){
   
   $sql3 =  "INSERT INTO juri_proje (juri_id, proje_tc) VALUES (".$my_multi_select2[$i].", '".$proje_tc."')";
  $sql= 'SELECT * FROM uyeler WHERE id='.$my_multi_select2[$i];
  $result = $conn->query($sql);
  $row=$result->fetch_assoc();
  
    $name = "Hacettepe Hamle";
$email = "info@bigghamle.com";
$message = "Değerlendirmeniz için proje hesabınıza atanmıştır. .";

$alici = $row["posta"]; //Buraya iletişim formunun gönderileceği mail adresini yazıyoruz.
$konu = "Yeni Proje";

 


$mesajlar="Hacettepe Hamle Bilgilendirme Maili<br/><br/>";
$mesajlar.="İsim: ".$name."<br/>";
$mesajlar.="E-Mail: ".$email."<br/>";

$mesajlar.="Mesaj: ".$message."<br/>";

 
mail($alici, $konu, $mesajlar, "Content-type: text/html; charset=utf-8\r\n");
   if(!mysqli_query($conn, $sql3)){
       
       header("Location: ../proje_detay.php?error=1");
   }
    }
    
    
  
    
    
    header("Location: ../proje_detay.php?success=1");