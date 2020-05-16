<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use App\site_ayarlar;
 


class kurulum
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

	public function handle($request, Closure $next, $guard = null)
	{
		
		$kurulum=site_ayarlar::all()->count();
		if ($kurulum > 0 or $request=='kurulum') {
			return $next($request);
		}else{
			return redirect('hosgeldiniz')->with('status','Kurulum için yetkilinize başvurunuz.');
		}

		return $next($request);
	}
}
