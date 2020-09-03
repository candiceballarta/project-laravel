<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producers extends Model
{
    protected $fillable = ['producer_id','fname', 'lname', 'company'];

    public function movies()
    {
        return $this->hasMany('App\movies');
    }
}
