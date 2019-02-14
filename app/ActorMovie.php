<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorMovie extends Model
{
	use HasCompositeKey;
    protected $table = 'ActorMovies';
    protected $primarykey = ['id_actor','id_movie'];
}
