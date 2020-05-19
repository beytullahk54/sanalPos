<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ogrenci;
use App\ogrenci_ders;
use App\User;
use App\ders;
use App\education;
use App\site_ayarlar;
use Illuminate\Support\Facades\URL;
use Session;


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


    public function odeme($url)
    {
        
        $education = education::where('education_url',$url)->first();

        $odeme['clientId'] = site_ayarlar::where('site_key','clientId')->first()->value;      //Banka tarafindan magazaya verilen isyeri numarasi
        $odeme['amount'] = $education->education_price;             //tutar
        $odeme['oid'] = "snlpos".rand(1,100).rand(100,200).rand(200,300);                    //Siparis numarasi
        $odeme['okUrl'] = URL::Asset('odemeSonuc');      //Islem basariliysa d?n?lecek isyeri sayfasi  (3D isleminin ve ?deme isleminin sonucu)
        $odeme['failUrl'] = URL::Asset('odemeSonuc');    //Islem basarisizsa d?n?lecek isyeri sayfasi  (3D isleminin ve ?deme isleminin sonucu)
        $odeme['rnd'] = microtime();                                     //Tarih ve zaman gibi s?rekli degisen bir deger g?venlik ama?li kullaniliyor

        $odeme['taksit'] = "";    					//Taksit sayisi
        $odeme['islemtipi']="Auth";					//Islem tipi
        $odeme['storekey'] = site_ayarlar::where('site_key','storekey')->first()->value;					//Isyeri anahtari
        $odeme['currency'] = "949";					//Para Birimi

        $odeme['hashstr'] = $odeme['clientId'] . $odeme['oid'] . $odeme['amount'] . $odeme['okUrl'] . $odeme['failUrl'] . $odeme['islemtipi'] . $odeme['taksit'] . $odeme['rnd'] . $odeme['storekey']; //g?venlik ama?li hashli deger

        $odeme['hash'] = base64_encode(pack('H*',sha1($odeme['hashstr'])));

	    return view('home.collection')->with('education',$education)->with('odeme',$odeme)->with('status','başarılı');
    }
 
 
    public function odemeSonuc(Request $request)
    {
        $response = $request->Response;
		if($response == "Approved")
		{
			return redirect()->back()->with('status','Ödeme işleminiz başarıyla tamamlanmıştır.');
		}
		else
		{
			return redirect()->back()->with('status','Ödeme işleminiz başarısız olmuştur.'.$ErrMsg);
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
