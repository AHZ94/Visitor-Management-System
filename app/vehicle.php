<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vehicle extends Model
{
	use SoftDeletes;

	protected $fillable = [
	    'vehicle_type', 'vehicle_plate'
	];

	protected $guarded = [
	 	'visitor_id'
	];

	protected $dates = ['deleted_at'];

	public function visitor(){
    	return $this->belongsTo(Visitor::class)->withTrashed();
    }
}
