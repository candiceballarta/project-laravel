<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $fillable = ['role_name'];
    protected $primaryKey = 'role_id';

    public function movies()
    {
        return $this->belongsToMany('App\movies', 'movie_actors', 'role_id', 'movie_id');
    }

    public function actors()
    {
        return $this->belongsToMany('App\actors', 'movie_actors', 'role_id', 'actor_id');
    }
}
