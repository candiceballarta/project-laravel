<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movie_actors extends Model
{
    public function roles()
    {
        return $this->belongsTo('App\roles', 'role_id');
    }

    public function actors()
    {
        return $this->belongsTo('App\actors', 'actor_id');
    }

    public function movies()
    {
        return $this->belongsTo('App\movies', 'movie_id');
    }
}
