
<?php 
session_start();
 include_once 'database/db_connect.php';
include_once 'database/functions.php';
if($_SESSION["type"]!=1 ){
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
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

				<?php
                    if(isset($_GET["success"])){
                        if($_GET["success"]==1){
                        echo '
                    <div class="clearfix"></div>
<div class="alert alert-success alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Başarılı:</strong> Mail Gönderildi.</div>
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
                                            <strong>Hata:</strong> Üzgünüz! İşlem başarısız oldu. Lütfen daha sonra deneyin.
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
                                <h1 class="title">Eğitim  ve Proje </h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php
                        echo '<a class="btn btn-warning btn-block" href="controls/egitim_mail.php?id='.$id.'" >Katılımcılara Toplu Mail Gönder</a>';
                        ?>

                    <div class="col-lg-6">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Eğitim  </h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">   
                                <div class="button_ekle">
                                    <a href="kamp_egitim_ekle.php?kamp_id=<?php echo $id; ?>" class="btn btn-success btn-lg">Yeni Oluştur</a>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Eğitim İsmi</th>
                                                    <th>Başlangıç Tarihi</th>
                                                    <th>Bitiş Tarihi</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                      <th>Eğitim İsmi</th>
                                                    <th>Başlangıç Tarihi</th>
                                                    <th>Bitiş Tarihi</th>
                                                  <th>İşlem</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
                                                <?php 
  
                                                    $result=  db_get_kamp_egitim($conn, $id);
                                                    if($result!="err101"){
                                                    while($row = $result->fetch_assoc()) {
                                                    echo '<tr><td>'.$row["name"].'</td>'
                                                            . '<td>'.$row["bastarih"].'</td>'
                                                            . '<td>'.$row["bitistarih"].'</td>'
                                                          
                                                            . '<td>
                            <a href="kamp_egitim_duzenle.php?id='.$row["id"].'" class="btn btn-primary btn-sm" title="Düzenle"><i title="Düzenle" class="fa fa-pencil"></i></a>
                            <a href="controls/kamp_egitim_sil_kontrol.php?id='.$row["id"].'" class="btn btn-danger btn-sm btn-delete" title="Sil"><i title="Sil" class="fa fa-trash-o"></i></a>
                        </td>
                        </tr>';
    }
                                                    }    ?>
                                                
                                              
                                            </tbody>
                                        </table>




                                    </div>
                                </div>
                            </div>
							
                        </section></div>

						
                    <div class="col-lg-6">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Proje</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">   
                                <div class="button_ekle">
                                    <a class="btn btn-success btn-block" data-toggle="modal" href="#ultraModal-1">Proje Ekle</a>
<!--                                    <a href="grup_ekle.php" class="btn btn-success btn-lg">Yeni Oluştur</a>-->
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Ad Soyad</th>
                                                    
                                                    <th>Proje Adı</th>
                                                    
                                                    <th>Mail</th>
                                                    <th>İşlem</th>						
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                      <th>Ad Soyad</th>
                                                    
                                                    <th>Proje Adı</th>
                                                    
                                                    <th>Mail</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
                                                <?php 
  
                                                    $result=  db_get_proje_bykamp($conn, $id);
                                                    if($result!="err101"){
                                                    while($row = $result->fetch_assoc()) {
                                                    echo '<tr><td style="font-size:x-small;">'.$row["isim"].'</td>'
                                                            . '<td style="font-size:x-small;" ><a href="proje_detay2.php?proje_id='.$row["id"].'">'.$row["proje_isim"].'</a></td>'
                                                            . '<td  style="font-size:x-small;">'.$row["email"].'</td>'
                                                            
                                                            . '<td>
                            <a href="controls/egitime_proje_sil_kontrol.php?id='.$row["id"].'&kamp_id='.$id.'" class="btn btn-danger btn-sm btn-delete" title="Sil"><i title="Sil" class="fa fa-trash-o"></i></a>
                        </td>
                        </tr>';
    }
                                                    }
                                                    ?>
                                                
                                              
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








 <div class="modal fade" id="ultraModal-1" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Eğitime Proje Ekle</h4>
                                                    </div>
                                                    <form action="controls/egitime_proje_ekle_kontrol.php" method="GET">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="kamp_id" value="<?php echo $id; ?>">
                                                        
                                           <div class="col-md-12">
                                        <h4>Bu Eğitime Katılacak Projeleri Seçerek Sağdaki Kutuya Gönderin</h4>
                                        <select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]">
                                           
                                            <?php
                                            $result=  db_get_kategori($conn);
                                      
                                          if($result!="err101"){
                                               while($row_kategori = $result->fetch_assoc()) {
                                                   echo '<optgroup label="'.$row_kategori["isim"].'">';
                                                    $result2= db_get_proje_exclude_kamp($conn, $row_kategori["isim"]);
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
                                        
                                        


                                    
                                                        

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Kapat</button>
                                                        <button class="btn btn-success" type="submit">Ekle</button>
                                                        
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>




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



