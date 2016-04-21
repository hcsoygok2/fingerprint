<?php 
include_once './database/db_connect.php';
include_once './database/functions.php';
session_start();

if(isset($_GET["proje_id"])){
    $proje_id=$_GET["proje_id"];
    $_SESSION["proje_id"]=$proje_id;
}
else if(isset($_SESSION["proje_id"])){
    $proje_id=$_SESSION["proje_id"];
}
else{
    header("Location: projeler.php");
}

 $result=  db_get_proje_tek($conn, $proje_id);
                                          if($result=="err101"){
                                              header("Location: projeler.php");
                                          }
                                          else{
                                             
                                              $row = $result->fetch_assoc();
                                          }
                                          
?>
<!DOCTYPE html>
<html class=" ">
    <head>
        <!-- 
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 1.0
         * This file is part of Ultra Admin Theme.
        -->
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Hacettepe Hamle</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png">	<!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->




        <!-- CORE CSS FRAMEWORK - START -->
        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="assets/plugins/jquery-ui/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/timepicker/css/timepicker.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datetimepicker/css/datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/ios-switch/css/switch.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/typeahead/css/typeahead.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/multi-select/css/multi-select.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
         <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" "><!-- START TOPBAR -->
        <?php include_once 'top_nav.php';?>
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <?php include 'sidebar.php';?>
            <!-- START CONTENT -->
            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
