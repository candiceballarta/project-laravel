<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $fillable = ['role_name'];
    protected $primaryKey = 'role_id';

    public function movies()
    {
        return $this->hasMany('App\movie_actors', 'role_id');
    }
}
