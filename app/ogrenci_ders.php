<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ogrenci_ders extends Model
{
	protected $table = 'ders_ogr';
	protected $fillable = ['Ders_Id','User_Id','Durum'	];
	public function Ogrenci()
	{
		return $this->hasMany('App\ogrenci', 'User_Id','User_Id')
			;
	}
	public function Ders()
	{

		return $this->hasMany('App\ders', 'Id','Ders_Id')->orderBy('Ders_Sira');



	}
	function Konular()
	{

		return $this->hasMany('App\konular', 'Ders_Id','Ders_Id');
	}
}
