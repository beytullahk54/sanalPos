<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\softDeletes;


class E_Sorular extends Model
{
    //use SoftDeletes;
    protected $table='questions';
    protected $fillable = ['question'];

    public function Cevaplar()
    {
        return $this->hasMany('App\E_Cevaplar','question_id');
    }
}
