<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class E_SinavlarCevaplari extends Model
{
    protected $table = 'exam_choices';
    public $timestamps = false;
    protected $fillable = ['student_id','exam_id','answer_id','choice_at'];

    public function Ogrenci()
    {
        return $this->belongsTo('App\student','User_Id','student_id');
    }

    public function Sinav()
    {
        return $this->belongsTo('App\E_Sinavlar','exam_id','id');
    }

    public function Cevap()
    {
        return $this->belongsTo('App\E_Cevaplar','answer_id','id');
    }
}
