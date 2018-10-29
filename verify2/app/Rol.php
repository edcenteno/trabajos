<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Rol extends Eloquent
{

    protected $connection = 'mongodb';
    protected $collection = 'roles';
    protected $fillable = ['name',
                          'description',
                          'condition'];
    public $timestamps = false;

     public function users(){
        return $this->hasMany('App\User');
    }
}