<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ratings extends Model
{
    protected $fillable = ['score', 'comment'];
}
