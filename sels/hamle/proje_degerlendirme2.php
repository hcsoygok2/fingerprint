
<?php 
session_start();
 include_once 'database/db_connect.php';
include_once 'database/functions.php';
if($_SESSION["type"]!=2 ){
    header("Location: index.php");
}
extract($_GET);
//$projetc=$_GET["projetc"];


$result_degerlendirme=db_get_proje_degerlendirme_tek2($conn, $juri_id, $proje_tc); 
         if($result_degerlendirme!="err101"){
             $row_degerlendirme=$result_degerlendirme->fetch_assoc();
         }
         else{
             $row_degerlendirme["puan1"]=0;
             $row_degerlendirme["puan2"]=0;
             $row_degerlendirme["puan3"]=0;
             $row_degerlendirme["puan4"]=0;
             $row_degerlendirme["puan5"]=0;
             $row_degerlendirme["sonuc"]=0;
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
                        if($_GET["error"]==0){
                        echo '
                        
                        <div class="alert alert-error alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Hata:</strong> Üzgünüz! İşlem başarısız oldu. Lütfen girilen veriyi kontrol edin ve tekrar deneyin.
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
                                <h1 class="title">Puanlama</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Puanlama</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">   
                                
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
									<?php 
                                                        if($result_degerlendirme=="err101"){
                                                            echo '<form action="controls/proje_degerlendirme_kontrol2.php" method="GET">';
                                                        }
                                                        else{
                                                        if($row_degerlendirme["tekrar"]==1 || isset($iyilestirme))
                                                             echo '<form action="controls/proje_degerlendirme_degistir_kontrol2.php" method="GET">';
                                                        }
                                                           
                                                        ?>
									
									
									<input type="hidden" name="tc" value="<?php echo $proje_tc; ?>">
                                                                        <input type="hidden" name="proje_id" value="<?php echo $proje_id; ?>">
    <input type="hidden" name="juri_id" value="<?php echo $juri_id?>">
                                        <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
										
                                            <thead>
                                                <tr>
                                                    <th>Puan Aralığı</th>
                                                    <th>Değerlendirme Konusu</th>
                                                    <th>Değerlendirme Kriterleri</th>
                                                    <th>Puan</th>
                                                   
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                    <th>Puan Aralığı</th>
                                                    <th>Değerlendirme Konusu</th>
                                                    <th>Değerlendirme Kriterleri</th>
                                                    <th>Puan</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
                                                
  
                                                   <tr><td>0-20 arasında puanlandırınız.</td>
												   <td>Yenilikçilik</td>
												   <td>*İş Fikri ile önerilen ürün, hizmet veya teknolojinin yenilikçilik yönünü varsa mevcuttaki benzerlerinden farklılaşarak önemli ölçüde fayda yaratma, problem çözme, kritik ve aciliyet içeren bir sorunu veya ihtiyacı ortadan kaldırma potansiyelini puanlayınız.</td>
												   
                                                           
                                                            <td>
                            <input type="text" <?php if(isset($iyilestirme)){
                                
                                echo 'readonly=" readonly "';
                                
                            }
?>class="form-control" id="puan1" name="puan1" <?php echo 'value="'.$row_degerlendirme["puan1"].'"'?>>
                            
							
							
                        </td>
                        </tr>
    
	
	
	
	                                             <tr><td>0-25 arasında puanlandırınız.</td>
												   <td>İş Planı ve Sunum Yetkinliği</td>
												   <td>*Teknolojinin ürün/müşteri/problem/çözüm uyumluluğu yeterli bir şekilde analiz edilmiş midir?
<br>*Teknolojinin ticarileştirme planı gerçekçi ve yeterli bir analizi içermekte midir?
<br>*Rakip analizi yeterli bir şekilde yapılmış mıdır?
<br>*Ürünün hedef müşteri ve pazarı net bir şekilde tanımlı mıdır?
<br>*İş planı başarılı ve yatırımcıda etki yaratacak şekilde sunulmuş mudur? 
</td>
												   
                                                           
                                                            <td>
                            <input type="text" <?php if(isset($iyilestirme)){
                                
                                if($row_degerlendirme["puan2"]>=10 && $row_degerlendirme["puan2"]<=15){
                                     
                                }
                                else{
                                    echo 'readonly=" readonly "';
                                }
                               
                            }
?>class="form-control" id="puan2" name="puan2"  <?php echo 'value="'.$row_degerlendirme["puan2"].'"'?>>
							
							
                        </td>
                        </tr>
						<tr><td>0-30 arasında puanlandırınız.</td>
												   <td>Ticarileşme Potansiyeli</td>
												   <td>*İş Fikrinin hayata geçirilebilme kolaylığı (Gerekli insan kaynağı, ekipman, finansman, altyapı, üretim süreci, karmaşıklık vb.) 
<br>*Mevcut teknolojik durumuyla ilave Ar-Ge vb. geliştirme faaliyetlerine ve harcamalarına ihtiyaç duymaması, Nihai ürün üretmeye yönelik belirsizlik ve risklerin bulunmaması,
<br>*Mevcut teknoloji ve ekipmanlarla üretilebilmesi, ilave teknoloji geliştirme Ar-Ge ve co-inovasyon gerektirmemesi,
<br>*İş Fikrinin çıktısı üründen rasyonel seviyede kazanç elde edilebilecek sayıda, kalitede ve boyutta üretilebilme kolaylığı (hizmetse yeteri kadar çok sayıda kişiye verilmesinin mümkün olup olmadığı)
<br>*İş Fikrinin çıktısı ürün bir hizmet ürünüyse satılabilir ve sunulabilir olması
<br>*İş Fikrini çıktısı ürünün lojistik zorluklarının durumu,
<br>*Üretim için çok büyük yatırım gerektirmemesi,
<br>*Kritik izin ve ruhsatlar ve politik riskler taşımaması
<br>*Piyasaya sürülmesinde üçüncü kişilerin veya kurumların fikri haklarına (patent, marka vb.) itilaf etmemesi ve lisanslamanın zor olmaması,
<br>*İş Fikrinin çıktısı ürün veya hizmetin ticarileşerek piyasada tutunmasını engelleyebilecek güçlü özel sektör rakipleri veya lobi gruplarının olmaması. </td>
												   
                                                           
                                                            <td>
                            <input type="text" <?php if(isset($iyilestirme)){
                                
                                if($row_degerlendirme["puan3"]>=12 && $row_degerlendirme["puan3"]<=18){
                                     
                                }
                                else{
                                    echo 'readonly=" readonly "';
                                }
                               
                            }
?>class="form-control" id="puan3" name="puan3" <?php echo 'value="'.$row_degerlendirme["puan3"].'"'?>>
							
							
                        </td>
                        </tr>
						<tr><td>0-20 arasında puanlandırınız.</td>
												   <td>Pazar Potansiyeli
</td>
												   <td>*İlgili sektördeki mevcut Pazar büyüklüğü
<br>*Ürünün mevcut Pazar içinde satılabileceği kitlenin büyüklüğü
<br>*Ürünün satılabileceği kitle içinde hedeflediği pazarın büyüklüğü
</td>
												   
                                                           
                                                            <td>
                            <input type="text" <?php if(isset($iyilestirme)){
                                
                                if($row_degerlendirme["puan4"]>=8 && $row_degerlendirme["puan4"]<=12){
                                     
                                }
                                else{
                                    echo 'readonly=" readonly "';
                                }
                               
                            }
?>class="form-control" id="puan4" name="puan4" <?php echo 'value="'.$row_degerlendirme["puan4"].'"'?>>
							
							
                        </td>
                        </tr>
                                

<tr><td>0-5 arasında puanlandırınız..</td>
												   <td>Sosyal ve Çevresel Faydaları
</td>
												   <td>*Projenin sosyal faydaları, kamu vicdanına dokunur yanları, sosyal yardımlaşma, dayanışma ve bütünleştirmeyi teşviki, dezavantajlı grupları gözetmesi, cinsiyet eşitliğini gözetmesi, vb.
Canlılar ve çevre üzerine olan etkileri.

</td>
												   
                                                           
                                                            <td>
                            <input type="text" <?php if(isset($iyilestirme)){
                                
                                echo 'readonly=" readonly "';
                                
                            }
?>class="form-control" id="puan5" name="puan5" <?php echo 'value="'.$row_degerlendirme["puan5"].'"'?>>
							
							
                        </td>
                        </tr>								
                                                
                                              
                                            </tbody>
                                        </table>
										
				<div class="form-group">
                                            <label class="form-label" for="field-10">Varsa Proje Hakkında Düşünceler</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <textarea class="form-control autogrow" cols="5" name="ek" id="field-10" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;"><?php if(isset($row_degerlendirme["ek"])) echo $row_degerlendirme["ek"]?></textarea>
                                            </div>
                                        </div>						

<div class="button_ekle">
    <?php 
                                                        if($result_degerlendirme=="err101"){
                                                            echo '<button type="submit" class="btn btn-primary">Oyla</button>';
                                                        }
                                                        else{
                                                            if($row_degerlendirme["tekrar"]==1 || isset($iyilestirme))
                                                              echo '<button type="submit" class="btn btn-primary">Değiştir</button>';
                                                        }
                                                          
                                                        ?>
                                    
                                </div>
</form>

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



