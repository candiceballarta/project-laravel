<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $fillable = ['genre_name'];
    protected $primaryKey = 'genre_id';

    public function movies()
    {
        return $this->belongsToMany('App\Movies', 'genre_movie', 'genre_id', 'movie_id');
    }


}
