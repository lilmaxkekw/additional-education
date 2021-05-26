<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partition extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date_start',
        'date_end',
        'name',
        'number_hours',
        'status',
        'course_id'
    ];

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
