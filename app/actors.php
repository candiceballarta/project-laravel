<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class actors extends Model
{

    protected $fillable = ['fname', 'lname', 'notes'];
    protected $primaryKey = 'actor_id';
    use SoftDeletes;

    public function movie_actors()
    {
        return $this->hasMany('App\movie_actors','actor_id', 'movie_id');
    }

}
