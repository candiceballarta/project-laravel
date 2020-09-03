<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ratings extends Model
{
    protected $fillable = ['score', 'comment'];
    protected $primaryKey = 'rating_id';

    public function movies()
    {
        return $this->belongsToMany('App\movies');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
