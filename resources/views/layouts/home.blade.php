<!DOCTYPE HTML>
<!--
	Photon by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>

    <html>
    <head>
		<?php
		$SiteAyarlar = DB::table( 'site_ayarlar' )
		                 ->where('Id','1')
		                 ->get();
		?>
        <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset($SiteAyarlar[0]->SiteFavicon)}}">
        <title>{{$SiteAyarlar[0]->SiteAdi}}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="{{ URL::asset('anasayfa/assets/js/ie/html5shiv.js')}}"></script><![endif]-->
        <link rel="stylesheet" href="{{ URL::asset('anasayfa/assets/css/selcukmain.css')}}?v12" />
        <link rel="stylesheet" href="{{ URL::asset('anasayfa/assets/css/text.css')}}">
        <!--[if lte IE 8]><link rel="stylesheet" href="{{ URL::asset('anasayfa/assets/css/ie8.css')}}" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="{{ URL::asset('anasayfa/assets/css/ie9.css')}}" /><![endif]-->
        <style>
            
            html,body{

	            background-color: {{$SiteAyarlar[0]->SiteTemelRenk}} !important;
            }
        </style>
    </head>
<body>

<?php
$SiteAyarlar = DB::table( 'site_ayarlar' )
                 ->where('Id','1')
                 ->get();
?>
<!-- Header -->
<section id="header">
    <div class="inner">
        @if(empty($SiteAyarlar[0]->SiteLogo)) UZEM @else <img style="width:40%;" src="{{ URL::asset($SiteAyarlar[0]->SiteLogo) }}" alt="home" class="dark-logo" /> @endif

        <br/><br/><br/>

        <h1>{{$SiteAyarlar[0]->SiteAdi}}</h1><br>
		<h4 style="display:none;"><a href="https://adapazariyazilim.com">Adapazarı Yazılım</a></h4>

        <ul class="actions">
            <li><a href="{{ URL::asset('/Panel')}}" class="button scrolly">GİRİŞ YAP</a></li>
        </ul>
    </div>
</section>




<!-- Scripts -->
<script src="{{ URL::asset('anasayfa/assets/js/jquery.min.js')}}"></script>
<!--<script src="{{ URL::asset('anasayfa/assets/js/jquery.scrolly.min.js')}}"></script>-->
<script src="{{ URL::asset('anasayfa/assets/js/skel.min.js')}}"></script>
<script src="{{ URL::asset('anasayfa/assets/js/util.js')}}"></script>
<!--[if lte IE 8]><script src="{{ URL::asset('anasayfa/assets/js/ie/respond.min.js')}}"></script><![endif]-->
<script src="{{ URL::asset('anasayfa/assets/js/main.js')}}"></script>

</body>
</html>



