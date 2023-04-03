<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeStamp extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'timezone'];
}
