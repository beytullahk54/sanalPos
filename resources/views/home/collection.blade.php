<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
    $SiteAyarlar = DB::table( 'site_ayarlar' )
                     ->where('Id','1')
                     ->get();
    
    ?>
    <style>
    <style type="text/css">
        html, body {
        margin:0;
        height:100%;
        }
        #altfooter {
        position:absolute;
        bottom:0;
        width:100%;
        height:40px;   /* footer yüksekliği */
        text-align:center;
        }

    </style>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset($SiteAyarlar[0]->SiteFavicon)}}?v2">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.css"/>
    <title>{{$SiteAyarlar[0]->SiteAdi}} - {{$education->education_name}}</title>

  </head>
  <body>
        

        <!-- Image and text -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" >
            <img src="{{ URL::asset($SiteAyarlar[0]->SiteFavicon)}}"  style="width:10%"alt=""> {{$SiteAyarlar[0]->SiteAdi}}
            </a>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">Ödeme Sistemi</li>
            <li class="breadcrumb-item active" aria-current="page">  {{$education->education_name}}</li>
            </ol>
        </nav>
        <div id="app">
            <h1>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </h1>
            <div class="container" >
                <span style="color:red">Lütfen bu alana eğitimi alacak katılımcı bilgisini giriniz.</span>
                <form method="post" action="https://sanalpos2.ziraatbank.com.tr/fim/est3Dgate">
                    <input type="hidden" name="clientid" value="{{ $odeme['clientId']}}">
                    <input type="hidden" name="amount" value="{{ $odeme['amount']}}">

                    <input type="hidden" name="oid" value="{{ $odeme['oid']}}">	
                    <input type="hidden" name="okUrl" value="{{ $odeme['okUrl']}}" >
                    <input type="hidden" name="failUrl" value="{{ $odeme['failUrl']}}" >
                    <input type="hidden" name="islemtipi" value="{{ $odeme['islemtipi']}}" >
                    <input type="hidden" name="taksit" value="{{ $odeme['taksit']}}">
                    <input type="hidden" name="rnd" value="{{ $odeme['rnd']}}" >
                    <input type="hidden" name="hash" value="{{ $odeme['hash']}}" >
                    <input type="hidden" name="currency" value="{{ $odeme['currency']}}" >

                    <input type="hidden" name="storetype" value="3D_PAY_HOSTING" >

                    <input type="hidden" name="refreshtime" value="10" >

                    <input type="hidden" name="lang" value="tr">
                    <input type="hidden" name="price1" value="{{ $odeme['amount']}}">
                    <input type="hidden" name="total1" value="{{ $odeme['amount']}}">
                    <input type="hidden" name="firmaadi" value="{{$SiteAyarlar[0]->SiteAdi}}">


                    <input type="hidden" name="Fismi" :value="fIsmi+' - '+tcKimlik" >
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

                    <input type="hidden" name="itemnumber1"  value="{{$education->education_name}}">
                    <input type="hidden" name="productcode1" value="{{$education->education_name}}">
                    <input type="hidden" name="qty1" value="3">
                    <input type="hidden" name="desc1" value="a4 desc">
                    <input type="hidden" name="id1" value="a5">


                <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <label for="validationServer013">Ad Soyad</label>
                        <input type="text" class="form-control is-valid" v-model="fIsmi" id="validationServer013" placeholder="Ad Soyad"
                            required>
                        
                    </div>   
                    <div class="col-md-3 mb-3">
                        <label for="validationServer013">Tc Kimlik</label>
                        <input type="text" class="form-control is-valid" v-model="tcKimlik" id="validationServer013" placeholder="Ad Soyad"
                            required>
                        
                    </div>   
                    <div class="col-md-4 mb-3">
                        <label for="validationServer053">Telefon Numaranız</label>
                        <input type="text" v-model="fTel" class="form-control is-valid"  placeholder="Telefon Numaranız"
                            required>
                    
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="validationServer033">Adres</label>
                    <input type="text" class="form-control is-valid" v-model="fAdres" id="validationServer033" placeholder="Adresiniz"
                        required>
                
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="validationServer043">İl</label>
                    <input type="text" v-model="fIl" class="form-control is-valid"  placeholder="İl"
                        required>

                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationServer053">İlçe</label>
                        <input type="text" v-model="fIlce" class="form-control is-valid"  placeholder="İlçe"
                            required>
                    
                    </div>
                
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
        </div>
        <div id="altfooter"><img src="{{URL::Asset('panelFile/site/payments.png')}}" style="width:100%;    padding: 0% 10% 0% 10%;" alt=""></div>

        
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>

            let vm = new Vue({
                el: '#app',
                data: {
                    fIsmi: '',
                    fSoyadi: '',
                    fIl: '',
                    fIlce: '',
                    fAdres:'',
                    fPostaKodu:'',
                    fTel:'',
                    tcKimlik:''
                }
            })

        </script>

  </body>
</html>

<br><br><br>

