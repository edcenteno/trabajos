<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Person extends Eloquent
{

    protected $connection = 'mongodb';
    protected $collection = 'Persons';
    protected $fillable = ['doc_type','doc_value','name','first_last_name','last_last_name','id_company','phone','email'];
}
