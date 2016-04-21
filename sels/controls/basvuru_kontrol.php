<?php
ob_start();
session_start();
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_POST);
if($formfield14=="on" && $formfield15=="on"){
if(strlen($formfield1)>0 && strlen($formfield2)>0 && strlen($formfield3)>0 && strlen($formfield4)>0 && strlen($formfield5)>0 && strlen($formfield6)>0 && strlen($formfield8)>0 && 
        strlen($formfield9)>0 && strlen($formfield10)>0 && strlen($formfield11)>0 && strlen($formfield12)>0){
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
$sql = "INSERT INTO proje_basvuru (isim, tc, dtarih, telno, email, katilimci_durum, proje_alan, proje_isim, proje_tanim, proje_amac, proje_hedef, basvuru_tarihi, uni, uni_bolum)
VALUES ('$formfield1', '$formfield2' , '$date', '$formfield4', '$formfield5' , '$formfield6' , '$formfield8' , '$formfield9' , '$formfield10' , '$formfield11' , '$formfield12', '".date("Y-m-d")."', '$formfield41', '$formfield51');";


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
    if(isset($_FILES['files'])){
        echo"<br>file";
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 20971520){
			$errors[]='File size must be less than 20 MB';
        }		
        $query="INSERT into upload_data (`USER_CODE`,`FILE_NAME`,`FILE_SIZE`,`FILE_TYPE`) VALUES('$formfield2','$file_name','$file_size','$file_type'); ";
        
        $desired_dir="../uploads/".$formfield1;
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
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
                header("Location: ../basvuru.php?error=1");
        }
    }
	if(empty($error)){
            
		header("Location: ../anasayfa.php?success=1");
	}
}
if(isset($_FILES['files2'])){
        echo"<br>file";
    $errors= array();
	foreach($_FILES['files2']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files2']['name'][$key];
		$file_size =$_FILES['files2']['size'][$key];
		$file_tmp =$_FILES['files2']['tmp_name'][$key];
		$file_type=$_FILES['files2']['type'][$key];	
        if($file_size > 20971520){
			$errors[]='File size must be less than 20 MB';
        }		
        $query="INSERT into upload_data2 (`USER_CODE`,`FILE_NAME`,`FILE_SIZE`,`FILE_TYPE`) VALUES('$formfield2','$file_name','$file_size','$file_type'); ";
        
        $desired_dir="../uploads/".$formfield1;
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
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
                header("Location: ../basvuru.php?error=1");
        }
    }
	if(empty($error)){
            
		header("Location: ../anasayfa.php?success=1");
	}
}
   
} else {
    $_SESSION["form_elements"]=$_POST;
    header("Location: ../basvuru.php?error=2");
    
}
        }
        else{
            $_SESSION["form_elements"]=$_POST;
            header("Location: ../basvuru.php?error=3");
        }

}
else{
    $_SESSION["form_elements"]=$_POST;
            header("Location: ../basvuru.php?error=4");
}


?>