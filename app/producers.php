<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class producers extends Model
{
    protected $fillable = ['fname', 'lname', 'company'];
    use SoftDeletes;
}
