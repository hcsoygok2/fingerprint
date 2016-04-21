<?php 
include_once './database/db_connect.php';
include_once './database/functions.php';
session_start();
if($_SESSION["type"]!=1 && $_SESSION["type"]!=2 ){
    header("Location: index.php");
}

unset($_SESSION["return_form_elements"]);

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
        <title>Ultra Admin : Default Layout</title>
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

            <?php include_once 'sidebar.php';?>
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
                                            <strong>Başarılı:</strong> Veritabanına ekleme işlemi başarılı oldu.</div>
                                ';
                        }
                      
                    }
                    
                    else if(isset($_GET["error"])){
                        if($_GET["error"]==1){
                        echo '
                        
                        <div class="alert alert-error alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Hata:</strong> Üzgünüz! İşlem başarısız oldu. Lütfen girilen veriyi kontrol edin ve tekrar deneyin.
                                        </div>
                                              ';
                        }
                       
                    }
                            ?>
                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Projeler</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Tümü</h2>
<!--                               <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div> -->
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        
<!--                                             <div class="row">-->
                                     <?php 
                                     $cnt=0;
                                     $asamalar=array();
                                                $asamalar[0]="status-offline";
                                                $asamalar[1]="status-away";
                                                $asamalar[2]="status-busy";
                                                $asamalar[3]="status-available";
                                                if($_SESSION["type"]==2){
                                                
                                           $result=  db_get_kategori_juri2($conn);
                                            }
                                            else{
                                                
                                            $result=  db_get_kategori($conn);
                                            }
                                     
                                      
                                          if($result!="err101"){
                                               while($row_kategori = $result->fetch_assoc()) {
                                                   if($cnt%3==0){
                                                       echo '<div class="row">';
                                                   }
                                                   $cnt++;
                                     echo ' <div class="col-md-4 col-sm-4 col-xs-4">
                                       <div class="r3_notification db_box">
                                            <h4>'.$row_kategori["isim"].'</h4>

                                            <ul class="list-unstyled notification-widget">';
                                            if($_SESSION["type"]==2){
                                                
                                            $result2=  db_get_proje_bykategori_juri2($conn, $row_kategori["isim"], $_SESSION["id"]);
                                            }
                                            else{
                                                
                                            $result2=  db_get_proje_bykategori2_basarili($conn, $row_kategori["isim"]);
                                            }
                                          if($result2!="err101"){
                                             
                                           while($row = $result2->fetch_assoc()) {
                                               if($_SESSION["type"]==2){
                                                
                                           $result3=  db_get_proje_degerlendirme_tek2($conn, $_SESSION["id"], $row["tc"]);
                                           
                                           if($result3=="err101"){
                                              echo '<li class="unread '.$asamalar[0].'">';
                                          }
                                          else{
                                              $row_result=$result3->fetch_assoc();
                                               if ($row_result["puan2"]==0 || $row_result["puan3"]==0 || $row_result["puan4"]==0 ||$row_result["sonuc"]==0){
                                                   echo '<li class="unread '.$asamalar[0].'">';
                                               }
                                             else if ($row_result["puan2"]<10 || $row_result["puan3"]<12 || $row_result["puan4"]<8 ||$row_result["sonuc"]<50){
	
	echo '<li class="unread '.$asamalar[2].'">';
	
}
else if ($row_result["puan2"]>10 || $row_result["puan3"]>12 || $row_result["puan4"]>8 ||$row_result["sonuc"]>50){
	
	echo '<li class="unread '.$asamalar[3].'">';
	
}
else{
    
	  echo '<li class="unread '.$asamalar[1].'">';
}
                                           
                                          }
                                            }
                                            else{
                                                
                                            $result3=  db_get_sonuc($conn, $row["tc"]);
                                             if($result3=="err101"){
                                              echo '<li class="unread '.$asamalar[0].'">';
                                          }
                                          else{
                                              $row_result=$result3->fetch_assoc();
                                               if ($row_result["puan2"]==0 || $row_result["puan3"]==0 || $row_result["puan4"]==0 ||$row_result["asama2"]==0){
                                                   echo '<li class="unread '.$asamalar[0].'">';
                                               }
                                             else if ($row_result["puan2"]<10 || $row_result["puan3"]<12 || $row_result["puan4"]<8 ||$row_result["asama2"]<50){
	
	echo '<li class="unread '.$asamalar[2].'">';
	
}
else if ($row_result["puan2"]>10 || $row_result["puan3"]>12 || $row_result["puan4"]>8 ||$row_result["asama2"]>50){
	
	echo '<li class="unread '.$asamalar[3].'">';
	
}
else{
    
	  echo '<li class="unread '.$asamalar[1].'">';
}
                                           
                                          }
                                            }
                                               
                                         
                                               
                                               
                                          
                                          
                                               echo '
                                                    <a href="proje_detay2.php?proje_id='.$row["id"].'">
                                                        <div class="user-img">
                                                            <img src="data/profile/avatar-1.png" alt="user-image" class="img-circle img-inline">
                                                        </div>
                                                        <div>
                                                            <span class="name">
                                                                <strong>'.$row["proje_isim"].'</strong>
                                                                <span class="time small">- '.$row["isim"].'</span>
                                                                <span class="profile-status ';
//                                               $result3=  db_get_sonuc($conn, $row["tc"]);
//                                          if($result3!="err101"){
//                                              $row3 = $result3->fetch_assoc();
//                                               if($row3["sonuc"]=="geçti"){
//                                                   echo "available";
//                                               }
//                                               else{
//                                                   echo "busy";
//                                               }
//                                               
//                                          }
//                                          else{
//                                                   echo "offline";
//                                               }
                                               
                                               
                                                       echo ' pull-right"></span>
                                                            </span>';
                                                     if($_SESSION["type"]==1){   
                                                       echo '<span class="desc small">
                                                                Jüriler
                                                            </span>
                                                            ';
                                                       $result_juri=db_get_proje_juri2($conn, $row["tc"]);
                                                 if($result_juri!="err101"){
                                              while($row_juri = $result_juri->fetch_assoc()){
                                                  $result_degerlendirme=db_get_proje_degerlendirme_tek2($conn, $row_juri["id"], $row["tc"]);
                                                  if($result_degerlendirme!="err101"){
                                                $row_degerlendirme=$result_degerlendirme->fetch_assoc();
                                                if($row_degerlendirme["tekrar"]==2){
                                                    echo '<span class="desc small">
                                                                '.$row_juri["name"].' '.$row_juri["surname"].' (Proje Tekrar Oylanmıştır.)
                                                            </span>';
                                                }
                                                else if($row_degerlendirme["tekrar"]==1){
                                                    echo '<span class="desc small">
                                                                '.$row_juri["name"].' '.$row_juri["surname"].' (Proje Tekrar Oylanmayı Beklemektedir.)
                                                            </span>';
                                                }
                                                else{
                                                    echo '<span class="desc small">
                                                                '.$row_juri["name"].' '.$row_juri["surname"].' (Proje Oylanmıştır.)
                                                            </span>';
                                                }
                                                  }
                                                  else{
                                                      echo '<span class="desc small">
                                                                '.$row_juri["name"].' '.$row_juri["surname"].' (Proje Jüri Oylamasını Beklemektedir.)
                                                            </span>';
                                                  }
                                                  
                                                  
                                              }
                                                 }
                                                 else{
                                                     echo '<span class="desc small">
                                                                Bu proje için henüz jüri atanmadı.
                                                            </span>';
                                                 }
                                                       
                                                       
                                               }
                                               else if($_SESSION["type"]==2){
                                                   echo '<span class="desc small">
                                                                '.substr($row["proje_tanim"],0,40).'
                                                            </span>
                                                            ';
                                               }
                                                       
                                                       
                                                       
                                                 echo '
                                                            
                                                            
                                                        </div>
                                                    </a>
                                                </li>';
                                           }
                                           }
                                               


                                               


                                            echo '</ul>

                                        </div>
                                    </div>';
                                            if($cnt%3==0){
                                                       echo '</div>';
                                                   }
                                               }
                                          }
                                     ?>            
                                               
                                   		

                                                 
                                                 
                                    	

                                                 

