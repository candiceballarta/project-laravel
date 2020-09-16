<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producers extends Model
{
    protected $fillable = ['fname', 'lname', 'company'];
    protected $primaryKey = 'producer_id';

    public function movies()
    {
        return $this->hasMany('App\movies', 'movie_id');
    }
}
