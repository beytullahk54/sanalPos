<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notders extends Model
{
    protected $table = 'not_ders';
    public function paket()
    {
        return $this->hasMany('App\paketler', 'id','paketId');
    }
    public function ders()
    {
        return $this->hasMany('App\ders', 'Id','dersId');
    }
    public function galery()
    {
        return $this->hasMany('App\galery', 'id','galery_id');
    }
}
