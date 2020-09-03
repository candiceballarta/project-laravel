<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ratings extends Model
{
    protected $fillable = ['rating_id','id','score', 'comment'];

    public function movies()
    {
        return $this->belongsToMany('App\movies');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
