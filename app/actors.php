<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class actors extends Model
{

    protected $fillable = ['fname', 'lname', 'notes'];
    protected $primaryKey = 'actor_id';
    use SoftDeletes;

    public function movies()
    {
        return $this->belongsToMany('App\movies', 'movie_actors', 'actor_id', 'movie_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\roles', 'movie_actors', 'actor_id', 'role_id');
    }

    public function movie_actors()
    {
        return $this->hasMany('App\movie_actors', 'actor_id');
    }
}
