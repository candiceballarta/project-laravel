<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class actors extends Model
{
    protected $fillable = ['actor_id','fname', 'lname', 'notes'];
    use SoftDeletes;

    public function artist()
    {
        return $this->belongsTo('App\movies');
    }
}
