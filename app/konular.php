<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class konular extends Model
{
	protected $table = 'konular';
	protected $fillable = ['Konu_Adi','Konu_G_Adi','Konu_Bilgi','Konu_Adres','Ders_Id','Turu','Konu_Notu'];
	public function Ders()
	{
		return $this->hasMany('App\ders', 'Id','Ders_Id');
	}
}
