<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class E_SinavlarSorulari extends Model
{
    public $timestamps = false;
    protected $table = 'exam_questions';
    protected $fillable = ['exam_id','question_id'];

    public function Sinav()
    {
        return $this->belongsTo('App\E_Sinavlar','exam_id','id');
    }

    public function Soru()
    {
        return $this->belongsTo('App\E_Sorular','question_id','id');
    }
}
