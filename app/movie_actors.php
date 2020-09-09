<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movie_actors extends Model
{

    public $timestamps = false;
    protected $fillable = ['role','movie_id','actor_id', 'role_id'];

    public function actors()
    {
        return $this->belongsTo('App\actors');
    }
}
