<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paketler extends Model
{
    protected $table = 'paketler';
    function dersler()
    {
        return $this->hasMany('App\paketders', 'paketId','id');
    }
}
