
<!-- SIDEBAR - START -->
            <div class="page-sidebar ">


                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
                    <div>
                         <img src="images/logo.png" style="background-color:white;height: auto; width:100%;">
                    </div>
                    <!-- USER INFO - START -->
                    <div class="profile-info row">
                        <?php 
                        $result_uye=  db_get_uye_tek($conn, $_SESSION["id"]);
                        if($result_uye!="err101"){
                            $row_uye=$result_uye->fetch_assoc();
                        }
                      

                        ?>
                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                            <a href="#">
                                <img src="<?php if(strlen($row_uye["foto"])>1) echo "uploads/profilepics/".$row_uye["foto"]; else echo "images/profile1.jpg"?>" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                                <a href=""><?php echo $row_uye["name"];?> <?php echo $row_uye["surname"];?></a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h3>

                            <p class="profile-title"><?php echo $row_uye["posta"];?></p>

                        </div>

                    </div>
                    <!-- USER INFO - END -->



                    <ul class='wraplist'>
                        <?php
                        if($_SESSION["type"]==0){
    echo '<li> 
                            <a href="anasayfa.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Anasayfa</span>
                            </a>
                        </li>
                        <li> 
                            <a href="basvuru_alt.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Başvuru</span>
                            </a>
                        </li>
                        <li> 
                            <a href="ana_basvuru.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Ana Değerlendirme Başvurusu</span>
                            </a>
                        </li>
						
                        
 ';
    if($_SESSION["status"]==1){
    echo
                            '<li><a href="proje_tek.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Projem</span>
                            </a>
                        </li>';
    }
 
					   echo 	'
						<li> 
                            <a href="hesap.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Profil</span>
                            </a>
                        </li>

';
                        
}
else if($_SESSION["type"]==1 ){
    echo '
	
	
	
       
							<li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-suitcase"></i>
                                <span class="title">Ön Değerlendirme</span>
                                <span class="arrow "></span>
                            </a>

							
							
							
							
							<ul class="sub-menu">
							 <li > 
                            <a href="projeler.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Ön Değerlendirme Projeler</span>
								

                            </a>
							</li>
							<li> 
                            <a href="juri.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Ön Değerlendirme Jüriler</span>
                            </a>
                        </li>
							 <li> 
                            <a href="ara_sayfa_nojuri.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Juri Atanmamış Projeler</span>
                            </a>
                        </li>
                        <li> 
                            <a href="ara_sayfa.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Oylanmakta Olan Projeler</span>
                            </a>
                        </li>
                        <li> 
                            <a href="ara_sayfa_bitmis.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Oylaması Bitmiş Projeler</span>
                            </a>
                        </li>
							
							</ul>
							
                        </li>
						
						<li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-suitcase"></i>
                                <span class="title">Ana  Değerlendirme</span>
                                <span class="arrow "></span>
                            </a>

							
							
							
							
							<ul class="sub-menu">
						
                         <li> 
                            <a href="projeler2.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Ana Değerlendirme Projeler</span>
                            </a>
							
							
							<li> 
                            <a href="juri2.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Ana Değerlendirme Jüriler</span>
                            </a>
                        </li>
						
						<li> 
                            <a href="yetersiz.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Yetersiz Projeler</span>
                            </a>
                        </li>
                           <li> 
                            <a href="gelistirilebilir.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">İyileştirilebilir Projeler</span>
                            </a>
                        </li>
                           <li> 
                            <a href="basarili.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Başarılı Projeler</span>
                            </a>
                        </li>
						
							</ul>
							</li>
						
						
						<li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-suitcase"></i>
                                <span class="title">Eğitim</span>
                                <span class="arrow "></span>
                            </a>

							
							
							
							
							<ul class="sub-menu">
                        
    
	<li> 
                            <a href="egitim1.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">1 Eğitim Süreci</span>
                            </a>
                        </li>
						  <li> 
                            <a href="egitim2.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">2 Eğitim Süreci</span>
                            </a>
                        </li>
                       	   
						   </ul>
						   </li>
						  
						  <li> 
                            <a href="tum_projeler.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Tüm Projeler</span>
                            </a>
                        </li>
                        		  <li> 
                            <a href="silinen_projeler.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Silinen Projeler</span>
                            </a>
                        </li>
						<li> 
                            <a href="uyeler.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Üyeler</span>
                            </a>
                        </li>
						<li> 
                            <a href="istatistik.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">İstatistiki Veriler</span>
                            </a>
                        </li>
                        		<li> 
                            <a href="basvuru_kapat.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Başvuruları Kapat</span>
                            </a>
                        </li>
                        
';
}
    

else if($_SESSION["type"]==2 ){
     
         echo '<li>   
                            <a href="projeler.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Projeler</span>
                            </a>
                        </li>';
     
     
         echo '<li>   
                            <a href="projeler2.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Ana Değerlendirme Projeler</span>
                            </a>
                        </li>';
						
						echo '
						
						<li> 
                            <a href="hesap.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Profil</span>
                            </a>
                        </li>
						';
						
						echo' <li> 
                            <a href="tum_projeler_juri.php">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Tüm Projeler</span>
                            </a>
                        </li>';
     
   
   }
                        ?>
                        
                        
                        
                        
                         

                        

                    </ul>

                </div>
                <!-- MAIN MENU - END -->



                



            </div>
            <!--  SIDEBAR - END -->