<?php

ob_start();
session_start();
 include_once '../database/db_connect.php';
include_once '../database/functions.php';
print_r($_FILES);
function get_string_between($string, $start, $end){
    $string = " ".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}
extract($_POST);
if($formfield14=="on" && $formfield15=="on"){
if(strlen($formfield1)>0 && strlen($formfield2)>0 && strlen($formfield3)>0 && strlen($formfield4)>0 && strlen($formfield5)>0 && strlen($formfield6)>0 && strlen($formfield8)>0 && 
        strlen($formfield9)>0 && strlen($formfield10)>0 && strlen($formfield11)>0 && strlen($formfield12)>0 && $_FILES["files"]["size"][0]>0 && $_FILES["files2"]["size"][0]>0){
$date= date('Y-m-d', strtotime($formfield3));
$formfield1 = mysqli_real_escape_string($conn, $formfield1);
$formfield2 = mysqli_real_escape_string($conn, $formfield2);

$formfield4 = mysqli_real_escape_string($conn, $formfield4);
$formfield5 = mysqli_real_escape_string($conn, $formfield5);
$formfield6 = mysqli_real_escape_string($conn, $formfield6);
$formfield8 = mysqli_real_escape_string($conn, $formfield8);
$formfield9 = mysqli_real_escape_string($conn, $formfield9);
$formfield10 = mysqli_real_escape_string($conn, $formfield10);
$formfield11 = mysqli_real_escape_string($conn, $formfield11);
$formfield12 = mysqli_real_escape_string($conn, $formfield12);
$formfield41 = mysqli_real_escape_string($conn, $formfield41);
$formfield51 = mysqli_real_escape_string($conn, $formfield51);
$formfield61 = mysqli_real_escape_string($conn, $formfield61);

        $sql_kod="SELECT * FROM alanlar where isim='".$formfield8."'";
        $result_kod= mysqli_query($conn, $sql_kod);
        if($result_kod->num_rows > 0){
            $row_cnt=$result_kod->fetch_assoc();
            $alan_cnt=$row_cnt["cnt"];
            $proje_kod=date("Y")."-".get_string_between($formfield8, "(", ")")."-".$alan_cnt."";
            $alan_cnt++;
            $sql_cnt="UPDATE alanlar SET cnt=".$alan_cnt." WHERE isim='".$formfield8."'";
            echo $sql_cnt;
            mysqli_query($conn, $sql_cnt);
        }
        

$sql = "INSERT INTO proje_basvuru (proje_kod, isim, tc, dtarih,semt,posta,ilce,il,adres,sond,sondt, telno, email, katilimci_durum, proje_alan, proje_isim, proje_tanim, proje_amac, proje_hedef, basvuru_tarihi, uni, uni_bolum, unvan)
VALUES ('$proje_kod','$formfield1', '$formfield2' , '$date','$formfield52','$formfield62','$formfield72','$formfield82','$formfield42','$formfield92','$formfield93' ,'$formfield4', '$formfield5' , '$formfield6' , '$formfield8' , '$formfield9' , '$formfield10' , '$formfield11' , '$formfield12', '".date("Y-m-d")."', '$formfield41', '$formfield51', '$formfield61');";


if(strlen($formfield111)>0 && strlen($formfield22)>0 && strlen($formfield33)>0 && strlen($formfield44)>0 && strlen($formfield55)>0 && strlen($formfield66)>0){
$date2= date('Y-m-d', strtotime($formfield33));
$formfield111 = mysqli_real_escape_string($conn, $formfield111);
$formfield22 = mysqli_real_escape_string($conn, $formfield22);

$formfield44 = mysqli_real_escape_string($conn, $formfield44);
$formfield55 = mysqli_real_escape_string($conn, $formfield55);
$formfield66 = mysqli_real_escape_string($conn, $formfield66);
 $sql2= "INSERT INTO ekip_uyeleri (lider_tc, isim, tc, dtarih, telno, email, katilimci_durum)
        VALUES ('$formfield2', '$formfield111','$formfield22','$date2','$formfield44','$formfield55','$formfield66')";
 mysqli_query($conn, $sql2);
}

if(strlen($formfield1111)>0 && strlen($formfield222)>0 && strlen($formfield333)>0 && strlen($formfield444)>0 && strlen($formfield555)>0 && strlen($formfield666)>0){
$date3= date('Y-m-d', strtotime($formfield333));
$formfield1111 = mysqli_real_escape_string($conn, $formfield1111);
$formfield222 = mysqli_real_escape_string($conn, $formfield222);

$formfield444 = mysqli_real_escape_string($conn, $formfield444);
$formfield555 = mysqli_real_escape_string($conn, $formfield555);
$formfield666 = mysqli_real_escape_string($conn, $formfield666);
 $sql3= "INSERT INTO ekip_uyeleri (lider_tc, isim, tc, dtarih, telno, email, katilimci_durum)
        VALUES ('$formfield2', '$formfield1111','$formfield222','$date3','$formfield444','$formfield555','$formfield666')";
 mysqli_query($conn, $sql3);
}


if (mysqli_query($conn, $sql) ) {
    $sql_status="UPDATE uyeler SET status=1 WHERE posta='".$formfield5."'";
    mysqli_query($conn, $sql_status);
    
        $name = "Hacettepe Hamle";
$email = "info@bigghamle.com";
$message = "Başvurunuz alınmıştır. Sonuçlar size mail yolu ile bildirilecektir.";

$alici = $formfield5; //Buraya iletişim formunun gönderileceği mail adresini yazıyoruz.
$konu = "Hacettepe Hamle Başvurunuz Alınmıştır";

 


$mesajlar="Hacettepe Hamle Bilgilendirme Maili<br/><br/>";
$mesajlar.="İsim: ".$name."<br/>";
$mesajlar.="E-Mail: ".$email."<br/>";

$mesajlar.="Mesaj: ".$message."<br/>";

 
mail($alici, $konu, $mesajlar, "Content-type: text/html; charset=utf-8\r\n");
    

 $sql2="SELECT * FROM uyeler WHERE type=1";
    //echo $sql2;
    $result2=$conn->query($sql2);
if($result2->num_rows>0){
     while($row2=$result2->fetch_assoc()){
      $name = "Hacettepe Hamle";
$email = "info@bigghamle.com";
$message = "Yeni Bir Proje Başvurmuştur. Proje Kodu: ".$proje_kod;

   

$alici = $row2["posta"]; //Buraya iletişim formunun gönderileceği mail adresini yazıyoruz.
$konu = "Hacettepe Hamle Eğitim";

 


$mesajlar="Hacettepe Hamle Bilgilendirme Maili<br/><br/>";
$mesajlar.="İsim: ".$name."<br/>";
$mesajlar.="E-Mail: ".$email."<br/>";

$mesajlar.="Mesaj: ".$message."<br/>";
mail($alici, $konu, $mesajlar, "Content-type: text/html; charset=utf-8\r\n");
    }
   
}
    
    if(isset($_FILES['files'])){
        
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name_temp = $key.$_FILES['files']['name'][$key];
                $file_name=  replace_tr($file_name_temp);
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 20971520){
			$errors[]='File size must be less than 20 MB';
        }		
        $query="INSERT into upload_data (`USER_CODE`,`FILE_NAME`,`FILE_SIZE`,`FILE_TYPE`) VALUES('$formfield2','$file_name','$file_size','$file_type'); ";
        
        
        $desired_dir="../uploads/".$formfield2;
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0775);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
		 mysqli_query($conn, $query);			
        }else{
            $_SESSION["form_elements"]=$_POST;
                header("Location: ../basvuru_alt.php?error=1");
        }
    }
	if(empty($error)){
            
		header("Location: ../anasayfa.php?success=1");
	}
}
if(isset($_FILES['files2'])){
       
    $errors= array();
	foreach($_FILES['files2']['tmp_name'] as $key => $tmp_name ){
		$file_name_temp = $key.$_FILES['files2']['name'][$key];
                $file_name=  replace_tr($file_name_temp);
		$file_size =$_FILES['files2']['size'][$key];
		$file_tmp =$_FILES['files2']['tmp_name'][$key];
		$file_type=$_FILES['files2']['type'][$key];	
        if($file_size > 20971520){
			$errors[]='File size must be less than 20 MB';
        }		
        $query="INSERT into upload_data2 (`USER_CODE`,`FILE_NAME`,`FILE_SIZE`,`FILE_TYPE`) VALUES('$formfield2','$file_name','$file_size','$file_type'); ";
        
        $desired_dir="../uploads/".$formfield2;
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0775);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
		 mysqli_query($conn, $query);			
        }else{
            $_SESSION["form_elements"]=$_POST;
                header("Location: ../basvuru_alt.php?error=1");
        }
    }
	if(empty($error)){
            
		header("Location: ../anasayfa.php?success=1");
	}
}
   
} else {
    $_SESSION["form_elements"]=$_POST;
    header("Location: ../basvuru_alt.php?error=2");
    
}
        }
        else{
            $_SESSION["form_elements"]=$_POST;
            header("Location: ../basvuru_alt.php?error=3");
        }

}
else{
    $_SESSION["form_elements"]=$_POST;
            header("Location: ../basvuru_alt.php?error=4");
}


?>