<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
    protected $fillable = ['genre_name'];
    protected $primaryKey = 'genre_id';

    public function movies()
    {
        return $this->belongsToMany('App\movies', 'movie_id');
    }

    
}
