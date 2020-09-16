<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actors extends Model
{

    protected $fillable = ['fname', 'lname', 'notes'];
    protected $primaryKey = 'actor_id';
    use SoftDeletes;

    public function roles()
    {
        return $this->hasMany('App\Roles', 'role_id', 'actor_id');
    }
}
