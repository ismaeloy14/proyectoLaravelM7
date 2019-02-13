<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actors';
    public $timestamps = false; //

    /*
    By default, Eloquent expects created_at and updated_at columns to exist on your tables.
    If you do not wish to have these columns automatically managed by Eloquent, set the $timestamps property on your model to false
    */
    
}
