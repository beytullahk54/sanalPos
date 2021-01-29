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
                <div class="alert alert-danger">
                   Sisteme Daha Önce Aynı Bilgilerle Ödeme Yapılmış <br>
                   <a href="http://sanalposdpusem.dpu.edu.tr/iyzico/{{$education->education_url}}" class="btn btn-primar btn-block">
                    Ödemeyi Tekrar Dene
                   </a>
                </div>
            </div>
        </div>
        <div id="altfooter"><img src="{{URL::Asset('panelFile/site/payments.png')}}?v3" style="width:100%;    padding: 0% 10% 0% 10%;" alt=""></div>

        
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