<?php
                    if(isset($_GET["success"])){
                        if($_GET["success"]==1){
                        echo '
                    <div class="clearfix"></div>
<div class="alert alert-success alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Başarılı:</strong> Jüri ekleme işlemi başarılı oldu.</div>
                                ';
                        }
                        else if($_GET["success"]==2){
                            echo '
                    <div class="clearfix"></div>
<div class="alert alert-success alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Başarılı:</strong> Veritabanından silme işlemi başarılı oldu.</div>
                                ';
                        }
                    }
                    
                    else if(isset($_GET["error"])){
                        if($_GET["error"]==1){
                        echo '
                        
                        <div class="alert alert-error alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Hata:</strong> Üzgünüz! İşlem başarısız oldu. Jürilerin bir kısmı ya da hiçbiri atanamadı.
                                        </div>
                                              ';
                        }
                        else if($_GET["error"]==2){
                            echo '
                        
                        <div class="alert alert-error alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Hata:</strong> Üzgünüz! Veritabanından silme işlemi başarısız oldu.
                                        </div>
                                              ';
                        }
                    }
                            ?>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Proje Değerlendirme</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left"><?php echo $row["proje_isim"];?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="col-xs-4 col-sm-3">
                                            <div class="row"><div class='col-md-12' id="toc"></div></div>
                                        </div>
                                        <div class="col-xs-offset-4 col-xs-7 col-sm-offset-3 col-sm-9 tocify-content">
  <?php 
                        $result_uye=  db_get_uye_tek($conn, $_SESSION["id"]);
                        if($result_uye!="err101"){
                            $row_uye=$result_uye->fetch_assoc();
                        }
                      

                        ?>
                                            <h2>Katılımcı</h2>
                                            <div class="profil">
                                            <div class="uprofile-image">
                                            <img src="<?php if(strlen($row_uye["foto"])>1) echo "uploads/profilepics/".$row_uye["foto"]; else echo "images/profile1.jpg"?>" class="img-responsive">
                                        </div>
                                            <div class="uprofile-name">
                                            <h3>
                                                <a href="#"><?php echo $row["isim"];?></a>
                                                <!-- Available statuses: online, idle, busy, away and offline -->
                                                <span class="uprofile-status online"></span>
                                            </h3>
                                            <p class="uprofile-title"><?php echo $row["katilimci_durum"];?></p>
                                        </div>
                                            <div class="uprofile-info">
                                            <ul class="list-unstyled">
                                                 <li><i class="fa fa-user"></i> TC Kimlik No: <?php echo $row["tc"];?></li>
                                                <li><i class="fa fa-calendar"></i> Doğum Tarihi: <?php echo $row["dtarih"];?></li>
                                                <li><i class="fa fa-mobile"></i> Telefon No: <?php echo $row["telno"];?></li>
                                               <li><i class="fa fa-mobile"></i> E-posta: <?php echo $row["email"];?></li>
											   <li><i class="fa fa-envelope"></i> Adres: <?php echo $row["adres"];?></li>
						                       <li><i class="fa fa-envelope"></i> Posta Kodu: <?php echo $row["posta"];?></li>
											   <li><i class="fa fa-envelope"></i> Son Alınan Derece: <?php echo $row["sond"];?></li>
						                       <li><i class="fa fa-mobile"></i> Son Alınan Derece Tarihi: <?php echo $row["sondt"];?></li>
						                       <li><i class="fa fa-mobile"></i> Katılımcı Durumu: <?php echo $row["katilimci_durum"];?></li>
											   <li><i class="fa fa-user"></i> Okuduğunuz, mezun olduğunuz ya da çalıştığınız Üniversite: <?php echo $row["uni"];?></li>
                                                <li><i class="fa fa-user"></i> Üniversite Bölüm: <?php echo $row["uni_bolum"];?></li>
                                                <li><i class="fa fa-user"></i> Ünvan: <?php echo $row["unvan"];?></li>
                                                <li><i class="fa fa-calendar"></i> Başvuru Tarihi: <?php echo $row["basvuru_tarihi"];?></li>
                                            </ul>
                                        </div>
                                                </div>
                                           <br>
                                          
                                           <h2>Jüriler</h2>   
                                           
                                           <?php 
                                           if($_SESSION["type"]==1){
                                           echo'<a class="btn btn-success btn-block" data-toggle="modal" href="#ultraModal-1">Jüri Ekle</a>';
                                           }
                                            $juri_id_for_later=array();
                                            $result_juri =  db_get_proje_juri($conn, $row["tc"]);
                                            if($result_juri!="err101"){
                                                $cnt=0;
                                            while($row_juri=$result_juri->fetch_assoc()){
                                                
                                                $juri_id_for_later[$cnt]=$row_juri["id"];
                                            echo '<div class="profil">
                                            
                                            <div class="uprofile-name">
                                            <h3>
                                                <a href="#">'.$row_juri["name"].' '.$row_juri["surname"].'</a>
                                                <!-- Available statuses: online, idle, busy, away and offline -->
                                                <span class="uprofile-status online"></span>
                                            </h3>
                                            
                                            
                                        </div>
                                            
                                                </div>';
                                            
                                            if($_SESSION["type"]==1){
                                               $result_degerlendirme=db_get_proje_degerlendirme_tek($conn, $row_juri["id"], $row["tc"]);
                                            if($result_degerlendirme!="err101"){
                                                $row_degerlendirme=$result_degerlendirme->fetch_assoc();
                                            echo '<div class="col-md-12 col-sm-12 col-xs-12">
                                                <h3>Juri '.$row_juri["name"].' '.$row_juri["surname"].' Oylaması</h3><br>
                                                <div class="table-responsive">
                                                    <table class="table table-hover invoice-table">
                                                        <thead>
                                                            <tr>
                                                                <td><h4>Eşik 1</h4></td>
                                                                <td class="text-center"><h4>Eşik 2</h4></td>
                                                                <td class="text-center"><h4>Eşik 3</h4></td>
                                                                <td class="text-center"><h4>Eşik 4</h4></td>
                                                                <td class="text-center"><h4>Eşik 5</h4></td>
                                                                <td class="text-center"><h4>Eşik 6</h4></td>
                                                                <td class="text-center"><h4>Sonuç</h4></td>
                                                                 <td class="text-center"><h4>Yeniden Puanla</h4></td>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>';
                                               echo'<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                            <tr>
                                                                
                                                                    <td>'; if($row_degerlendirme["esik1"]=="on") echo "yeterli"; else echo "yetersiz"; echo '</td>
                                                                <td class="text-center">'; if($row_degerlendirme["esik2"]=="on") echo "yeterli"; else echo "yetersiz"; echo '</td>
                                                                    <td class="text-center">'; if($row_degerlendirme["esik3"]=="on") echo "yeterli"; else echo "yetersiz"; echo '</td>
                                                                        <td class="text-center">'; if($row_degerlendirme["esik4"]==1) echo "iyi"; else if($row_degerlendirme["esik4"]==2) echo "orta"; else echo "kötü"; echo '</td>
                                                                            <td class="text-center">'; if($row_degerlendirme["esik5"]==1) echo "iyi"; else if($row_degerlendirme["esik5"]==2) echo "orta"; else echo "kötü"; echo '</td>
                                                                                <td class="text-center">'; if($row_degerlendirme["esik6"]==1) echo "iyi"; else if($row_degerlendirme["esik6"]==2) echo "orta"; else echo "kötü"; echo '</td>
                                                                        <td class="text-center">'; if($row_degerlendirme["sonuc"]=="1") echo "yeterli"; else echo "yetersiz"; echo '</td>    
                                                                ';
                                                                    if($row_degerlendirme["tekrar"]==0){
                                                                        echo '<td class="text-center"><a href="controls/yeniden_puanla.php?juri_id='.$row_juri["id"].'&proje_tc='.$row["tc"].'&proje_id='.$proje_id.'" class="btn btn-primary btn-sm" title="Jüri Yeniden Oylasın"><i title="Jüri Yeniden Oylasın" class="fa fa-pencil"></i></a></td>';
                                                               
                                                                    }
																	else if($row_degerlendirme["tekrar"]==1){
                                                                      echo ' <td class="text-center">Yeniden Değerlendirme Bekleniyor</td> ';
                                                                    }
                                                                    else if($row_degerlendirme["tekrar"]==2){
                                                                      echo ' <td class="text-center">Yeniden Değerlendirme Yapıldı</td> ';
                                                                    }
                                                                     echo '<tr>
                                                            
                                                            </tr>';
                                                          echo'  
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>';
                                            
                                            }
                                            else{
                                                echo '<a class="btn btn-danger btn-block" href="controls/juri_iptal.php?juri_id='.$row_juri["id"].'&proje_tc='.$row["tc"].'&proje_kod='.$row["proje_kod"].'&$proje_id='.$row["id"].'&formfield10=admin tarafindan">'.$row_juri["name"].' '.$row_juri["surname"].' Jürilikten Çıkar</a>';
                                            }
                                            }
                                            
                                            $cnt++;
                                            }
                                            }
                                            
                                            ?>
                                            
                                            <br>
                                           
                                            <h2>Ekip Üyeleri</h2>    
                                           
                                            <?php 
                                            
                                            $result =  db_get_ekip($conn, $row["tc"]);
                                            if($result!="err101"){
                                            while($row_ekip=$result->fetch_assoc()){
                                                
                                            echo '<div class="profil">
                                            <div class="uprofile-image">
                                            <img src="data/profile/user.png" class="img-responsive">
                                        </div>
                                            <div class="uprofile-name">
                                            <h3>
                                                <a href="#">'.$row_ekip["isim"].'</a>
                                                <!-- Available statuses: online, idle, busy, away and offline -->
                                                <span class="uprofile-status online"></span>
                                            </h3>
                                            <p class="uprofile-title">'.$row_ekip["katilimci_durum"].'</p>
                                        </div>
                                            <div class="uprofile-info">
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-user"></i> TC Kimlik No: '.$row_ekip["tc"].'</li>
                                                <li><i class="fa fa-calendar"></i> Doğum Tarihi: '.$row_ekip["dtarih"].'</li>
                                                <li><i class="fa fa-mobile"></i> Telefon No: '.$row_ekip["telno"].'</li>
                                                <li><i class="fa fa-envelope"></i> E-mail Adresi: '.$row_ekip["email"].'</li>
                                            </ul>
                                        </div>
                                                </div>';
                                            }
                                            }
                                            ?>
                                            
                                            <br>

                                            <h2>Proje Hakkında</h2>
                                            <p><strong>Projenin İsmi: </strong><?php echo $row["proje_isim"];?></p>
                                            <p><strong>Projenin Alanı: </strong><?php echo $row["proje_alan"];?></p>
                                            <br>

                                            

                                            <h2>Projenin Tanımı</h2>
                                            <p><?php echo $row["proje_tanim"];?></p> 
                                           <br>
                                            
                                            
                                            <h2>Projenin Amacı</h2>
                                            <p><?php echo $row["proje_amac"]?></p> 
                                            <br>
                                            <h2>Projenin Hedefi</h2>
                                            <p><?php echo $row["proje_hedef"];?></p> 
                                            <br>
                                            <h2>Dosyalar</h2>
                                            <?php 
                                            $result =  db_get_dosya($conn, $row["tc"]);
                                            if($result!="err101"){
                                            while($row_dosya=$result->fetch_assoc()){
                                                echo '<p><a href="uploads/'.$row["tc"].'/'.$row_dosya["FILE_NAME"].'" target="_blank">'.$row_dosya["FILE_NAME"].'</a></p>';
                                            }
                                            }
                                            if($result!="err101"){
                                            $result =  db_get_dosya2($conn, $row["tc"]);
                                            while($row_dosya=$result->fetch_assoc()){
                                                echo '<p><a href="uploads/'.$row["tc"].'/'.$row_dosya["FILE_NAME"].'" target="_blank">'.$row_dosya["FILE_NAME"].'</a></p>';
                                            }
                                            }
                                            
                                            
                                            
                                            ?>
                                            <br>
                                            <?php 
											if($_SESSION["type"]==2){
                                             
                                                $result_degerlendirme=  db_get_proje_degerlendirme_tek($conn, $_SESSION["id"], $row["tc"]);
                                                         if($result_degerlendirme!="err101"){
                                                $row_degerlendirme=$result_degerlendirme->fetch_assoc();
                                                if($row_degerlendirme["tekrar"]==1){
                                                    echo '<h2>Tekrar Puanla</h2>
                                           <a data-toggle="modal" href="#ultraModal-5" class="btn btn-primary btn-block">Tekrar Değerlendir</a><br>';
                                                }
                                                else if($row_degerlendirme["tekrar"]==2){
                                                     echo '<h2>Puanlandı</h2>
                                           <a data-toggle="modal" href="#" class="btn btn-primary btn-block">Tekrar Değerlendirilmiştir</a><br>';       
                                                }
                                                  
                                                
                                                         }
                                                         else{
                                                              echo '<h2>Bu proje alanınız değil mi?</h2>
                                            <a data-toggle="modal" href="#ultraModal-2" class="btn btn-danger btn-block">Jürilikten çekil</a><br>';
                                                             echo '<h2>Puanla</h2>
                                            <a data-toggle="modal" href="#ultraModal-5" class="btn btn-primary btn-block">Değerlendir</a><br>';
                                                
                                                         }
  }

