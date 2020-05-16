<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class E_Cevaplar extends Model
{
    public $timestamps = false;
    protected $table = 'answers';
    protected $fillable = ['question_id', 'option', 'answer'];

    public function Soru()
    {
        return $this->belongsTo('App\E_Sorular', 'question_id', 'id');
    }
}
