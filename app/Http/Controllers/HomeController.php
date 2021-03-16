<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ogrenci;
use App\ogrenci_ders;
use App\User;
use App\ders;
use App\education;
use App\educationiyzico;
use App\egitim_paket;
use App\site_ayarlar;
use App\discount;
use App\iyziusers;
use Illuminate\Support\Facades\URL;
use Session;
use Illuminate\Http\RedirectResponse;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function hosgeldiniz()
    {

        return view('Anasayfa.hosgeldiniz');
    }


    public function index()
    {

        return view('home.index');
    }
    //eğitimler


    public function egitimlerApi($paket)
    {
        return ['educations' => education::where('education_paket', '=', $paket)->get(), 'paket' => egitim_paket::where('paket_code', '=', $paket)->first()];
    }
    public function base64hash2(Request $request)
    {
        $odeme = $request->odeme_amount;
        //$odeme = $request->odeme_amount;
        $hashstr = $request->odeme_clientId . $request->odeme_oid . $odeme . $request->odeme_okUrl . $request->odeme_failUrl . $request->odeme_islemtipi . $request->odeme_taksit . $request->odeme_rnd . $request->odeme_storekey; //g?venlik ama?li hashli deger
        $hash = base64_encode(pack('H*', sha1($hashstr)));
        return ['status' => true, 'hash' => $hash];

        /*$odeme['hashstr'] = $odeme['clientId'] . $odeme['oid'] . $odeme['amount'] . $odeme['okUrl'] . $odeme['failUrl'] . $odeme['islemtipi'] . $odeme['taksit'] . $odeme['rnd'] . $odeme['storekey'];
		
        $odeme['hash'] = base64_encode(pack('H*',sha1($odeme['hashstr'])));
		
		return ['hash'=>$odeme['hash']];*/
    }
    public function indirimSorgula(Request $request)
    {

        $discount = discount::where('discount_count', '=', $request->urunMiktar)->where('discount_code', '=', $request->discountCode)->first();
        if ($discount) {
            $indirim = $discount->discount_price;
        } else {
            $indirim = 0;
        }
        //return $request->urunMiktar;
        /*if ($request->urunMiktar == 1) {
            $indirim = 0;
        } elseif ($request->urunMiktar == 2) {
            $indirim = 5;
        } elseif ($request->urunMiktar == 3) {
            $indirim = 10;
        } elseif ($request->urunMiktar == 4) {
            $indirim = 15;
        } elseif ($request->urunMiktar == 5) {
            $indirim = 20;
            
        }*/
        /*
            1 - 30 
            2 - 30  -> 60 -> 55  
            3 - 30  -> 85 -> 75  
            4 - 30  -> 105-> 90  
            5 - 30  -> 120-> 100
            */
        return ['status' => true, 'indirim' => $indirim, 'urunMiktar' => $request->urunMiktar];
    }

    public function egitimler($paketAdi)
    {
        $odeme['clientId'] = site_ayarlar::where('site_key', 'clientId')->first()->value;      //Banka tarafindan magazaya verilen isyeri numarasi
        //$odeme['amount'] = $education->education_price;             //tutar
        $odeme['oid'] = "snlpos" . rand(1, 100) . rand(100, 200) . rand(200, 300);                    //Siparis numarasi
        $odeme['okUrl'] = URL::Asset('odemeSonuc');      //Islem basariliysa d?n?lecek isyeri sayfasi  (3D isleminin ve ?deme isleminin sonucu)
        $odeme['failUrl'] = URL::Asset('odemeSonuc');    //Islem basarisizsa d?n?lecek isyeri sayfasi  (3D isleminin ve ?deme isleminin sonucu)
        $odeme['rnd'] = microtime();                                     //Tarih ve zaman gibi s?rekli degisen bir deger g?venlik ama?li kullaniliyor

        $odeme['taksit'] = "";                        //Taksit sayisi
        $odeme['islemtipi'] = "Auth";                    //Islem tipi
        $odeme['storekey'] = site_ayarlar::where('site_key', 'storekey')->first()->value;                    //Isyeri anahtari
        $odeme['currency'] = "949";                    //Para Birimi
        $odeme['amount'] = 460; //Sorun
        $odeme['hashstr'] = $odeme['clientId'] . $odeme['oid'] . $odeme['amount'] . $odeme['okUrl'] . $odeme['failUrl'] . $odeme['islemtipi'] . $odeme['taksit'] . $odeme['rnd'] . $odeme['storekey']; //g?venlik ama?li hashli deger

        $odeme['hash'] = base64_encode(pack('H*', sha1($odeme['hashstr'])));
        return view('home.egitimler')->with('odeme', $odeme)->with('paketAdi', $paketAdi);
    }


    public function odeme($url)
    {
        $education = education::where('education_url', $url)->first();

        $odeme['clientId'] = site_ayarlar::where('site_key', 'clientId')->first()->value;      //Banka tarafindan magazaya verilen isyeri numarasi
        $odeme['amount'] = $education->education_price;             //tutar
        $odeme['oid'] = "snlpos" . rand(1, 100) . rand(100, 200) . rand(200, 300);                    //Siparis numarasi
        $odeme['okUrl'] = URL::Asset('odemeSonuc');      //Islem basariliysa d?n?lecek isyeri sayfasi  (3D isleminin ve ?deme isleminin sonucu)
        $odeme['failUrl'] = URL::Asset('odemeSonuc');    //Islem basarisizsa d?n?lecek isyeri sayfasi  (3D isleminin ve ?deme isleminin sonucu)
        $odeme['rnd'] = microtime();                                     //Tarih ve zaman gibi s?rekli degisen bir deger g?venlik ama?li kullaniliyor

        $odeme['taksit'] = "";                        //Taksit sayisi
        $odeme['islemtipi'] = "Auth";                    //Islem tipi
        $odeme['storekey'] = site_ayarlar::where('site_key', 'storekey')->first()->value;                    //Isyeri anahtari
        $odeme['currency'] = "949";                    //Para Birimi

        $odeme['hashstr'] = $odeme['clientId'] . $odeme['oid'] . $odeme['amount'] . $odeme['okUrl'] . $odeme['failUrl'] . $odeme['islemtipi'] . $odeme['taksit'] . $odeme['rnd'] . $odeme['storekey']; //g?venlik ama?li hashli deger

        $odeme['hash'] = base64_encode(pack('H*', sha1($odeme['hashstr'])));

        return view('home.collection')->with('education', $education)->with('odeme', $odeme)->with('status', 'başarılı');
    }
    public function iyziOdeme(Request $request)
    {
        //return $request->all();
        $veri = educationiyzico::where('id', '=', $request->id)->first();
        /*	if(iyziusers::where('tc','=',$request->tcKimlik)->where('education_id','=',$request->id)->where('telefon','=',$request->fTel)->count() > 0)
			{
				return view('home.dahaOnceOlanOdeme')->with('education',$veri)->with('dahaOnceKayitVar','merhaba');
            }
        */
        //return $veri->iyzi_link;
        $add = new iyziusers();
        $add->name = $request->fIsmi;
        $add->tc = $request->tcKimlik;
        $add->telefon = $request->fTel;
        $add->adres = $request->Adres;
        $add->il = $request->il;
        $add->ilce = $request->ilce;
        $add->education_id = $request->id;
        $add->save();
        if ($add) {
            return redirect()->to($veri->iyzi_link);
        }
    }
    public function iyzico($url)
    {

        $education = educationiyzico::where('education_url', $url)->first();
        return view('home.iyzicollection')->with('education', $education);
    }

    public function odemeSonuc(Request $request)
    {
        $response = $request->Response;
        if ($response == "Approved") {
            if (!empty(site_ayarlar::where('site_key', 'yonlendirmeUrl')->first()->value)) {
                return new RedirectResponse(site_ayarlar::where('site_key', 'yonlendirmeUrl')->first()->value);
            } else {
                return redirect()->route('home')->with('status', 'Ödeme işleminiz başarıyla tamamlanmıştır.');
            }
        } else {
            return redirect()->route('home')->with('status', 'Ödeme işleminiz başarısız olmuştur.' .  $response);
        }
    }
    public function Yardim_Al()
    {
        return view('Ogrenci.Yardim_Al');
    }
    public function Tanitim()
    {
        return view('Ogrenci.Tanitim');
    }
}
