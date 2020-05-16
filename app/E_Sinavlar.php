<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class E_Sinavlar extends Model
{
    protected $table='exams';
    protected $fillable = ['title','start_at','end_at','ders_id'];

    public function Sorular()
    {
        return $this->hasMany('App\E_SinavlarSorulari','exam_id');
    }

    public function Ogrenciler()
    {
        return $this->hasMany('App\E_SinavlarOgrencileri','exam_id');
    }
}
