<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class movies extends Model
{
    protected $fillable = ['movie_id','title','plot','year', 'producer_id'];
    use SoftDeletes;

    public function movies()
    {
        return $this->hasMany('App\actors');
    }
}
