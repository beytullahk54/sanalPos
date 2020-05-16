<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paketders extends Model
{
    protected $table = 'paketders';
    public function paket()
    {
        return $this->hasMany('App\paketler', 'id','paketId');
    }
    public function ders()
    {
        return $this->hasMany('App\ders', 'Id','dersId');
    }
}
