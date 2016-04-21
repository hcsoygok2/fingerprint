<?php
ob_start();
session_start();
 include_once 'database/db_connect.php';
include_once 'database/functions.php';
if($_SESSION["login"]!=true ){
    header("Location: index.php");
}
$eposta=$_SESSION["user"];

if(!isset($_GET["success"])){
  
    if($_SESSION["type"]!=0 ){
    header("Location: index.php");
}
else{
$sql="SELECT status FROM uyeler WHERE posta='".$eposta."'";
                                       
                                        
                                        $result = $conn->query($sql);
                                        $row=$result->fetch_assoc();
                                        
                                        if($row["status"]!=1){
                                            
                                            header("Location: basvuru_alt.php");
                                            
                                        }
}
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
        <title>Hacettepe Hamle : Giriş Ekranı</title>
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
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
<?php

                    if(isset($_GET["success"])){
                        
                        echo '
                    <div class="clearfix"></div>
<div class="alert alert-success alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Başarılı:</strong> Başvurunuz alınmıştır.</div>
                                ';
                    }
                    ?>
                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Hacettepe Hamle</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Durum</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <?php 
                                        $sql="SELECT status FROM uyeler WHERE posta='".$eposta."'";
                                       
                                        
                                        $result = $conn->query($sql);
                                        $row=$result->fetch_assoc();
                                        
                                        if($row["status"]==1){
                                            $sqll="SELECT * FROM proje_basvuru WHERE email='".$eposta."'";
                                           
                                        
                                        $res = $conn->query($sqll);
                                        $row2=$res->fetch_assoc(); 
                                      // header("Location: proje_tek.php");
                                        
                                       
    
                                        
                                        
                                        }
                                        
                                        else{
                                            //header("Location: basvuru.php");
                                        }
                                        ?>
                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="invoice-head">
                                                    <div class="col-md-10 col-sm-12 col-xs-12 invoice-title">
                                                        
                                                        <?php 
                                                          $sql3="SELECT * FROM kamp_egitim,kamp_proje,kamp  WHERE kamp_proje.tc='".$row2["tc"]."' AND kamp.id= kamp_proje.kamp_id AND kamp_egitim.kamp_id=kamp.id";
                                           
                                        
                                        if($egitim = $conn->query($sql3)){
                                             $row3=$egitim->fetch_assoc();
                                            
                                        }
                                        
                                                        
                                                        if($row2["seviye"]==2 && $row2["asama"]>0)
                                                        {
                                                            
                                                            
                                                         echo' <form name="b2" id="b2" action="controls/anabasvuru.php" method="POST" enctype= "multipart/form-data">
														 
														 <input type="hidden" name="tc" value="'.$row2["tc"].'"/>
														 
														 <p>
                                      <label for="foto">Canvas Dosyası<br />
                            
                            <input type="file" name="basvuruform2" id="basvuruform2" class="input" value="" size="20" /></label>
                                                </p>
                                                <br>
                                                					 <p>
                                      <label for="foto2">1512 İş Planı Dosyası<br />
                            
                            <input type="file" name="basvuruform22" id="basvuruform22" class="input" value="" size="20" /></label>
                                                </p>
     <br>
                                                					 <p>
                                      <label for="foto3">Finansman Tablosu<br />
                            
                            <input type="file" name="basvuruform222" id="basvuruform222" class="input" value="" size="20" /></label>
                                                </p>
					
					
					
					<button type="submit" class="btn btn-primary">Ekle</button>
					
					
					
					</form>';   
                                                        }
                                                            else  if($row2["seviye"]==2 && $row2["asama"]<0)
                                                        {
                                                            echo 'Üzgünüz '  .$row2["isim"] .' ana değerlendirmeye geçemediniz';
                                                            
                                                        }
                                                            
                                                            ?>
                                                        
                                                         
                                                    </div>
                                                     </div>
                                              </div>
                                    </div>
                                </div>
                            </div>
                        </section></div>


                </section>
            </section>
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



