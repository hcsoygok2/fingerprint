<?php 
         $result_degerlendirme=db_get_proje_degerlendirme_tek($conn, $_SESSION["id"], $row["tc"]); 
         if($result_degerlendirme!="err101"){
             $row_degerlendirme=$result_degerlendirme->fetch_assoc();
         }
         else{
             $row_degerlendirme["esik1"]="off";
             $row_degerlendirme["esik2"]="off";
             $row_degerlendirme["esik3"]="off";
             $row_degerlendirme["esik4"]="3";
             $row_degerlendirme["esik5"]="3";
             $row_degerlendirme["esik6"]="3";
         }
                                                        ?>

 <?php 
                                                        if($result_degerlendirme=="err101"){
                                                            echo '<form action="controls/proje_degerlendirme_kontrol.php" method="GET">';
                                                        }
                                                        else{
                                                            if($row_degerlendirme["tekrar"]==1)
                                                             echo '<form action="controls/proje_degerlendirme_degistir_kontrol.php" method="GET">';
                                                        }
                                                           
                                                        ?>

    <input type="hidden" name="tc" value="<?php echo $row["tc"]; ?>">
    <input type="hidden" name="juri_id" value="<?php echo $_SESSION["id"]?>">
    <input type="hidden" name="proje_id" value="<?php echo $_GET["proje_id"]?>">
