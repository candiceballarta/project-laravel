<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class genres extends Model
{
    protected $fillable = ['genre_name'];
    use SoftDeletes;
}
