<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movies extends Model
{

    protected $fillable = ['title','plot','year', 'producer_id'];
    protected $primaryKey = 'movie_id';
    use SoftDeletes;

    public function roles()
    {
        return $this->hasMany('App\Roles', 'role_id', 'movie_id');
    }

    public function producers()
    {
        return $this->belongsTo('App\Producers', 'producer_id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Ratings', 'rating_id', 'movie_id');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genres', 'genre_movie', 'movie_id', 'genre_id')->withTimestamps();
    }

}
