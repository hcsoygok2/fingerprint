<!DOCTYPE html>
<?php 
session_start();
 include_once 'database/db_connect.php';
include_once 'database/functions.php';

?>
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
        <title>Sels Control Panel</title>
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
        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->
    </head>
	
	
	<body class=" ">
    <!-- START TOPBAR -->
    <div class='page-topbar '>
        <div class='logo-area'>
        </div>
        <div class='quick-area'>
            <div class='pull-left'>
                <ul class="info-menu left-links list-inline list-unstyled">
                   
                </ul>
            </div>      
            <div class='pull-right'>
                <ul class="info-menu right-links list-inline list-unstyled">            
                    
                </ul>           
            </div>      
        </div>
    </div>
	
	<div class="page-container row-fluid">
    <!-- SIDEBAR - START -->
    <div class="page-sidebar ">
        <!-- MAIN MENU - START -->
        <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
            <!-- USER INFO - START -->
            <div class="profile-info row">
                 <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                                <a href="ui-profile.html">Admin</a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h3>

                            

                        </div>
            </div>
            <!-- USER INFO - END -->
            <ul class='wraplist'>
                 <li class=""> 
                            <a href="users.php">
                                <i class="fa fa-th"></i>
                                <span class="title">Users</span><span class="label label-orange nosubmenu"></span>
                            </a>
                        </li>
						 <li class=""> 
                            <a href="log.php">
                                <i class="fa fa-th"></i>
                                <span class="title">Logging</span><span class="label label-orange nosubmenu"></span>
                            </a>
                        </li>
            </ul>
        </div>
        <!-- MAIN MENU - END -->
        <div class="project-info">
            <div class="block1">        
                ...
            </div>
            <div class="block2">        
                ...
            </div>
        </div>
    </div>
	
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
                                <h1 class="title">Users Managment</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Users</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">   
                                <div class="button_ekle">
                                    <a href="user_add.php" class="btn btn-success btn-lg">Yeni Oluştur</a>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Surname</th>
                                                    <th>Path</th>
                                                    <th>Mail</th>
                                                    <th>Method</th>
													
                                                    <th>Manage</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Surname</th>
                                                    <th>Path</th>
                                                    <th>Mail</th>
                                                    <th>Method</th>
                                                    <th>Manage</th>
                                                </tr>
                                            </tfoot>

                                            <tbody>
                                                <?php 
  
                                                    $result=  db_get_users($conn);
                                                    while($row = $result->fetch_assoc()) {
                                                    echo '<tr><td>'.$row["name"].'</td>'
                                                            . '<td>'.$row["surname"].'</td>'
                                                            . '<td>'.$row["path"].'</td>'
                                                            . '<td>'.$row["mail"].'</td>'
                                                            . '<td>'.$row["method"].'</td>'
                                                            
                                                            . '<td>
                            <a href="user_edit.php?id='.$row["id"].'" class="btn btn-primary btn-sm" title="Düzenle"><i title="Düzenle" class="fa fa-pencil"></i></a>
                            <a href="controls/juri_sil_kontrol.php?id='.$row["id"].'" class="btn btn-danger btn-sm btn-delete" title="Sil"><i title="Sil" class="fa fa-trash-o"></i></a>
                        </td>
                        </tr>';
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

</div>
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
<!-- CORE TEMPLATE JS - START --> 
<script src="assets/js/scripts.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 
<!-- Sidebar Graph - START --> 
<script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
<!-- Sidebar Graph - END --> 
</body>
</html>