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
        @include('home.style')

        <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset($SiteAyarlar[0]->SiteFavicon)}}?v2">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.css"/>
        <title>{{$SiteAyarlar[0]->SiteAdi}} - </title>

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
            <li class="breadcrumb-item active" aria-current="page"> -</li>
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
                <span style="color:red"></span>
        
            </div>

            <div class="container"  >
                <div class="row" >
                    <div style="
                        position: fixed;
                        right: 2%;
                        padding: 1%;
                        background: white;
                        z-index: 1000000000;
                        border: 1px solid gray;
                        box-shadow: 5px 5px #3a318836;
                        border-radius: 5%;
                    " v-if='toplamUcret>0  '>

                        <span style="font-size:40px" class="text-center">
                        <!--Kaydedilen eğitimler<br>
                        @{{ this.gorunenEgitimler}}-->
                        @{{ toplamUcret}}₺</span>
                        <br><br>
                        <a class="add-to-cart text-white" v-if='asamaSepet' @click='asamaDegistir("odeme")'>ÖDEMEYE GEÇ</a>
                        <a class="add-to-cart text-white" v-if='asamaOdeme' @click='asamaDegistir("sepet")'>SEPETE DÖN</a>
                    </div>
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <p v-html='egitimlerPaket.paket_aciklama'>
                                </p>
                        </div>
                    </div><br><br>
                    @include('home.satis')
                    @include('home.sepet')<br>
                </div>
            </div>  
            <div id="altfooter"><img src="{{URL::Asset('panelFile/site/payments.png')}}?v3" style="width:100%;    padding: 0% 10% 0% 10%;" alt=""></div>

            
			<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <script>

            let vm=new Vue({
                el: '#app',
                data: { 
                    fIsmi: '',
                    fSoyadi: '',
                    fIl: ' ',
                    fIlce: ' ',
                    fAdres:'',
                    fPostaKodu:'',
                    fTel:'',
                    tcKimlik:'',
                    egitimler:[],
					sepettekiEgitimler:[],
					sepet:[],
					gorunenEgitimler:[],
                    egitimlerPaket:[],
					asamaSepet:true,
					asamaOdeme:false,
                    odeme_hash:'',
                    odeme_clientId:'{{$odeme["clientId"]}}',
                    odeme_oid:'{{$odeme["oid"]}}',
                    odeme_okUrl:'{{$odeme["okUrl"]}}',
                    odeme_failUrl:'{{$odeme["failUrl"]}}',
                    odeme_rnd:'{{$odeme["rnd"]}}',
                    odeme_taksit:'{{$odeme["taksit"]}}',
					odeme_islemtipi:'{{ $odeme["islemtipi"]}}',
                    odeme_storekey:'{{$odeme["storekey"]}}',
                    odeme_currency:'{{$odeme["currency"]}}',
                    //odeme_amount:'{{$odeme["amount"]}}',
					toplamUcret:0,
                    indirimUcret:0,
                    egitimPaket:'{{$paketAdi}}',
					hash:null
                },    
                mounted(){
                //this.guvenlikDogrula()
                    this.egitimCek()
                    this.localEgitim()
                    this.egitimEsitle()
                },
                methods:{
					
					egitimEsitle(){
                        
                        if(localStorage.getItem('sepettekiEgitimler')) 
                        {
                            this.sepettekiEgitimler=JSON.parse(localStorage.getItem('sepettekiEgitimler'))
                        }else{
                            this.sepettekiEgitimler=[]
                        }

                        if(localStorage.getItem('sepettekiUcret')) 
                        {
                            this.toplamUcret=JSON.parse(localStorage.getItem('sepettekiUcret'))
                        }else{
                            this.toplamUcret=[]
                        }
					},
					async indirimSorgula(urunMiktar,discountCode)
					{
                        console.log('ürünmiktar-'+urunMiktar)
                        //this.indirim=0
                        let formData = new FormData();
                        formData.append('urunMiktar',urunMiktar);
                        formData.append('discountCode',discountCode);
                        await axios.post('/indirimSorgula',formData)
                        .then(response=>{
                            if(response.data.status==true){
                                console.log(response.data.indirim)
                                this.indirimUcret=response.data.indirim
                            }
                        });  
                        return this.indirimUcret;
                        console.log('indirim Sonucu:'+this.indirimUcret)
					},
					asamaDegistir(secim)
					{
						if(secim=='sepet')
						{
							this.asamaSepet=true
							this.asamaOdeme=false
						}
						if(secim=='odeme')
						{
							this.asamaOdeme=true
							this.asamaSepet=false
						}
					},
					egitimControl(egitim)
					{
                        let elementId = this.sepettekiEgitimler.indexOf(egitim.education_url);
						if (elementId > -1) {
                            return false;
						}else{
							return true;
						}
					},
                    egitimCek(){
                        let url = '/egitimlerApi/'+this.egitimPaket;
                        axios.get(url)
                        .then(response=>{
                            this.egitimler = response.data.educations;
                            this.egitimlerPaket = response.data.paket;
                        })
                    },
                    localEgitim()
                    {
                        this.gorunenEgitimler=JSON.parse(localStorage.getItem('sepettekiEgitimler'))
                        this.toplamUcret=JSON.parse(localStorage.getItem('sepettekiUcret'))
                    },
					sepeteEkle(egitim){
                        //console.log(this.sepettekiEgitimler.length)
                        this.sepettekiEgitimler.push(egitim.education_url)	
                        console.log('sepetteki ürün sayısı:'+this.sepettekiEgitimler.length)
                        this.indirimSorgula(this.sepettekiEgitimler.length,egitim.discount_code).then((result) => {
                            this.toplamUcret=this.toplamUcret+parseInt(egitim.education_price)-this.indirimUcret
                            console.log('indirim Ücreti'+this.indirimUcret)
                        
                            localStorage.setItem('sepettekiEgitimler',JSON.stringify(this.sepettekiEgitimler))
                            console.log('ürün maliyeti->'+egitim.education_price)
                            console.log('Toplam Ücret->'+this.toplamUcret)
                            localStorage.setItem('sepettekiUcret',parseInt(this.toplamUcret))
                            this.localEgitim()

                            let formData = new FormData();
                            formData.append('odeme_islemtipi',this.odeme_islemtipi);
                            formData.append('odeme_clientId',this.odeme_clientId);
                            formData.append('odeme_oid',this.odeme_oid);
                            formData.append('odeme_amount',this.toplamUcret);
                            formData.append('odeme_okUrl',this.odeme_okUrl);
                            formData.append('odeme_failUrl',this.odeme_failUrl);
                            formData.append('odeme_taksit',this.odeme_taksit);
                            formData.append('odeme_rnd',this.odeme_rnd);
                            formData.append('odeme_storekey',this.odeme_storekey);
                            formData.append('odeme_currency',this.odeme_currency);
                            axios.post('/base64hash2',formData)
                            .then(response=>{
                                if(response.data.status){
                                    this.odeme_hash=response.data.hash
                                }
                            });
                        })
					},
					sepettenCikar(egitim){
						const elementId = this.sepettekiEgitimler.indexOf(egitim.education_url);
						if (elementId > -1) {
                            this.indirimSorgula(this.sepettekiEgitimler.length,egitim.discount_code).then((result) =>{

                                this.sepettekiEgitimler.splice(elementId, 1);   
                                this.toplamUcret=(this.toplamUcret-egitim.education_price)+this.indirimUcret
                                localStorage.setItem('sepettekiEgitimler',JSON.stringify(this.sepettekiEgitimler))
                                localStorage.setItem('sepettekiUcret',JSON.stringify(this.toplamUcret))
                                this.localEgitim()

                                let formData = new FormData();
                                formData.append('odeme_islemtipi',this.odeme_islemtipi);
                                formData.append('odeme_clientId',this.odeme_clientId);
                                formData.append('odeme_oid',this.odeme_oid);
                                formData.append('odeme_amount',this.toplamUcret);
                                formData.append('odeme_okUrl',this.odeme_okUrl);
                                formData.append('odeme_failUrl',this.odeme_failUrl);
                                formData.append('odeme_taksit',this.odeme_taksit);
                                formData.append('odeme_rnd',this.odeme_rnd);
                                formData.append('odeme_storekey',this.odeme_storekey);
                                formData.append('odeme_currency',this.odeme_currency);
                                axios.post('/base64hash2',formData)
                                .then(response=>{
                                    if(response.data.status){
                                        this.odeme_hash=response.data.hash
                                    }
                                });
                            })                   
						}
                        
					
					}
                }
            })

        </script>

    </body>
</html>

<br><br><br>

