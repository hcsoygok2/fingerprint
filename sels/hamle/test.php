<?php
 include_once 'database/db_connect.php';
include_once 'database/functions.php';
function get_string_between($string, $start, $end){
    $string = " ".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}
$formfield8="Bilişim Teknolojileri (BİLTEG)";
  $sql_kod="SELECT * FROM proje_basvuru where proje_alan='".$formfield8."'";
        $result_kod= mysqli_query($conn, $sql_kod);
        if($result_kod=="err101"){
            $alan_cnt=0;
        }
        else{
            $alan_cnt=$result_kod->num_rows;
        }
$proje_kod=date("Y")."-".get_string_between($formfield8, "(", ")")."-".$alan_cnt."";
echo $proje_kod;
