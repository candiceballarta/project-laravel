<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class movies extends Model
{
    protected $fillable = ['title','director','year'];
    use SoftDeletes;
}
