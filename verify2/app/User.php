<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        '_id', 'usuario', 'password', 'condicion', 'idrol'
    ];

    //public $timestamps =  false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function  rol(){
        return  $this->belongsTo('App\Rol');
    }

    public function  person(){
        return  $this->belongsTo('App\Person');
    }

    public function  company(){
        return  $this->belongsTo('App\Company');
    }


}
