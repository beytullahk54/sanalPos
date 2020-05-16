<!DOCTYPE html>

<html lang="tr">
<?php
$SiteAyarlar = DB::table( 'site_ayarlar' )
                 ->where('Id','1')
                 ->get();

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset($SiteAyarlar[0]->SiteFavicon)}}">
    <title>{{$SiteAyarlar[0]->SiteAdi}}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- This is Sidebar menu CSS -->
    <link href="{{ URL::asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="{{ URL::asset('css/animate.css')}}" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet">


    <link href="{{ URL::asset('css/stil.css')}}" rel="stylesheet">

    <link href="{{ URL::asset('css/colors/default.css' )}}" id="theme" rel="stylesheet">

    <link href="{{ URL::asset('plugins/bower_components/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">

    <style>

        .navbar-header {
            background: {{$SiteAyarlar[0]->SiteTemelRenk}}!important;
        }
        .panel-heading{
            background-color: {{$SiteAyarlar[0]->SiteTemelRenk}}!important;
            color: white!important;
        }
        .panel-heading>h2,.panel-heading>h3,.panel-heading>h4,.panel-heading>h5,.panel-heading>h6{

            color: white!important;
        }
        .btn-custom{
            background-color: {{$SiteAyarlar[0]->SiteTemelRenk}}!important;
            border: 1px solid {{$SiteAyarlar[0]->SiteTemelRenk}}!important;
        }
        .mail-contnet {
            min-height: 135px;
        }
       .panel.panel-default {
            min-height: 380px;
        }
        .checkbox label::before{
                border: 1px solid rgba(34, 34, 35, 0.37)!important;
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vuetify/1.5.4/vuetify.css">

    @yield('Css')


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

</head>

<body class="fix-sidebar">
<!-- Preloader -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="wrapper">
    <!-- Top Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <!-- Toggle icon for mobile view -->
            <div class="top-left-part">
                <!-- Logo -->
                <a class="logo" href="{{ URL::asset('Panel')}}">
                    <!-- Logo icon image, you can use font-icon also --><b style="padding:0 10px 0 5px;width:30px;color:#3171ad;font-family:-webkit-body;">@if(empty($SiteAyarlar[0]->SiteAltLogo)) UZEM @else <img style="width:40px;"  class="light-logo"  src="{{ URL::asset($SiteAyarlar[0]->SiteAltLogo) }}" alt="home"  /> @endif

                    <!--This is dark logo icon--><!--<img src="--><!--This is light logo icon--><!--<img src="{//{ URL::asset('plugins/images/admin-logo-dark.png') }}" alt="home" class="light-logo" />-->
                    </b>
                    <!-- Logo text image you can use text also --><span class="hidden-xs">UZEM
                        <!--This is dark logo text--><!--<img src="{//{ URL::asset('plugins/images/admin-text.png') }}" alt="home" class="dark-logo" />--><!--This is light logo text--><!--<img src="{//{ URL::asset('plugins/images/admin-text-dark.png') }}" alt="home" class="light-logo" />-->
                     </span> </a>
            </div>
            <!-- /Logo -->
            <!-- Search input and Toggle icon -->
            <ul class="nav navbar-top-links navbar-left hidden-lg">
                <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
            </ul>
            <!-- This is the message dropdown -->

            @yield('Arama')
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- End Top Navigation -->
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">


        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu"><a href="{{ URL::asset('/Panel') }}"><b style="padding:0 10px 0 10px;width:20px;color:#3171ad;font-family:-webkit-body;font-size:30px;">@if(empty($SiteAyarlar[0]->SiteIcLogo)) UZEM @else <img style="width:75%;" src="{{ URL::asset($SiteAyarlar[0]->SiteIcLogo) }}" alt="home" class="dark-logo " /> @endif </b></a></span></h3> 
            </div>
            <div class="user-profile">
        </div>
            <ul class="nav" id="side-menu">
                @if (Auth::check())
                <li><a href="{{ URL::asset('/Panel')}}"><i class="fa fa-user" aria-hidden="true"></i> Panele Geri Dön</a></li>
                @foreach (\App\kilavuz_konu::get() as $kilavuz_konu)
                    <li> <a href="#" class="waves-effect"><i class="fa fa-users" aria-hidden="true"></i> <span class="hide-menu"> {{$kilavuz_konu->konu_adi}}<span class=" fas fa-angle-double-right arrow"></span></span></a>
                        <ul class="nav nav-second-level collapse"> 
                                @foreach (\App\kilavuz::where('kilavuz_konu_id',$kilavuz_konu->id)->orderBy('page_order','asc')->get() as $kilavuz)
                                    <li> <a href="{{URL::Asset('Admin/KullanimKilavuzu/'.$kilavuz->page_url)}}" class="waves-effect"><i class="fa fa-users" aria-hidden="true"></i> <span class="hide-menu"> {{$kilavuz->page_name}}<span class=" fas fa-angle-double-right arrow"></span></span></a></li>
                                @endforeach
                        </ul>
                    </li>
                  
                @endforeach
              
                <li> <a href="{{URL::Asset('Admin/KullanimKilavuzu/kilavuzYeniKonuEkle')}}" class="waves-effect"><i class="fa fa-users" aria-hidden="true"></i> <span class="hide-menu"> Kilavuza Yeni Konu Ekle<span class=" fas fa-angle-double-right arrow"></span></span></a>
                  
                </li>
                   
                <li><a href="{{ route('logout') }}" class="waves-effect"  onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Çıkış</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                    @else
                    <li> <a href="{{ URL::asset('/Panel')}}"><i class="fas fa-sign-in-alt" aria-hidden="true"></i><span class="hide-menu"> Sisteme Giriş Yap</span></a> </li>
                @endif
            </ul>

            @if(empty($SiteAyarlar[0]->SiteAltLogo)) @else <img style="position:absolute;    width: 50%;    left: 20%;bottom:40px;z-index: -100;" src="{{ URL::asset('plugins/images/'.$SiteAyarlar[0]->SiteAltLogo) }}" alt="home" class="dark-logo hidden-xs hidden-sm hidden-md" /> @endif
        </div>

    </div>
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
                    @yield('icerik')
            
        </div>
        <!-- /.container-fluid -->
        <footer class="footer">
            <div class="row">
                <div class="col-md-6">07.08.2017 &copy; {{ config('app.name') }} v1.6.0</div>
            </div>

        </footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="{{ URL::asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Sidebar menu plugin JavaScript -->
<script src="{{ URL::asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<!--Slimscroll JavaScript For custom scroll-->
<script src="{{ URL::asset('js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ URL::asset('js/waves.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ URL::asset('js/custom.js') }}"></script>
<script src="{{ URL::asset('plugins/bower_components/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ URL::asset('plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>


<script>

    function yakinda() {
        swal( 'Çok Yakında...');
    }
    function Unavaible() {
        alert("Erişmek istediğiniz yer yapım aşamasındadır", null, "info");

    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.7/vue.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vuetify/1.5.14/vuetify.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>


@yield('Script')


@if($SiteAyarlar[0]->site_analytics)
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$SiteAyarlar[0]->site_analytics}}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '{{$SiteAyarlar[0]->site_analytics}}');
    </script>
@endif

</body>

</html>


