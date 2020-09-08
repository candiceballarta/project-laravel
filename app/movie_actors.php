<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movie_actors extends Model
{
    protected $fillable = ['role_name','movie_id','actor_id', 'role_id'];
}
