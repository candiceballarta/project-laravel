<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $fillable = ['role_id','role_name'];

    public function movie_actors()
    {
        return $this->morphTo();
    }
}
