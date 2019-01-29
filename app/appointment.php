<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
	public function user(){
		return $this->belongsTo('\App\user')->withTrashed();
	}
	public function visitor(){
		return $this->belongsTo('\App\visitor')->withTrashed();
	}
	public function vehicle(){
		return $this->belongsTo('\App\vehicle')->withTrashed();
	}
}
