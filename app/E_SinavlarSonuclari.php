<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class E_SinavlarSonuclari extends Model
{
    protected $table = 'exam_results';
    protected $fillable = ['student_id','exam_id','correct','incorrect','total'];

    public function Ogrenci()
    {
        return $this->belongsTo('App\ogrenci','student_id','User_Id');
    }

    public function Sinav()
    {
        return $this->belongsTo('App\E_Sinavlar','id','exam_id');
    }

}
