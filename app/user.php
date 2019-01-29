<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];    


    public function appointment(){
        return $this->hasMany('\App\appointment');
    }

     public function scopeName($query,$name){
        $query->where('name','like',"%{$name}%")
        ->orWhere('lastname','like',"%{$name}%");
    }

    public function scopeEmail($query,$email){
        $query->where('email','like',"%{$email}%");
    }

    public function scopeDepartment($query,$department){
        $query->where('department','like',"%{$department}%");
    }

    public function scopeType($query,$type){
        $query->where('user_type','like',"%{$type}%");
    }
}
