<?php

include_once 'database/db_connect.php';
include_once 'database/functions.php';
session_start();
if($_SESSION["type"]!=1 && $_SESSION["type"]!=2 ){
    header("Location: index.php");
}
extract($_GET);
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
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>



                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Silinen Projeler</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                          <thead>
                                                <tr>
                                                    <th>Proje Kod</th>
                                                    
                                                    <th>İsim</th>
                                                    
                                                    <th>Proje İsim</th>
                                                    <th>Jüriler</th>
                                                    <th>Seviye</th>
                                                    <th>Ön Değ.</th>
                                                    <th>Ana Değ.</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $sql = "SELECT * FROM proje_basvuru_silinen";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
                                                    while($row=$result->fetch_assoc()){
                                                        echo '<tr class="odd gradeX">
                                                    <td>'.$row["proje_kod"].'</td>
                                                       
                                                            <td>'.$row["isim"].'</td>
                                                               
                                                                        <td>'.$row["proje_isim"].'</td>
                                                                           ';
                                                        echo '<td>';
                                                        $result_juri=db_get_proje_juri($conn, $row["tc"]);
                                                 if($result_juri!="err101"){
                                              while($row_juri = $result_juri->fetch_assoc()){
                                                  $result_degerlendirme=db_get_proje_degerlendirme_tek($conn, $row_juri["id"], $row["tc"]);
                                                  if($result_degerlendirme!="err101"){
                                                $row_degerlendirme=$result_degerlendirme->fetch_assoc();
                                                if($row_degerlendirme["tekrar"]==2){
                                                    echo '<span class="desc small">
                                                                '.$row_juri["name"].' '.$row_juri["surname"].' (Proje Tekrar Oylanmıştır.)
                                                            </span><br>';
                                                }
                                                else if($row_degerlendirme["tekrar"]==1){
                                                    echo '<span class="desc small">
                                                                '.$row_juri["name"].' '.$row_juri["surname"].' (Proje Tekrar Oylanmayı Beklemektedir.)
                                                            </span><br>';
                                                }
                                                else{
                                                    echo '<span class="desc small">
                                                                '.$row_juri["name"].' '.$row_juri["surname"].' (Proje Oylanmıştır.)
                                                            </span><br>';
                                                }
                                                  }
                                                  else{
                                                      echo '<span class="desc small">
                                                                '.$row_juri["name"].' '.$row_juri["surname"].' (Proje Jüri Oylamasını Beklemektedir.)
                                                            </span><br>';
                                                  }
                                                  
                                                  
                                              }
                                                 }
                                                 else{
                                                     echo '<span class="desc small">
                                                                Bu proje için henüz jüri atanmadı.
                                                            </span><br>';
                                                 }
                                                        echo '</td>';
                                                        if($row["seviye"]==0){
                                                              echo'<td>Ön Değerlendirmede</td>';
                                                        }
                                                        else if($row["seviye"]==2){
                                                               echo'<td>Ana Değerlendirmede</td>';
                                                        }
                                                        else if($row["seviye"]==3){
                                                               echo'<td>Değerlendirmeler Bitti</td>';
                                                        }
                                                        
                                                        if($row["asama"]<0){
                                                             echo'  <td>Yetersiz</td>';
                                                        }
                                                        else if($row["asama"]>0){
                                                            echo'  <td>Başarılı</td>';
                                                        }
                                                        else{
                                                            echo'  <td>Notr</td>';
                                                        }
                                                               
                                                        
                                                        if($row["ana_asama"]==0){
                                                            echo'  <td>Oylanmadı</td>';
                                                        }
                                                        else if($row["ana_asama"]==1){
                                                            echo'  <td>Başarılı</td>';
                                                        }
                                                        else if($row["ana_asama"]==2){
                                                            echo'  <td>Geliştirilebilir</td>';
                                                        }
                                                        else if($row["ana_asama"]==-1){
                                                            echo'  <td>Yetersiz</td>';
                                                        }
                                                                             
                                                                                  
                                                                                   echo '<td>';
                                                                if($row["seviye"]==0){
                                                                    echo ' <a href="proje_detay.php?proje_id='.$row["id"].'" class="btn btn-primary btn-sm" title="içerik"><i title="içeriği gör" class="fa fa-search"></i></a>';
                         
                                                                }
                                                                else{
                                                                    echo ' <a href="proje_detay2.php?proje_id='.$row["id"].'" class="btn btn-primary btn-sm" title="içerik"><i title="içeriği gör" class="fa fa-search"></i></a>';
                         
                                                                }
                                                      
						
							echo '
                        </td>
                                                       
                                                   
                                                </tr>';
                                                    }
                                                }
                                                ?>
<!--                                                <tr class="odd gradeX">
                                                    <td>Trident</td>
                                                    <td>Internet
                                                        Explorer 4.0</td>
                                                    <td>Win 95+</td>
                                                    <td class="center"> 4</td>
                                                    <td class="center">X</td>
                                                </tr>-->
                                               
                                     
                                            </tbody>
                                        </table>




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
 <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script><script src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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



