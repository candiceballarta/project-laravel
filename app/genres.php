<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
    protected $fillable = ['genre_id','genre_name'];

    public function movies()
    {
        return $this->belongsToMany('App\movies');
    }

    
}
