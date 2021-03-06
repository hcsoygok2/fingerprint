<?php 
ob_start();
session_start();
 include_once 'database/db_connect.php';
include_once 'database/functions.php';
extract($_GET);

$result=  db_get_juri_tek($conn,$id);
$row_main = $result->fetch_assoc();
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
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="assets/plugins/jquery-ui/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/daterangepicker/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/timepicker/css/timepicker.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/datetimepicker/css/datetimepicker.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/ios-switch/css/switch.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/typeahead/css/typeahead.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/multi-select/css/multi-select.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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
                                <h2 class="title pull-left">Jüri Yönetimi</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-9 col-xs-10">
                                       
<form id="general_validate" action="controls/juri_kontrol.php" method="GET" novalidate="novalidate">
    
    <input type="hidden" name="id" value="<?php echo $row_main["id"];?>">
    <div class="form-group">
                                                <label class="form-label" for="formfield5">Ad</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield5" name="formfield5" value="<?php echo $row_main["name"];?>" >
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="formfield6">Soyad</label>
                                                
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield6" name="formfield6" value="<?php echo $row_main["surname"];?>" >
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="formfield7">Bölüm</label>
                                                
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield7" name="formfield7" value="<?php echo $row_main["department"];?>" >
                                                </div>
                                            </div>
                                            
                                             
                                             <div class="form-group">
                                                <label class="form-label" for="formfield10">Telefon</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield10" name="formfield10" value="<?php echo $row_main["phone"];?>" >
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="formfield11">Posta</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="formfield11" name="formfield11" value="<?php echo $row_main["posta"];?>" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield8">Parola</label>
                                                <span class="desc">Örnek: "P@mukk@le"</span>
                                                <div class="controls">
                                                    <input type="password" class="form-control" id="formfield8" name="formfield8" value="<?php echo $row_main["password"];?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="formfield9">Parolayı doğrula</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="password" class="form-control" id="formfield9" name="formfield9" value="<?php echo $row_main["password"];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                        <h4>Jüriye Atanacak Projeleri Seçerek Sağdaki Kutuya Gönderin</h4>
                                        <select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]">
                                           
                                            <?php
                                            $result=  db_get_kategori($conn);
                                      
                                          if($result!="err101"){
                                               while($row_kategori = $result->fetch_assoc()) {
                                                   echo '<optgroup label="'.$row_kategori["isim"].'">';
                                                    $result2=  db_get_proje_bykategori_exclude($conn, $row_kategori["isim"], $id);
                                          if($result2!="err101"){
                                              while($row = $result2->fetch_assoc()) {
                                              echo '<option value="'.$row["tc"].'">'.$row["proje_isim"].'</option>';
                                              }
                                          }
                                                echo '</optgroup>';
                                               }
                                          }
                                                   ?>
                                               
                                           
                                        </select>
                                    </div>

                                        
                                         

                                             

                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-primary">Ekle</button>
<!--                                                <button type="button" class="btn">Cancel</button>-->
                                            </div>
                                        </form>
                                        
                                        
<!--                                        <form action="controls/il_milli_kontrol.php" method="GET">
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">İl kodu</label>
                                            <span class="desc">Örnek: "20"</span>
                                            <div class="controls">
                                                <input type="text" name="kod" class="form-control" id="field-1" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="field-2">İl Adı</label>
                                            <span class="desc">Örnek: "Denizli"</span>
                                            <div class="controls">
                                                <input type="text" name="isim" class="form-control" id="field-1" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-3">Parola</label>
                                            <span class="desc">Örnek: "Cre@t!v!ty"</span>
                                            <div class="controls">
                                                <input type="password" name="parola" value="P@mukk@le" class="form-control" id="field-2" >
                                            </div>
                                        </div>
                                             <div class="form-group">
                                                <button type="submit" class="btn btn-primary ">Ekle</button>
                                                <button type="button" class="btn btn-purple  pull-right">Register now</button>
                                            </div>
                                         </form>-->
                                        

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
        <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script> 
      <!--  <script src="assets/js/form-validation.js" type="text/javascript"></script>-->   

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
 <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> <script src="assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> <script src="assets/plugins/daterangepicker/js/moment.min.js" type="text/javascript"></script> <script src="assets/plugins/daterangepicker/js/daterangepicker.js" type="text/javascript"></script> <script src="assets/plugins/timepicker/js/timepicker.min.js" type="text/javascript"></script> <script src="assets/plugins/datetimepicker/js/datetimepicker.min.js" type="text/javascript"></script> <script src="assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" type="text/javascript"></script> <script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.min.js" type="text/javascript"></script> <script src="assets/plugins/tagsinput/js/bootstrap-tagsinput.min.js" type="text/javascript"></script> <script src="assets/plugins/select2/select2.min.js" type="text/javascript"></script> <script src="assets/plugins/typeahead/typeahead.bundle.js" type="text/javascript"></script> <script src="assets/plugins/typeahead/handlebars.min.js" type="text/javascript"></script> <script src="assets/plugins/multi-select/js/jquery.multi-select.js" type="text/javascript"></script> <script src="assets/plugins/multi-select/js/jquery.quicksearch.js" type="text/javascript"></script> <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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



