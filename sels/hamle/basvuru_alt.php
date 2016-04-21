<?php
ob_start();
session_start();
 include_once 'database/db_connect.php';
include_once 'database/functions.php';
if($_SESSION["login"]!=true ){
    header("Location: index.php");
}
if($_SESSION["type"]!=0 ){
    header("Location: index.php");
}
if(isset($_SESSION["form_elements"]) && isset($_GET["error"])){
$fe = $_SESSION["form_elements"];
}
$eposta=$_SESSION["user"];
$sql="SELECT status FROM uyeler WHERE posta='".$eposta."'";
                                       
                                        
                                        $result = $conn->query($sql);
                                        $row=$result->fetch_assoc();
                                        
                                        if($row["status"]==1){
                                            
                                            header("Location: anasayfa.php");
                                            
                                        }
                                        
                  $sql_basvuru="SELECT * FROM basvuru_durum WHERE id=1";
      
                                        $result_basvuru = $conn->query($sql_basvuru);
                                        $row_basvuru=$result_basvuru->fetch_assoc();
                                       
                                        if($row_basvuru["durum"]==0){
                                            header("Location: basvuru_kapali.php");
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
        <title>Ultra Admin : Form Wizard</title>
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

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
   <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" ">
        <!-- START TOPBAR -->
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
                    
                    else if(isset($_GET["error"])){
                        if($_GET["error"]==1){
                            echo '
                        
                        <div class="alert alert-error alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Hata:</strong> Üzgünüz! İşlem başarısız oldu. Yüklemeye çalıştığınız dosya 20mbdan büyük olamaz.
                                        </div>
                                              ';
                        }
                        else if($_GET["error"]==2){
                            echo '
                        
                        <div class="alert alert-error alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Hata:</strong> Üzgünüz! İşlem başarısız oldu. Girmiş olduğunuz TC kimlik numarası veya email adresiyle daha önce bir başvuru yapılmıştır. Lütfen girilen veriyi kontrol edin ve tekrar deneyin.
                                        </div>
                                              ';
                        }
                        else if($_GET["error"]==3){
                            echo '
                        
                        <div class="alert alert-error alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Hata:</strong> Üzgünüz! İşlem başarısız oldu. Formdaki verilerde eksik bulunmaktadır. Lütfen bütün alanları doldurun ve tekrar deneyin.
                                        </div>
                                              ';
                        }
                        else if($_GET["error"]==4){
                            echo '
                        
                        <div class="alert alert-error alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Hata:</strong> Üzgünüz! İşlem başarısız oldu. Lütfen hak ve gizlilik sözleşmesini kabul ettiğinizi beyan eden kutucuğu işaretleyeniz.
                                        </div>
                                              ';
                        }
                        
                    }
                            ?>
                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Proje Başvuru</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Başvuru Formu</h2>
<!--                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>-->
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-10 col-sm-10 col-xs-10">

                                        <form id="general_validate" action="controls/basvuru_alt_kontrol.php" method="POST" enctype="multipart/form-data">
                                            
                                            <div id="pills"class='wizardpills' >
                                                
                                        
                                                <ul class="form-wizard">
                                                    <li><a href="#pills-tab1" data-toggle="tab"><span>Kişisel Bilgiler</span></a></li>
                                                    <li><a href="#pills-tab2" data-toggle="tab"><span>Ekip Üyeleri</span></a></li>
                                                    <li><a href="#pills-tab3" data-toggle="tab"><span>Proje Bilgileri</span></a></li>
                                                    <li><a href="#pills-tab4" data-toggle="tab"><span>Dosyalar</span></a></li>
                                                    <li><a href="#pills-tab5" data-toggle="tab"><span>Hak Sözleşmesi</span></a></li>
                                                </ul>
                                                <div id="bar" class="progress active">
                                                    <div class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                </div>
                                                <div class="tab-content">
                                                    
                                                    <div class="tab-pane" id="pills-tab1">

                                                        <div class="panel-body">
                                                           <br>
                                                <br>
                                                
                                                
                                                </ul>
                                                      <br>
                                                <br>          
                                                                <div class="form-group">
                                            <label class="form-label" for="field-1">Girişimci Adayı Ad-Soyad</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-1" name="formfield1" value="<?php if(isset($fe["formfield1"]))echo $fe["formfield1"];?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="field-2">T.C. Kimlik No</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-2" name="formfield2" value="<?php if(isset($fe["formfield2"]))echo $fe["formfield2"];?>"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="field-3">Doğum Tarihi</label>
                                            <span class="desc">Örn: "27-08-1993"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" name="formfield3" value="<?php if(isset($fe["formfield3"]))echo $fe["formfield3"];?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="field-52">Semt:</label>
                                            <span class="desc">Örn: " Esat"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-52"  name="formfield52" value="<?php if(isset($fe["formfield52"]))echo $fe["formfield52"];?>">
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="form-label" for="field-62">Posta Kodu:</label>
                                            <span class="desc">Örn: " 06050"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-62"  name="formfield62" value="<?php if(isset($fe["formfield62"]))echo $fe["formfield62"];?>">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="form-label" for="field-72">İlçe:</label>
                                            <span class="desc">Örn: " Çankaya"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-72"  name="formfield72" value="<?php if(isset($fe["formfield72"]))echo $fe["formfield72"];?>">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="form-label" for="field-82">İl:</label>
                                            <span class="desc">Örn: " Ankara"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-82"  name="formfield82" value="<?php if(isset($fe["formfield82"]))echo $fe["formfield82"];?>">
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label class="form-label" for="field-42">Adresiniz:</label>
                                            <span class="desc">Örn: " Tunalı Hilmi Caddesi 13/3 Çankaya/Ankara"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-42"  name="formfield42" value="<?php if(isset($fe["formfield42"]))echo $fe["formfield42"];?>">
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label class="form-label" for="field-92">Son alınan derece</label>
                                            <span class="desc">Örn: " Lisans Doktara vb."</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-92"  name="formfield92" value="<?php if(isset($fe["formfield92"]))echo $fe["formfield92"];?>">
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="form-label" for="field-93">Son alınan derece tarihi</label>
                                            <span class="desc">Örn: ""</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-93"  name="formfield93" value="<?php if(isset($fe["formfield93"]))echo $fe["formfield93"];?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="field-4">Telefon No:</label>
                                            <span class="desc">Örn: "(534) 253-5353"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-4" data-mask="phone" name="formfield4" value="<?php if(isset($fe["formfield4"]))echo $fe["formfield4"];?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="field-5">Email</label>
                                            <span class="desc">Örn: "me@somesite.com"</span>
                                            <div class="controls">
                                                <input readonly=" readonly " type="text" class="form-control" id="field-5" name="formfield5" value="<?php if(isset($_SESSION["user"]))echo $_SESSION["user"];?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="field-6">Katılımcının Durumu</label>
                                            <span class="desc">Örn: "Öğrenci"</span>
                                            <div class="controls">
                                        <select class="form-control input-lg m-bot15" name="formfield6">
                                            <option <?php if(isset($fe["formfield6"])){if($fe["formfield6"]=="Öğrenci"){echo "selected";}}?>>Öğrenci</option>
                                            <option <?php if(isset($fe["formfield6"])){if($fe["formfield6"]=="Akademisyen"){echo "selected";}}?>>Akademisyen</option>
                                            <option <?php if(isset($fe["formfield6"])){if($fe["formfield6"]=="İş Sahibi"){echo "selected";}}?>>İş Sahibi</option>
                                            <option <?php if(isset($fe["formfield6"])){if($fe["formfield6"]=="Mezun Çalışmayan"){echo "selected";}}?>>Mezun Çalışmayan</option>
                                            <option <?php if(isset($fe["formfield6"])){if($fe["formfield6"]=="Mezun Çalışan"){echo "selected";}}?>>Mezun Çalışan</option>
                                        </select>
                                         </div>
                                        </div>
                                                                <div class="form-group">
                                            <label class="form-label" for="field-41">Okuduğunuz, mezun olduğunuz ya da çalıştığınız üniversite</label>
                                            <span class="desc">Örn: "Hacettepe Üniversitesi"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-41" name="formfield41" value="<?php if(isset($fe["formfield41"]))echo $fe["formfield41"];?>">
                                            </div>
                                        </div>
                                                                <div class="form-group">
                                            <label class="form-label" for="field-51">Üniversite Bölümü</label>
                                            <span class="desc">Örn: "Makina Mühendisliği"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-51" name="formfield51" value="<?php if(isset($fe["formfield51"]))echo $fe["formfield51"];?>">
                                            </div>
                                        </div>
                                                            
                                                            <div class="form-group">
                                            <label class="form-label" for="field-61">Unvan (Akademisyenler)</label>
                                            <span class="desc">Örn: "Dr. , Yard.Doç.Dr"</span>
                                            <div class="controls">
                                                <input type="text" class="form-control" id="field-61" name="formfield61" value="<?php if(isset($fe["formfield61"]))echo $fe["formfield61"];?>">
                                            </div>
                                        </div>
                                        
                                                                                 
                                                            
                                                            </div>

                                                    </div>
                                                    <div class="tab-pane" id="pills-tab2">
                                                        <br>
                                                        <br>
                                                        <h3>2. Ekip Üyesi (Zorunlu Değil)</h3>
                                                        <br>
                                                     <?php include 'ekip_uye.php';?>
                                                        <br>
                                                        <br>
                                                        <h3>3. Ekip Üyesi (Zorunlu Değil)</h3>
                                                        <br>
                                                              <?php include 'ekip_uye2.php';?>
                                                            
                                                    </div>
                                                    
                                                    
                                                    <div class="tab-pane" id="pills-tab3">
                                                        <div class="form-group">
                                            <br>
                                            <label class="form-label" for="field-8">İş Fikriniz Aşağıdaki Alanlardan Hangisine Aittir</label>
                                            <span class="desc">Örn: "Sağlık Teknolojileri"</span>
                                            <div class="controls">
                                        <select class="form-control input-lg m-bot15" name="formfield8">
                                            <option <?php if(isset($fe["formfield8"])){if($fe["formfield8"]=="İleri Teknolojiler"){echo "selected";}}?>>İleri Teknolojiler</option>
                                            <option <?php if(isset($fe["formfield8"])){if($fe["formfield8"]=="Sağlık Teknolojileri"){echo "selected";}}?>>Sağlık Teknolojileri</option>
                                           
                                            
                                        </select>
                                         </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="field-9">İş Fikrinin Adı</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <textarea class="form-control autogrow" cols="5" name="formfield9" id="field-9" placeholder="This textarea will grow in size with new lines." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;"> <?php if(isset($fe["formfield9"])){echo $fe["formfield9"];}?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="field-10">İş Fikrini Kısa Tanımı</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <textarea class="form-control autogrow" cols="5" name="formfield10" id="field-10" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;"><?php if(isset($fe["formfield10"])){echo $fe["formfield10"];}?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="field-11">İş Fikrinin Amacı</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <textarea class="form-control autogrow" cols="5" id="field-11" name="formfield11"style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;"><?php if(isset($fe["formfield11"])){echo $fe["formfield11"];}?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="field-12">İş Fikrinin Hedef Kitlesi</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <textarea class="form-control autogrow" cols="5" id="field-12" name="formfield12" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;"><?php if(isset($fe["formfield12"])){echo $fe["formfield12"];}?></textarea>
                                            </div>
                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="pills-tab4">
                                                         <div class="form-group has-static">
                                            
                                            <div class="controls">
                                                <p class="form-control-static">Katılımcı ile ilgili dosyalar</p>
                                                <button type="button" class="btn btn-default"><input type="file" name="files[]"   multiple/></button>
                                            </div>
                                                                                   </div>
                                                        
                                                        <div class="form-group has-static">
                                            
                                            <div class="controls">
                                                <p class="form-control-static">Proje ile ilgili dosyalar </p>
                                                <button type="button" class="btn btn-default"><input  type="file" name="files2[]"   multiple/></button>
                                            </div>
                                                                                   </div>
                                                        
                                                    </div>
                                                    <div class="tab-pane" id="pills-tab5">
                                                          <br><br><br>
                                                       <div class="r3_notification db_box">
<!--                                            <h4>Lorem Ipsum</h4>-->

                                            <ul class="list-unstyled notification-widget ps-container ps-active-y" style="height: 315px;">

                                                <div >
                                                    <p>Başvuru sırasında kimlik bilgilerimi doğru beyan ettiğimi ve yanıltıcı bilgi vermediğimi, Program ile ilgili yükümlülüklerimi yerine getireceğimi, Program esaslarına aykırı bir edimde bulunmam halinde doğacak tüm zararları kayıtsız ve şartsız olarak karşılayacağımı kabul, beyan ve taahhüt ederim.</p>
                                                    <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" name="formfield14"class="iCheck"> Kabul Ediyorum
                                                                    </label>
                                                                </div>
                                                </div>
                                                <div >
                                                    <p><a href="http://hacettepehamle.com/basvuru/sozlesme.html" target="_blank">Proje Hakları</a> ve <a href="http://hacettepehamle.com/wp-content/uploads/2015/01/hacettepe-gizlilik_12012015.docx"target="_blank">Gizlilik Sözleşmesi</a>. Sözleşme yarışmacının/yarışmacıların yarışmaya fikrini göndermesi anında akdedilmiş ve karşılıklı olarak yürürlüğe girmiştir.</p>
                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" name="formfield15"class="iCheck"> Kabul Ediyorum
                                                                    </label>
                                                                </div>
                                                </div>
                                                 <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -418px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 421px; height: 315px; right: 3px;"><div class="ps-scrollbar-y" style="top: 181px; height: 134px;"></div></div></ul>

                                        </div>
<!--                                                           <button type="submit" class="btn btn-primary">Başvur</button>-->
                                                    </div>

                                                    <div class="clearfix"></div>

                                                    <ul class="pager wizard">
                                                        <li class="previous first" style="display:none;"><a href="javascript:;">İlk</a></li>
                                                        <li class="previous"><a href="javascript:;">Geri</a></li>
                                                        <li class="next last" style="display:none;"><a href="javascript:;">Son</a></li>
                                                        <li class="next"><a href="javascript:;">İleri</a></li>
                                                        <li><button type="submit" class="btn btn-primary">Başvur</button></li>
                                                    </ul>
                                                </div>
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
<!--        <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script> -->
        <script src="assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script> <script src="assets/js/form-validation.js" type="text/javascript"></script> <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> <script src="assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> <script src="assets/plugins/daterangepicker/js/moment.min.js" type="text/javascript"></script> <script src="assets/plugins/daterangepicker/js/daterangepicker.js" type="text/javascript"></script> <script src="assets/plugins/timepicker/js/timepicker.min.js" type="text/javascript"></script> <script src="assets/plugins/datetimepicker/js/datetimepicker.min.js" type="text/javascript"></script> <script src="assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" type="text/javascript"></script> <script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.min.js" type="text/javascript"></script> <script src="assets/plugins/tagsinput/js/bootstrap-tagsinput.min.js" type="text/javascript"></script> <script src="assets/plugins/select2/select2.min.js" type="text/javascript"></script> <script src="assets/plugins/typeahead/typeahead.bundle.js" type="text/javascript"></script> <script src="assets/plugins/typeahead/handlebars.min.js" type="text/javascript"></script> <script src="assets/plugins/multi-select/js/jquery.multi-select.js" type="text/javascript"></script> <script src="assets/plugins/multi-select/js/jquery.quicksearch.js" type="text/javascript"></script> <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

        <script src="assets/plugins/inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script><script src="assets/plugins/autonumeric/autoNumeric.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/autosize/autosize.min.js" type="text/javascript"></script><script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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



