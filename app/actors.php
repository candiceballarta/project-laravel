<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class actors extends Model
{
    protected $fillable = ['actor_id','fname', 'lname', 'notes'];
    use SoftDeletes;

    // public function movies()
    // {
    //     return $this->belongsToMany('App\movies');
    // }

    public function roles()
    {
        return $this->morphMany('App\roles', 'movie_actors');
    }
}
