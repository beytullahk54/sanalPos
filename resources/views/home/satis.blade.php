
			<div  class='col-md-12 col-xs-12' v-if='asamaOdeme'>
				

                           
                <div class="container" >
                    <span style="color:red">Lütfen bu alana eğitimi alacak katılımcı bilgisini giriniz.</span>
                    <form method="post" action="https://sanalpos2.ziraatbank.com.tr/fim/est3Dgate">
                        <input type="hidden" name="clientid" value="{{ $odeme['clientId']}}">
                        <input type="hidden" name="amount" :value='toplamUcret'>

                        <input type="hidden" name="oid" value="{{ $odeme['oid']}}">	
                        <input type="hidden" name="okUrl" value="{{ $odeme['okUrl']}}" >
                        <input type="hidden" name="failUrl" value="{{ $odeme['failUrl']}}" >
                        <input type="hidden" name="islemtipi" value="{{ $odeme['islemtipi']}}" >
                        <input type="hidden" name="taksit" value="{{ $odeme['taksit']}}">
                        <input type="hidden" name="rnd" value="{{ $odeme['rnd']}}" >
                        <input type="hidden" name="hash" :value="odeme_hash" >
                        <input type="hidden" name="currency" value="{{ $odeme['currency']}}" >

                        <input type="hidden" name="storetype" value="3D_PAY_HOSTING" >

                        <input type="hidden" name="refreshtime" value="10" >

                        <input type="hidden" name="lang" value="tr">
                        <input type="hidden" name="price1" :value='toplamUcret'>
                        <input type="hidden" name="total1" :value='toplamUcret'>
                        <input type="hidden" name="firmaadi" value="{{$SiteAyarlar[0]->SiteAdi}}">


                        <input type="hidden" name="Fismi" :value="fIsmi+' - ' + tcKimlik + ' - ' + fTel + ' - '  + fAdres + ' - '  + ' - ' + gorunenEgitimler" >
                        <input type="hidden" name="faturaFirma" value="">
                        <input type="hidden" name="Fadres" :value="fAdres">
                        <input type="hidden" name="Fadres2" value="">
                        <input type="hidden" name="Fil"  :value="fIl" >

                        <input type="hidden" name="Filce"  :value="fIlce">
                        <input type="hidden" name="Fpostakodu"  :value="fPostaKodu" >
                        <input type="hidden" name="tel" :value="fTel" value="">
                        <input type="hidden" name="fulkekod" value="tr">

                        <input type="hidden" name="nakliyeFirma" value="na fi">
                        <input type="hidden" name="tismi" :value="fIsmi+' - '+tcKimlik"  >
                        <input type="hidden" name="tadres" :value="fAdres" >
                        <input type="hidden" name="tadres2" value="test 2">

                        <input type="hidden" name="til"  :value="fIl"  >
                        <input type="hidden" name="tilce"  :value="fIlce" >
                        <input type="hidden" name="tpostakodu" value="">
                        <input type="hidden" name="tulkekod" value="tr">

                        <input type="hidden" name="itemnumber1"  :value="gorunenEgitimler">
                        <input type="hidden" name="productcode1" :value="gorunenEgitimler">
                        <input type="hidden" name="qty1" value="3">
                        <input type="hidden" name="desc1" value="a4 desc">
                        <input type="hidden" name="id1" value="a5">


                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer013">Ad Soyad</label>
                            <input type="text" class="form-control is-valid" v-model="fIsmi" id="validationServer013" placeholder="Ad Soyad"
                                required>
                            
                        </div>   
                        <div class="col-md-6 mb-3">
                            <label for="validationServer013">Tc Kimlik</label>
                            <input type="text" class="form-control is-valid" v-model="tcKimlik" id="validationServer013" placeholder="Tc Kimlik Numarası"
                                required>
                            
                        </div>  
                    </div>
                    <div class="form-row"> 
                        <div class="col-md-6 mb-3">
                            <label for="validationServer053">Telefon Numaranız</label>
                            <input type="text" v-model="fTel" class="form-control is-valid"  placeholder="Telefon Numaranız"
                                required>
                        
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="validationServer033">Adres <span style="color:red;">( Lütfen <b>İl ve İlçenizi</b> bu kısma yazmayı unutmayınız. Sertifikalarınızın sizlere ulaşabilmesi için önemlidir)</span></label>
                        <input type="text" class="form-control is-valid" v-model="fAdres" id="validationServer033" placeholder="Adresiniz"
                            required>
                    
                        </div>
                        <!--<div class="col-md-3 mb-3">
                        <label for="validationServer043">İl</label>
                        <input type="text" v-model="fIl" class="form-control is-valid"  placeholder="İl"
                            required>

                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer053">İlçe</label>
                            <input type="text" v-model="fIlce" class="form-control is-valid"  placeholder="İlçe"
                                required>
                        
                        </div>-->
                    
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input is-valid" required id="invalidCheck33" required>
                        <label class="custom-control-label" for="invalidCheck33">Bilgilerimin doğruluğunu kabul ediyorum</label>
                        </div>
                    
                    </div>
                    <button class="btn btn-primary" type="submit">Ödemeye Geç</button>
                    </form>
                </div>
                            -----
			</div>