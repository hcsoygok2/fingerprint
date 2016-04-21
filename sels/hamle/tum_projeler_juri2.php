 <?php
 
 
 
 
//echo $_SESSION["id"];
$juri=db_get_tc_juri2($conn,$_SESSION["id"]);
if($juri!="err101"){
                                                    while($juri2=$juri->fetch_assoc()){

//echo $juri2["proje_tc"];

												
                                                $result=db_get_tum_projeler_juri($conn,$juri2["proje_tc"]);
                                                if($result!="err101"){
                                                    while($row=$result->fetch_assoc()){
                                                        echo '<tr class="odd gradeX">
                                                    <td>'.$row["proje_kod"].'</td>
                                                       
                                                            <td>'.$row["isim"].'</td>
                                                               
                                                                        <td>'.$row["proje_isim"].'</td>
                                                                           ';
                                                    /*    echo '<td>';
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
                                                      */  echo '</td>';
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
                                                      
						
							echo '<a href="#" class="btn btn-danger btn-sm btn-delete" title="Sil"><i title="Sil" class="fa fa-trash-o"></i></a>
                        </td>
                                                       
                                                   
                                                </tr>';
                                                    }
                                                }
}}
                                                ?>