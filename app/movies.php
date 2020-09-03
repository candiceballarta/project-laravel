<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class movies extends Model
{
    protected $fillable = ['title','plot','year', 'producer_id'];
    protected $primaryKey = 'movie_id';
    use SoftDeletes;

    public function producers()
    {
        return $this->belongsTo('App\producers');
    }

    public function ratings()
    {
        return $this->belongsToMany('App\ratings');
    }

    public function genre()
    {
        return $this->belongsToMany('App\genre');
    }

    public function roles()
    {
        return $this->morphMany('App\roles', 'movie_actors');
    }
}
