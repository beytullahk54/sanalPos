<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ogrenci extends Model
{
    protected $table = 'ogrenciler';
    function Bolumler()
	{
		return $this->hasMany('App\bolumler', 'Id','Bolum_Id');
	}
	function ekleyen()
    {
        return $this->hasMany('App\User', 'id','ekleyenId');
    }
    function Dersler()
	{
		return $this->hasMany('App\ogrenci_ders', 'User_Id','User_Id');
	}
	function Sinav()
	{
		return $this->hasMany('App\E_SinavlarSonuclari', 'student_id','User_Id');
	}
	function User()
	{
		return $this->hasMany('App\User', 'id','User_Id');
	}

}
