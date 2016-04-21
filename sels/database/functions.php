<?php
include_once 'psl-config.php';
//include_once 'db_connect.php';




function cevir($s) {     

 $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',','â','\"','\'','&#8217;','&#8220;','&#8221;');
 $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','a','','','','','');
 $s = str_replace($tr,$eng,$s);
 $s = strtolower($s);
 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
 $s = preg_replace('/\s+/', '-', $s);
 $s = preg_replace('|-+|', '-', $s);
 $s = preg_replace('/#/', '', $s);
 
 $s = str_replace('.', '', $s);
  $s = str_replace("'", "", $s);
  $s = str_replace("&", "", $s);
   $s = str_replace("’", "", $s);
   $s = str_replace("’231;", "", $s);
    $s = str_replace("&39;", "", $s);
	 $s = str_replace("&039;", "", $s);
	 $s = str_replace("39;", "", $s);
	  $s = str_replace("quot;", "", $s);
	  	  $s = str_replace("160;", "", $s);
	  $s = str_replace("‘", "", $s);
	   $s = str_replace("!", "", $s);
		  $s = str_replace("&160;", "", $s);
		  $s = str_replace("&252;", "u", $s);
		 $s = str_replace("&246;", "u", $s); 
		  $s = str_replace("214;", "o", $s);
		  $s = str_replace("246;", "o", $s);
$s = str_replace("252;", "u", $s);
	$s = str_replace("231;", "c", $s);
	$s = str_replace("252;", "u", $s);
	$s = str_replace(":", "", $s);
 $s = trim($s, '-');
 
 return $s; 
 


}



function replace_tr2($text) {
   $text = trim($text);
   $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
   $replace = array('c','c','g','g','i','i','o','o','s','s','u','u',' ');
   $new_text = str_replace($search,$replace,$text);
   return $new_text;
} 
function replace_tr($text) {
   $text = trim($text);
   $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
   $replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-');
   $new_text = str_replace($search,$replace,$text);
   return $new_text;
} 
function replace_tr_standart($text) {
   $text = trim($text);
   $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü');
   $replace = array('Ç','c','Ğ','g','i','i','O','o','S','s','U','u');
   $new_text = str_replace($search,$replace,$text);
   return $new_text;
} 
              function extractCommonWords($string){
    $stopWords = file('../stop_words.txt');
      //$stopWords = explode("/n",$stop);
      //$stopWords = array('i','a','about','an','and','are','as','at','be','by','com','de','en','for','from','how','in','is','it','la','of','on','or','that','the','this','to','was','what','when','where','who','will','with','und','the','www');
   
      $string = preg_replace('/\s\s+/i', '', $string); // replace whitespace
      
      $string = trim($string); // trim the string
    
      //$string = preg_replace('/[^a-zA-Z0-9 -ĞÜŞİÖÇğüşiöç]/', '', $string); // only take alphanumerical characters, but keep the spaces and dashes too…
        //echo $string;
      //$string = mb_strtolower($string,"UTF-8");  
      //$string = strtolower($string); // make it lowercase
 //echo $string;
 //iconv('ISO-8859-9', 'UTF-8', $string);  
 //$string_eng=  replace_tr_standart($string);
 //echo '<br><br>';
  //echo $string_eng;
  
      //preg_match_all('/(([A-ZĞÜŞİÖÇ][a-zöçşğüıâ]*)[\s-])*/u', $string, $matchWords);
      preg_match_all('/\b([A-ZĞÜŞİÖÇ]{1}[a-zğüşıöç\.]{1,30}[- ]{0,1}|[A-ZĞÜŞİÖÇ]{1}[- \']{1}[A-ZĞÜŞİÖÇ]{0,1}  
    [a-zğüşıöç\.]{1,30}[- ]{0,1}|[a-zğüşıöç]{1,2}[ -\']{1}[A-ZĞÜŞİÖÇ]{1}[a-zğüşıöç\.]{1,30}){2,10}/u', $string, $matchWords);
      
      //print_r($matchWords);
      $matchWords = $matchWords[0];
     // print_r($matchWords);
      foreach ( $matchWords as $key=>$item ) {
          if ( $item == '' || in_array(mb_strtolower($item,"UTF-8"), $stopWords) || strlen($item) <= 3 ) {
              unset($matchWords[$key]);
          }
      }   
      $wordCountArr = array();
      if ( is_array($matchWords) ) {
          foreach ( $matchWords as $key => $val ) {
              //$val = mb_strtolower($val,"UTF-8");
              if ( isset($wordCountArr[$val]) ) {
                  $wordCountArr[$val]++;
              } else {
                  $wordCountArr[$val] = 1;
              }
          }
      }
      arsort($wordCountArr);
      $wordCountArr = array_slice($wordCountArr, 0, 10);
      return $wordCountArr;
}
function db_get_news($conn) {

    $sql = "SELECT * FROM rss_news ORDER BY id DESC LIMIT 20";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}

   
}

function db_get_users($conn) {

    $sql = "SELECT * FROM users ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_user_tek($conn,$id) {

    $sql = "SELECT * FROM users ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

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
function db_get_news_today($conn) {
$sql="SELECT * FROM `rss_news` where zaman between date_sub(now(),INTERVAL 1 DAY) and now() ORDER BY click_count DESC LIMIT 1";
    //$sql = "SELECT * FROM gunun_haberi,rss_news WHERE haber_id=rss_news.id ORDER BY gunun_haberi.id DESC LIMIT 1 ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}

   
}



function db_get_news_wiki($conn,$id) {
$id=(int)intval($id);
    $sql = "SELECT * FROM wiki WHERE haber_id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}

function db_get_news_detay($conn,$id) {
$id=(int)intval($id);
    $sql = "SELECT * FROM rss_news WHERE id=".$id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   return($result);
} else {
    return "err101";
}
   
}


function get_web_page( $url )
    {
        $user_agent='Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)';

        $options = array(

            CURLOPT_CUSTOMREQUEST  =>"GET",        //set request type post or get
            CURLOPT_POST           =>false,        //set to GET
            CURLOPT_USERAGENT      => $user_agent, //set user agent
            CURLOPT_COOKIEFILE     =>"cookie.txt", //set cookie file
            CURLOPT_COOKIEJAR      =>"cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLOPT_SSL_VERIFYPEER => false,
        );

        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;
    }