<div class="modal fade" id="ultraModal-5"  tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
                                            <div class="modal-dialog" style="width: 65%">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><?php echo $row["proje_isim"];?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <!-- start -->

                                        <div class="pricing-tables">

                                            <div class="row">
                                                <div class="col-sm-4 col-md-4">

                                                    <div class="price-pack recommended">

                                                        <div class="head">
                                                            <h3>Eşik 1</h3>

                                                        </div>  

                                                        <ul class="item-list list-unstyled">
                                                            
                                                            <p>Girimşincinin sahip olduğu iş fikrinin/fikirlerinin uygulanmasında yerine getirilmesi <strong>mümkün olmayan</strong>
                                                            bir yasal gereklilik, izin ya da ruhsat var mı?</p>
                                                        </ul>

                                                        <div class="price">
                                                            <h2>Kritik Değerlendirme</h2>
                                                            <h4>Evet/Hayır?</h4>
                                                        </div>

                                                        <div class="form-block"><input type="checkbox" name="esik1" class="iswitch iswitch-lg iswitch-success" <?php if($row_degerlendirme["esik1"]=="on") echo 'checked=""';?>></div>
                                                    </div>


                                                </div>


                                                <div class="col-sm-4 col-md-4 ">
                                                    <div class="price-pack recommended">

                                                        <div class="head">
                                                            <h3>Eşik 2</h3>

                                                        </div>  

                                                         <ul class="item-list list-unstyled">
                                                            
                                                            <p>İş fikrinin TRL 7 seviyesine gelebilmesi için gerekli finasmanın yaklaşık büyüklüğü
                                                            , Hibe dahil girişimcinin ulaşabileceği potansiyel kaynaklar ile karşılanması olanaksız düzeyde midir?</p>
                                                        </ul>

                                                        <div class="price">
                                                            <h2>Kritik Değerlendirme</h2>
                                                            <h4>Evet/Hayır?</h4>
                                                        </div>

                                                         <div class="form-block"><input type="checkbox" name="esik2" class="iswitch iswitch-lg iswitch-success" <?php if($row_degerlendirme["esik2"]=="on") echo 'checked=""';?>></div>

                                                    </div>

                                                </div>


                                                <div class="col-sm-4 col-md-4  ">
                                                    <div class="price-pack">

                                                        <div class="head">
                                                            <h3>Eşik 3</h3>

                                                        </div>  

                                                        <ul class="item-list list-unstyled">
                                                            
                                                            <p>İş fikrinin uygulanması ve başarılı bir işletmenin kurulması için zorunlu olan ve girişimci tarafından
                                                            temini olanaklı olmayan özel bilgi, beceri, ustalık ve işgücü girdileri var mı?</p>
                                                        </ul>

                                                        <div class="price">
                                                            
                                                            <h4>Evet/Hayır?</h4>
                                                        </div>

                                                         <div class="form-block"><input type="checkbox" name="esik3" class="iswitch iswitch-lg iswitch-success" <?php if($row_degerlendirme["esik3"]=="on") echo 'checked=""';?>></div>

                                                    </div>

                                                </div>

                                            </div> <!-- row-->

                                        </div>
                                        <!-- end -->

                                    </div>
                                </div>
                                                        <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                        <!-- start -->

                                        <div class="pricing-tables">

                                            <div class="row">
                                                <div class="col-sm-4 col-md-4">

                                                    <div class="price-pack">

                                                        <div class="head">
                                                            <h3>Eşik 4</h3>

                                                        </div>  

                                                        <ul class="item-list list-unstyled">
                                                            
                                                            <p>Girişimci ve ekibinin ticarileştirmeye zaman ayırma potansiyeli hali hazırdaki konumu düşünüldüğünde
                                                            ne ölçüdedir? Girişimcinin iş fikrinin hızlı ticarileşebilmesi ve başarı şansına yönelik motivasyonu nasıldır?</p>
                                                        </ul>

                                                        <div class="price">
                                                            <h2></h2>
                                                            <h4>İyi-Orta-Kötü?</h4>
                                                        </div>

                                                         <ul class="list-unstyled">
                                                            
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-checkbox-2" class="skin-flat-green"  name="esik4" value="1" <?php if($row_degerlendirme["esik4"]=="1") echo 'checked=""';?>>
                                                                <label class="icheck-label form-label">İyi</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-checkbox-3" class="skin-flat-aero"  name="esik4" value="2" <?php if($row_degerlendirme["esik4"]=="2") echo 'checked=""';?>>
                                                                <label class="icheck-label form-label">Orta</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-checkbox-1" class="skin-flat-red"  name="esik4" value="3" <?php if($row_degerlendirme["esik4"]=="3") echo 'checked=""';?>>
                                                                <label class="icheck-label form-label" >Kötü</label>
                                                            </li>
                                                            
                                                        </ul>

                                                    </div>


                                                </div>


                                                <div class="col-sm-4 col-md-4 ">
                                                    <div class="price-pack">

                                                        <div class="head">
                                                            <h3>Eşik 5</h3>

                                                        </div>  

                                                        <ul class="item-list list-unstyled">
                                                            <p>Hedeflenen ürünlerin pazardaki karşılığı nasıldır? Pazar hem hacim hem de coğrafya açısından
                                                            tahmini olarak belirlenmiş midir ve ticarileşme açısından umut vadetmekte midir?</p>
                                                         </ul>

                                                        <div class="price">
                                                            <h2></h2>
                                                            <h4>İyi-Orta-Kötü?</h4>
                                                        </div>

                                                         <ul class="list-unstyled">
                                                            
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-checkbox-2" class="skin-flat-green"  name="esik5" value="1" <?php if($row_degerlendirme["esik5"]=="1") echo 'checked=""';?>>
                                                                <label class="icheck-label form-label">İyi</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-checkbox-3" class="skin-flat-aero"  name="esik5" value="2" <?php if($row_degerlendirme["esik5"]=="2") echo 'checked=""';?>>
                                                                <label class="icheck-label form-label">Orta</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-checkbox-1" class="skin-flat-red"  name="esik5" value="3" <?php if($row_degerlendirme["esik5"]=="3") echo 'checked=""';?>>
                                                                <label class="icheck-label form-label">Kötü</label>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>

                                                </div>


                                                <div class="col-sm-4 col-md-4  ">
                                                    <div class="price-pack">

                                                        <div class="head">
                                                            <h3>Eşik 6</h3>

                                                        </div>  

                                                        <ul class="item-list list-unstyled">
                                                            <p>Rakipleri karşısında temel rekabet avantajı bulunmakta mıdır, ne seviyededir?</p>
                                                        </ul>

                                                       <div class="price">
                                                            <h2></h2>
                                                            <h4>İyi-Orta-Kötü?</h4>
                                                        </div>

                                                         <ul class="list-unstyled">
                                                            
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-checkbox-2" class="skin-flat-green"  name="esik6" value="1" <?php if($row_degerlendirme["esik6"]=="1") echo 'checked=""';?>>
                                                                <label class="icheck-label form-label">İyi</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-checkbox-3" class="skin-flat-aero" name="esik6" value="2" <?php if($row_degerlendirme["esik6"]=="2") echo 'checked=""';?>>
                                                                <label class="icheck-label form-label">Orta</label>
                                                            </li>
                                                            <li>
                                                                <input tabindex="5" type="radio" id="flat-checkbox-1" class="skin-flat-red" name="esik6" value="3" <?php if($row_degerlendirme["esik6"]=="3") echo 'checked=""';?>>
                                                                <label class="icheck-label form-label">Kötü</label>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>

                                                </div>

                                            </div> <!-- row-->

                                        </div>
                                        <!-- end -->

                                    </div>
                                </div>
                                                        
                                                        
                                                      <div class="form-group">
                                            <label class="form-label" for="field-10">Not(proje ile ilgili notlarÄ±nÄ±z)</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <textarea class="form-control autogrow" cols="5" name="formfield10" id="field-10" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;"><?php if(isset($fe["formfield10"])){echo $fe["formfield10"];}?></textarea>
                                            </div>
                                        </div>
                                                       
                                                       
                                                      
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?php 
                                                        if($result_degerlendirme=="err101"){
                                                            echo '<button class="btn btn-success" type="submit">Gönder</button>';
                                                        }
                                                        else{
                                                            if($row_degerlendirme["tekrar"]==1)
                                                              echo '<button class="btn btn-success" type="submit">Değiştir</button>';
                                                        }
                                                          
                                                        ?>
                                                        
                                                        <button type="button" class="btn btn-info" data-dismiss="modal">Kapat</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
</form>