else if($_SESSION["type"]==1){
    echo '<a class="btn btn-success btn-block" href="controls/ana_degerlendirme.php?id='.$proje_id.'" >Ana Değerlendirmeye Geçir</a>';
}
                                            
                                            ?>
                                                  <br>
                                            <?php
                                            if($_SESSION["type"]==1){
                                        echo'    <h2> Projeyi 
                                                Sil</h2>
                                            <a href="controls/projesil.php?id='.$row["id"].'" class="btn btn-danger btn-sm btn-delete" title="Sil"><i title="Sil" class="fa fa-trash-o"></i></a>'; } ?>
                                       
                                        </div>

                                    </div>
                                </div>
                            </div>
                             <!-- modal start -->
                             
                                        <?php include 'proje_degerlendirme.php';?>
                                        <!-- modal end -->
                        </section></div>



                </section>
            </section>
            <!-- END CONTENT -->
            <!-- END CONTENT -->
            <?php include 'chatapi.php';?>


            <div class="chatapi-windows ">


            </div>    </div>
        <!-- END CONTAINER -->
        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


       <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> <script src="assets/plugins/tocify/js/jquery.tocify.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/autosize/autosize.min.js" type="text/javascript"></script><script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> <script src="assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> <script src="assets/plugins/daterangepicker/js/moment.min.js" type="text/javascript"></script> <script src="assets/plugins/daterangepicker/js/daterangepicker.js" type="text/javascript"></script> <script src="assets/plugins/timepicker/js/timepicker.min.js" type="text/javascript"></script> <script src="assets/plugins/datetimepicker/js/datetimepicker.min.js" type="text/javascript"></script> <script src="assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" type="text/javascript"></script> <script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.min.js" type="text/javascript"></script> <script src="assets/plugins/tagsinput/js/bootstrap-tagsinput.min.js" type="text/javascript"></script> <script src="assets/plugins/select2/select2.min.js" type="text/javascript"></script> <script src="assets/plugins/typeahead/typeahead.bundle.js" type="text/javascript"></script> <script src="assets/plugins/typeahead/handlebars.min.js" type="text/javascript"></script> <script src="assets/plugins/multi-select/js/jquery.multi-select.js" type="text/javascript"></script> <script src="assets/plugins/multi-select/js/jquery.quicksearch.js" type="text/javascript"></script> <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 



        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 
<script>
            $( document ).ready(function() {
                
                <?php 
                if(isset($_GET["warning"])){
                    echo '$(".box_setting").click();';
                }
                ?>
});
            </script>








 <!-- modal start -->
                                        <div class="modal fade" id="ultraModal-1" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Modal Tittle</h4>
                                                    </div>
                                                    <form action="controls/projeye_juri_ekle_kontrol.php" method="GET">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="proje_tc" value="<?php echo $row["tc"];?>">
                                                        
                                                            
                                        
                                        <select name="my_multi_select2[]" class="multi-select" multiple="multiple" id="my_multi_select3" >
                                            <?php 
                                            
                                            
                                            $result_tum_juri=db_get_juri_exclude($conn, $juri_id_for_later);
                                             if($result_tum_juri!="err101"){
                                            while($row_tum_juri=$result_tum_juri->fetch_assoc()){
                                                echo '<option value="'.$row_tum_juri["id"].'">'.$row_tum_juri["name"].$row_tum_juri["surname"].'</option>';
                                            }
                                             }
                                            ?>
                                            
                                            
                                        </select>


                                    
                                                        

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Kapat</button>
                                                        <button class="btn btn-success" type="submit">Jüri Ata</button>
                                                        
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal end -->

                                        
                                        <!-- modal start -->
                                        <div class="modal fade" id="ultraModal-2" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Jüri Feshi</h4>
                                                    </div>
                                                    <form action="controls/juri_iptal.php" method="GET">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="proje_id" value="<?php echo $proje_id;?>">
                                                        <input type="hidden" name="proje_tc" value="<?php echo $row["tc"];?>">
                                                        <input type="hidden" name="proje_kod" value="<?php echo $row["proje_kod"];?>">
                                                        <input type="hidden" name="juri_id" value="<?php echo $_SESSION["id"];?>">
                                                        
                                        <div class="form-group">
                                            <label class="form-label" for="field-10">Jürilikten Çekilme Nedeni</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <textarea class="form-control autogrow" cols="5" name="formfield10" id="field-10" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;"></textarea>
                                            </div>
                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Kapat</button>
                                                        <button class="btn btn-success" type="submit">Gönder</button>
                                                        
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal end -->


        <!-- General section box modal start -->
        <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Hatırlatma</h4>
                    </div>
                    <div class="modal-body">

                        Bu projeyi yetersiz olarak değerlendirdiniz. Kararınızdan eminseniz "Devam" tuşuna basınız. Değişiklik yapmak için "Kapat" tuşuna basınız.

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Kapat</button>
                        <?php
                        if($result_degerlendirme=="err101"){
                                                            echo '<a href="controls/proje_degerlendirme_kontrol.php" <button class="btn btn-success" type="button">Devam</button>';
                                                        }
                                                        else{
                                                             echo '<a href="controls/proje_degerlendirme_degistir_kontrol.php" <button class="btn btn-success" type="button">Devam</button>';
                                                        }
                                                           
                                                       
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
        
    </body>
</html>


