<?php
include_once 'psl-config.php';
//include_once 'db_connect.php';
function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // regenerated the session, delete the old one. 
}
function replace_tr($text) {
   $text = trim($text);
   $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
   $replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-');
   $new_text = str_replace($search,$replace,$text);
   return $new_text;
} 
function db_get_proje_juri($conn, $tc) {

    $sql = "SELECT uyeler.id AS id, name, surname, department, phone, posta FROM uyeler, juri_proje WHERE proje_tc='".$tc."' AND juri_proje.juri_id=uyeler.id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_proje_juri2($conn, $tc) {

    $sql = "SELECT uyeler.id AS id, name, surname, department, phone, posta FROM uyeler, juri_proje2 WHERE proje_tc='".$tc."' AND juri_proje2.juri_id=uyeler.id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//11 ağustos
function db_get_tc_juri($conn,$id) {

    $sql = "SELECT  * FROM juri_proje,juri_proje2 WHERE juri_proje.juri_id=".$id." AND juri_proje2.juri_id=juri_proje.juri_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
function db_get_tc_juri1($conn,$id) {

    $sql = "SELECT  * FROM juri_proje WHERE juri_proje.juri_id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
function db_get_tc_juri2($conn,$id) {

    $sql = "SELECT  * FROM juri_proje2 WHERE juri_proje2.juri_id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
function db_get_tum_projeler_juri($conn,$tc) {

    $sql = "SELECT * FROM proje_basvuru  WHERE tc=".$tc;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}


function db_get_uyeler($conn) {

    $sql = "SELECT * FROM uyeler";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
function db_get_uye_tek($conn, $id) {

    $sql = "SELECT * FROM uyeler WHERE id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
//hcs juri çekme
function db_get_juri_exclude($conn, $id) {

    $sql = "SELECT DISTINCT uyeler.id AS id, name, surname FROM uyeler WHERE type='2'";
            for($i=0; $i<sizeof($id); $i++){
               $sql.=" AND uyeler.id!='".$id[$i]."'";
            }
         //echo $sql;   
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//hcs 4 ağustos kamp2 
//hcs 1.eğitim kampı 
function db_get_kamp2($conn) {

    $sql = "SELECT * FROM kamp2 ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
function db_get_proje_exclude_kamp2($conn, $alan) {

    $sql = "SELECT * 
FROM proje_basvuru  WHERE proje_alan='".$alan."' AND seviye=3 
AND tc NOT IN 
(
    SELECT tc 
    FROM kamp_proje2
   
);";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//hcs 1.eğitim kampı 
function db_get_kamp_egitim2($conn, $id) {

    $sql = "SELECT * FROM kamp_egitim2 WHERE kamp_id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_proje_bykamp2($conn, $id) {

    $sql = "SELECT * FROM proje_basvuru,kamp_proje2 WHERE kamp_id=".$id." AND kamp_proje2.tc=proje_basvuru.tc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//hcs kamp çekme tek
function db_get_kamp_egitim_tek2($conn,$id) {

    $sql = "SELECT * FROM kamp_egitim2 WHERE id='".$id."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
//hcs kamp çekme tekkk
function db_get_kamp_tek($conn,$id) {

    $sql = "SELECT * FROM kamp WHERE id='".$id."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
//hcs kamp çekme tekkk
function db_get_kamp_tek2($conn,$id) {

    $sql = "SELECT * FROM kamp2 WHERE id='".$id."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}}
   

//hcs 1.eğitim kampı 
function db_get_kamp($conn) {

    $sql = "SELECT * FROM kamp ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//hcs 1.eğitim kampı 
function db_get_kamp_egitim($conn, $id) {

    $sql = "SELECT * FROM kamp_egitim WHERE kamp_id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_proje_bykamp($conn, $id) {

    $sql = "SELECT * FROM kamp_proje,proje_basvuru WHERE kamp_id=".$id." AND kamp_proje.tc=proje_basvuru.tc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_tum_projeler($conn) {

    $sql = "SELECT * FROM proje_basvuru";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}


//hcs kamp çekme tek
function db_get_kamp_egitim_tek($conn,$id) {

    $sql = "SELECT * FROM kamp_egitim WHERE id='".$id."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}





//hcs juri çekme
function db_get_juri($conn) {

    $sql = "SELECT * FROM uyeler WHERE type='2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
//hcs juri çekme
function db_get_juri_tek($conn,$id) {

    $sql = "SELECT * FROM uyeler WHERE id='".$id."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
//proje alan
function db_get_alan($conn) {

    $sql = "SELECT * from proje_basvuru";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_kategori($conn) {

    $sql = "SELECT DISTINCT alanlar.isim FROM alanlar,proje_basvuru WHERE alanlar.isim=proje_basvuru.proje_alan ORDER BY alanlar.isim";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_kategori2($conn) {

    $sql = "SELECT DISTINCT alanlar.isim FROM alanlar,proje_basvuru WHERE alanlar.isim=proje_basvuru.proje_alan AND proje_basvuru.seviye=2 ORDER BY alanlar.isim";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
function db_get_sonuc($conn, $tc) {

    $sql = "SELECT * FROM proje_basvuru WHERE tc ='".$tc."' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_kategori_juri($conn) {

    $sql = "SELECT DISTINCT alanlar.isim FROM alanlar,proje_basvuru,juri_proje WHERE alanlar.isim=proje_basvuru.proje_alan AND juri_proje.proje_tc=proje_basvuru.tc ORDER BY alanlar.isim";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
}

function db_get_kategori_juri2($conn) {

    $sql = "SELECT DISTINCT alanlar.isim FROM alanlar,proje_basvuru,juri_proje WHERE alanlar.isim=proje_basvuru.proje_alan AND juri_proje.proje_tc=proje_basvuru.tc AND proje_basvuru.seviye=2 ORDER BY alanlar.isim";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
}
//sabit sayfaları çekme
function db_get_proje_bykategori_juri($conn, $alan, $juri_id) {

    $sql = "SELECT * FROM juri_proje,proje_basvuru WHERE proje_alan ='".$alan."' AND tc=proje_tc AND juri_id='".$juri_id."' AND proje_basvuru.seviye<2";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_proje_bykategori_juri2($conn, $alan, $juri_id) {

    $sql = "SELECT * FROM juri_proje2,proje_basvuru WHERE proje_alan ='".$alan."' AND tc=proje_tc AND juri_id='".$juri_id."' AND proje_basvuru.seviye=2";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
//sabit sayfaları çekme
        function db_get_proje_bykategori_ara($conn, $alan) {

    $sql = "SELECT DISTINCT(proje_basvuru.tc),proje_basvuru.id,proje_basvuru.proje_isim,proje_basvuru.isim,proje_basvuru.proje_tanim 
        FROM proje_basvuru, proje_degerlendirme WHERE proje_alan ='".$alan."' AND seviye=0 
       AND (SELECT COUNT(*) FROM juri_proje WHERE proje_tc=proje_basvuru.tc)!=(SELECT COUNT(*) FROM proje_degerlendirme WHERE tc=proje_basvuru.tc AND proje_degerlendirme.tekrar!=1)
";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
        function db_get_proje_bykategori_ara_nojuri($conn, $alan) {

    $sql = "SELECT DISTINCT(proje_basvuru.tc),proje_basvuru.id,proje_basvuru.proje_isim,proje_basvuru.isim,proje_basvuru.proje_tanim 
        FROM proje_basvuru, juri_proje WHERE proje_alan ='".$alan."' AND seviye=0 
        AND proje_basvuru.tc NOT IN (SELECT proje_tc FROM juri_proje)
";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_proje_bykategori_ara_bitmis($conn, $alan) {

    $sql = "SELECT DISTINCT(proje_basvuru.tc),proje_basvuru.id,proje_basvuru.proje_isim,proje_basvuru.isim,proje_basvuru.proje_tanim 
        FROM proje_basvuru,proje_degerlendirme WHERE proje_alan ='".$alan."' AND seviye=0 AND proje_degerlendirme.tc=proje_basvuru.tc
        AND (SELECT COUNT(*) FROM juri_proje WHERE proje_tc=proje_basvuru.tc)=(SELECT COUNT(*) FROM proje_degerlendirme WHERE tc=proje_basvuru.tc AND proje_degerlendirme.tekrar!=1)
";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
function db_get_proje_bykategori($conn, $alan) {

    $sql = "SELECT * FROM proje_basvuru WHERE proje_alan ='".$alan."' AND seviye=0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
function db_get_proje_bykategori2($conn, $alan) {

    $sql = "SELECT * FROM proje_basvuru WHERE proje_alan ='".$alan."' AND seviye=2";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_proje_bykategori2_yetersiz($conn, $alan) {

    $sql = "SELECT * FROM proje_basvuru WHERE proje_alan ='".$alan."' AND seviye=3 AND ana_asama=-1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_proje_bykategori2_gelistirilebilir($conn, $alan) {

    $sql = "SELECT * FROM proje_basvuru WHERE proje_alan ='".$alan."' AND seviye=3 AND ana_asama=2";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_proje_bykategori2_basarili($conn, $alan) {

    $sql = "SELECT * FROM proje_basvuru WHERE proje_alan ='".$alan."' AND seviye=3 AND ana_asama=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}


function db_get_proje_degerlendirme_tek($conn, $juri_id, $proje_id) {

    $sql = "SELECT * FROM proje_degerlendirme WHERE juri ='".$juri_id."' AND tc='".$proje_id."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_proje_degerlendirme_tek2($conn, $juri_id, $proje_id) {

    $sql = "SELECT * FROM proje_degerlendirme2 WHERE juri ='".$juri_id."' AND tc='".$proje_id."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//sabit sayfaları çekme
function db_get_proje_bykategori_exclude($conn, $alan, $id) {
$sql2="SELECT * FROM juri_proje where juri_id='".$id."'";
$result2=$conn->query($sql2);
if ($result2->num_rows > 0) {
    $sql="SELECT * FROM proje_basvuru WHERE proje_alan ='".$alan."'";

   while($row=$result2->fetch_assoc()){
       $sql.=" AND tc!='".$row["proje_tc"]."'";
       
   }
   $result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
} else {
    $sql = "SELECT * FROM proje_basvuru WHERE proje_alan ='".$alan."' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
}
    
   
}

function db_get_proje_bykategori_exclude2($conn, $alan, $id) {
$sql2="SELECT * FROM juri_proje2 where juri_id='".$id."'";
$result2=$conn->query($sql2);
if ($result2->num_rows > 0) {
    $sql="SELECT * FROM proje_basvuru WHERE proje_alan ='".$alan."'";

   while($row=$result2->fetch_assoc()){
       $sql.=" AND tc!='".$row["proje_tc"]."'";
       
   }
   $result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
} else {
    $sql = "SELECT * FROM proje_basvuru WHERE proje_alan ='".$alan."' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
}
    
   
}

//sabit sayfaları çekme
function db_get_proje_tek($conn, $id) {
$id=(int)intval($id);
    $sql = "SELECT * FROM proje_basvuru WHERE id ='".$id."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_proje_exclude_kamp($conn, $alan) {

    $sql = "SELECT * 
FROM proje_basvuru  WHERE proje_alan='".$alan."' AND seviye=2  
AND tc NOT IN 
(
    SELECT tc 
    FROM kamp_proje 
   
);";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//sabit sayfaları çekme
function db_get_ekip($conn, $tc) {

    $sql = "SELECT * FROM ekip_uyeleri WHERE lider_tc ='".$tc."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_dosya($conn, $tc) {

    $sql = "SELECT * FROM upload_data WHERE USER_CODE ='".$tc."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}



function db_get_dosya2($conn, $tc) {

    $sql = "SELECT * FROM upload_data2 WHERE USER_CODE ='".$tc."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}



//sabit sayfaları çekme
function db_get_sabit($conn, $page_id,$same, $lang_id) {
$page_id=(int)intval($page_id);
$same=(int)intval($same);
$lang_id=(int)intval($lang_id);
    $sql = "SELECT * FROM extensions WHERE  relation_id=".$page_id." AND  same=".$same." AND language_id=".$lang_id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}


function db_get_manset($conn, $page_id, $lang_id) {
$page_id=(int)intval($page_id);
$lang_id=(int)intval($lang_id);
    $sql = "SELECT * FROM extensions WHERE  relation_id=".$page_id." AND `like`=1 AND language_id=".$lang_id." ORDER BY extension_id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_gallery($conn, $page_id) {
$page_id=(int)intval($page_id);
    $sql = "SELECT * FROM gallery_image,gallery WHERE gallery_order=".$page_id." AND gallery_image.gallery_id=gallery.gallery_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}


function db_get_page($conn, $extension_id,$same, $lang_id) {
$extension_id=(int)intval($extension_id);
$same=(int)intval($same);
$lang_id=(int)intval($lang_id);
    $sql = "SELECT * FROM extensions WHERE  extension_id=".$extension_id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
//ülkeler başlık 
function db_get_ulkebaslik($conn,$id) {
$id=(int)intval($id);

    $sql = "SELECT * FROM ulkebaslik WHERE lang=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//ülkeler hepsi 
function db_get_ulke($conn,$id) {
$id=(int)intval($id);

    $sql = "SELECT * FROM ulkekategori WHERE id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//ülkeler üyeler  hepsi 
function db_get_ulke_uye($conn,$id) {
$id=(int)intval($id);

    $sql = "SELECT * FROM uyeler WHERE kategori=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//tek üye
function db_get_uye($conn,$id) {
$id=(int)intval($id);

    $sql = "SELECT * FROM uyeler WHERE id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//galeriden resim çekme
function db_get_foto($conn) {
    $sql = "SELECT * FROM gallery  ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
//resimleri tek galeri bilgileri
function db_get_foto_tek($conn,$id) {
$id=(int)intval($id);

    $sql = "SELECT * FROM gallery WHERE gallery_id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
//resimleri detayda bastırma
function db_get_foto_detay($conn,$id) {
$id=(int)intval($id);

    $sql = "SELECT * FROM gallery_image WHERE gallery_id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
//haberlerin hepsi 
function db_get($conn, $page_id, $lang_id) {
$page_id=(int)intval($page_id);
$lang_id=(int)intval($lang_id);
    $sql = "SELECT * FROM extensions WHERE relation_id=".$page_id." AND language_id=".$lang_id." ORDER BY date DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//video
function db_get_video($conn,$id) {
$id=(int)intval($id);

    $sql = "SELECT * FROM extensions WHERE relation_id=".$id ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}
//haberin detay
function db_get_detay($conn,$id) {
$id=(int)intval($id);

    $sql = "SELECT * FROM extensions WHERE extension_id=".$id ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

//haberin kategoriye göre çek
function db_get_haber_kategori($conn,$r_id,$id,$lang_id) {
$r_id=(int)intval($r_id);
$id=(int)intval($id);
$lang_id=(int)intval($lang_id);
    $sql = "SELECT * FROM extensions WHERE relation_id=".$r_id." AND category_id=".$id ." AND language_id=".$lang_id ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}



//kategorileri çek
function db_get_category($conn) {
    $sql = "SELECT * FROM categories";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}





function login($email, $password, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT id, username, password, salt 
        FROM members
       WHERE email = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch();
 
        // hash the password with the unique salt.
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
 
            if (checkbrute($user_id, $mysqli) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted.
                if ($db_password == $password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', 
                              $password . $user_browser);
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $mysqli->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            // No user exists.
            return false;
        }
    }
}

function checkbrute($user_id, $mysqli) {
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

function login_check($mysqli) {
    // Check if all session variables are set 
    if (isset($_SESSION['user_id'], 
                        $_SESSION['username'], 
                        $_SESSION['login_string'])) {
 
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $mysqli->prepare("SELECT password 
                                      FROM members 
                                      WHERE id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if ($login_check == $login_string) {
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}

function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}