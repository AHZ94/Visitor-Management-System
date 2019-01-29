<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class visitor extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function vehicle(){
    	return $this->hasMany('\App\vehicle')->withTrashed();
    }

    public function scopeName($query,$name){
        $query->where('firstname','like',"%{$name}%")
        ->orWhere('lastname','like',"%{$name}%");
    }

    public function scopeEmail($query,$email){
        $query->where('email','like',"%{$email}%");
    }

    public function scopeIdentification($query,$ic_passport){
        $query->where('ic_passport','like',"%{$ic_passport}%");
    }

    public function scopeContact($query,$contact){
        $query->where('contact_no','like',"%{$contact}%");
    }
}
