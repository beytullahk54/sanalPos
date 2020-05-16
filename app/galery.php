<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galery extends Model
{
    protected $table = 'galery';

	public function dersNotu()
	{
		return $this->hasMany('App\notders', 'galery_id','id');
	}
}
 