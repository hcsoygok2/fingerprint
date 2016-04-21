<?php 
 
ob_start();
session_start();
 include_once '../database/db_connect.php';
include_once '../database/functions.php';
 
 





extract($_POST);




        
 print_r($_FILES);
$desired_dir="../uploads/".$tc; 
 $file_name_temp = $_FILES['basvuruform2']['name'];
                $file_name=  replace_tr($file_name_temp);
		$file_size =$_FILES['basvuruform2']['size'];
		$file_tmp =$_FILES['basvuruform2']['tmp_name'];
		$file_type=$_FILES['basvuruform2']['type'];
                 if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0775);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
             $sql = "UPDATE proje_basvuru SET basvuruform3='".$file_name."' WHERE tc='".$tc."'";
              
		 mysqli_query($conn, $sql);
header("Location:../ana_basvuru2.php?success=1");

ob_end_flush();
    
?>