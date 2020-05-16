<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use App\ogrenci;

class Profil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $kid=Auth::user()->id;
		$Ogr_Bilgi=ogrenci::where('User_Id', '=', $kid)->first();
		if ($Ogr_Bilgi->Durum==2) {
			return $next($request);
		}elseif ($Ogr_Bilgi->Durum==1){
			return redirect('Ogrenci/Yakinda')->with('status','Sertifika aşamasına geçiş yaptığınız için sisteme girişiniz kapanmıştır.Açılmasını istiyorsanız eğitimcinizle irtibata geçiniz.');
		}elseif (!Auth::user()->hasRole('guncel')) {
			return redirect('Ogrenci/Profil')->with('status','Lütfen Önce Bilgilerinizi Güncelleyiniz');
		}

		return $next($request);
    }
}
