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

                                            <h2>Katılımcı</h2>
                                            <div class="profil">
                                            <div class="uprofile-image">
                                            <img src="data/profile/user.png" class="img-responsive">
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
                                                <li><i class="fa fa-envelope"></i> E-mail Adresi: <?php echo $row["email"];?></li>
                                            </ul>
                                        </div>
                                                </div>
                                           <br>
                                           
                                           
                                            <h2>Ekip Üyeleri</h2>    
                                           
                                            <?php 
                                            $result =  db_get_ekip($conn, $row["tc"]);
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
                                            <p><?php echo $row["proje_amac"];?></p> 
                                            <br>
                                            <h2>Projenin Hedefi</h2>
                                            <p><?php echo $row["proje_hedef"];?></p> 
                                            <br>
                                            <h2>Dosyalar</h2>
                                            <?php 
                                            $result =  db_get_dosya($conn, $row["tc"]);
                                            while($row_dosya=$result->fetch_assoc()){
                                                echo '<p><a href="uploads/'.$row["isim"].'/'.$row_dosya["FILE_NAME"].'" target="_blank">'.$row_dosya["FILE_NAME"].'</a></p>';
                                            }
                                            $result =  db_get_dosya2($conn, $row["tc"]);
                                            while($row_dosya=$result->fetch_assoc()){
                                                echo '<p><a href="uploads/'.$row["isim"].'/'.$row_dosya["FILE_NAME"].'" target="_blank">'.$row_dosya["FILE_NAME"].'</a></p>';
                                            }
                                            
                                            
                                            
                                            ?>
                                            <br>
                                        </div>

                                    </div>
                                </div>
                            </div>
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