<!--                                </div>  End .row -->
                                    </div>
                                </div>
                            </div>
                        </section></div>


                </section>
            </section>
            <!-- END CONTENT -->
            <div class="page-chatapi hideit">

                <div class="search-bar">
                    <input type="text" placeholder="Search" class="form-control">
                </div>

                <div class="chat-wrapper">
                    <h4 class="group-head">Groups</h4>
                    <ul class="group-list list-unstyled">
                        <li class="group-row">
                            <div class="group-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                            <div class="group-info">
                                <h4><a href="#">Work</a></h4>
                            </div>
                        </li>
                        <li class="group-row">
                            <div class="group-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                            <div class="group-info">
                                <h4><a href="#">Friends</a></h4>
                            </div>
                        </li>

                    </ul>


                    <h4 class="group-head">Favourites</h4>
                    <ul class="contact-list">

                        <li class="user-row" id='chat_user_1' data-user-id='1'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clarine Vassar</a></h4>
                                <span class="status available" data-status="available"> Available</span>
                            </div>
                            <div class="user-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_2' data-user-id='2'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Brooks Latshaw</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_3' data-user-id='3'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-3.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clementina Brodeur</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>

                    </ul>


                    <h4 class="group-head">More Contacts</h4>
                    <ul class="contact-list">

                        <li class="user-row" id='chat_user_4' data-user-id='4'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-4.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Carri Busey</a></h4>
                                <span class="status offline" data-status="offline"> Offline</span>
                            </div>
                            <div class="user-status offline">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_5' data-user-id='5'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-5.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Melissa Dock</a></h4>
                                <span class="status offline" data-status="offline"> Offline</span>
                            </div>
                            <div class="user-status offline">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_6' data-user-id='6'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Verdell Rea</a></h4>
                                <span class="status available" data-status="available"> Available</span>
                            </div>
                            <div class="user-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_7' data-user-id='7'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Linette Lheureux</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_8' data-user-id='8'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-3.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Araceli Boatright</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_9' data-user-id='9'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-4.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clay Peskin</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_10' data-user-id='10'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-5.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Loni Tindall</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_11' data-user-id='11'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Tanisha Kimbro</a></h4>
                                <span class="status idle" data-status="idle"> Idle</span>
                            </div>
                            <div class="user-status idle">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_12' data-user-id='12'>
                            <div class="user-img">
                                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Jovita Tisdale</a></h4>
                                <span class="status idle" data-status="idle"> Idle</span>
                            </div>
                            <div class="user-status idle">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>


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
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

        











        <!-- General section box modal start -->
        <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
            <div class="modal-dialog animated bounceInDown">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Section Settings</h4>
                    </div>
                    <div class="modal-body">

                        Body goes here...

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="button">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    </body>
</html>



