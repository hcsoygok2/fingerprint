<?php
 include_once '../database/db_connect.php';
include_once '../database/functions.php';

extract($_GET);

//tek tırnak girerse

//$formfield5 = mysqli_real_escape_string($conn, $formfield5);
//
//$formfield8 = mysqli_real_escape_string($conn, $formfield8);

if($puan1<0 || $puan2<0 || $puan3<0 || $puan4<0 || $puan5<0 || $puan1>20 || $puan2>25 || $puan3>30 || $puan4>20 || $puan5>5){
    header("Location: ../proje_degerlendirme2.php?error=10&juri_id=".$juri_id."&proje_tc=".$tc."&proje_id=".$proje_id);
}
else{

$toplam=$puan1+$puan2+$puan3+$puan3+$puan5;
if ($puan2<10 || $puan3<12 || $puan4<8 ||$toplam<50){
	
	$sonuc=-1;
	
}
else if ($puan2>15 && $puan3>18 && $puan4>12 && $toplam>50){
	
	$sonuc=1;
	
}
else{
	$sonuc=2;
}





$sql = "UPDATE proje_degerlendirme2 SET puan1=$puan1, puan2=$puan2, puan3=$puan3, puan4=$puan4, puan5=$puan5,sonuc=$toplam, type=$sonuc, `tekrar`=2 WHERE tc='$tc' AND juri=$juri_id";


//pd2 sonuc tc göre çek 
//while sonucları topla ortalama al 

if (mysqli_query($conn, $sql) ) {
	$sql= "SELECT * FROM proje_degerlendirme2 WHERE tc='".$tc."'";
	$result_select=$conn->query($sql);
	$puan1=0;
	$puan2=0;
	$puan3=0;
	$puan4=0;
	$puan5=0;
		$cnt=0;
	$total=0;
	while($row_sonuc=$result_select->fetch_assoc()){
		$puan1+=$row_sonuc["puan1"];
		$puan2+=$row_sonuc["puan2"];
		$puan3+=$row_sonuc["puan3"];
		$puan4+=$row_sonuc["puan4"];
		$puan5+=$row_sonuc["puan5"];
		$total+=$row_sonuc["sonuc"];
		$cnt++;
	}
	$res=$total/$cnt;
	$p1=$puan1/$cnt;
	$p2=$puan2/$cnt;
	$p3=$puan3/$cnt;
	$p4=$puan4/$cnt;
	$p5=$puan5/$cnt;
		
	
if ($p2<10 || $p3<12 || $p4<8 ||$res<50){
	
	$sonuc2=-1;
	
}
else if ($p2>15 && $p3>18 && $p4>12 && $res>50){
	
	$sonuc2=1;
	
}
else{
	$sonuc2=2;
}	
	
	
    $sql2 = "UPDATE proje_basvuru SET  puan1=$p1,puan2=$p2,puan3=$p3,puan4=$p4,puan5=$p5,asama2=$res,ana_asama='.$sonuc2.' WHERE tc='".$tc."'";
    if (mysqli_query($conn, $sql2) ) {
    header("Location: ../proje_detay2.php?success=1&proje_id=".$proje_id);
    }
    else {
    $_SESSION["form_elements"]=$_GET;
    header("Location: ../proje_detay2.php?error=1&proje_id=".$proje_id);
    
}

   
} else {
    $_SESSION["form_elements"]=$_GET;
    header("Location: ../proje_detay2.php?error=2&proje_id=".$proje_id);
    
}



mysqli_close($conn);
}
?>