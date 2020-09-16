<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ratings extends Model
{
    protected $fillable = ['score', 'comment'];
    protected $primaryKey = 'rating_id';

    public function movies()
    {
        return $this->belongsTo('App\Movies', 'movie_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
