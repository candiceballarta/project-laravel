<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class actors extends Model
{
    protected $fillable = ['fname', 'lname', 'notes'];
    use SoftDeletes;
}
