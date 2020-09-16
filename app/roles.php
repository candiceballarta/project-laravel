<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['role_name'];
    protected $primaryKey = 'role_id';

    public function actors()
    {
        return $this->belongsTo('App\Actors', 'actor_id');
    }

    public function movies()
    {
        return $this->belongsTo('App\Movies', 'movie_id');
    }
}
