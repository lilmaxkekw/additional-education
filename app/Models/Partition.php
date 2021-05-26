<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partition extends Model
{
    use SoftDeletes;

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
