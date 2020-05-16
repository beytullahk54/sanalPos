<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class E_SinavOgrencileri extends Model
{
    public $timestamps = false;
    protected $table = 'exam_students';
    protected $fillable = ['exam_id', 'student_id'];

    public function Sinav()
    {
        return $this->belongsTo('App\E_Sinavlar','id','exam_id');
    }

    public function Ogrenci()
    {
        return $this->belongsTo('App\ogrenci','User_Id','student_id');
    }
}
