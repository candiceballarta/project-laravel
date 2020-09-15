<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class movies extends Model
{

    protected $fillable = ['title','plot','year', 'producer_id'];
    protected $primaryKey = 'movie_id';
    use SoftDeletes;

    public function actors()
    {
        return $this->belongsToMany('App\actors', 'movie_actors', 'movie_id', 'actor_id');
    }

    public function producers()
    {
        return $this->belongsTo('App\producers', 'producer_id');
    }

    public function ratings()
    {
        return $this->belongsToMany('App\ratings', 'movie_ratings', 'movie_id', 'rating_id');
    }

    public function genre()
    {
        return $this->belongsToMany('App\genre', 'movie_genre', 'movie_id', 'genre_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\roles', 'movie_actors', 'actor_id' , 'role_id');
    }

}
