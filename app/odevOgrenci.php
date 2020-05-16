<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class odevOgrenci extends Model
{
    protected $table = 'odev_ogrenci';

    function Ogrenci()
	{
		return $this->hasMany('App\ogrenci', 'User_Id','ogrenciId');
	}
}
