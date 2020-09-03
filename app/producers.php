<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producers extends Model
{
    protected $fillable = ['fname', 'lname', 'company'];
    protected $primaryKey = 'producer_id';

    public function movies()
    {
        return $this->hasMany('App\movies');
    }
}
