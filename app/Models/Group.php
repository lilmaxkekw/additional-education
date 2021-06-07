<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'number_group',
        'start_date',
        'end_date',
        'status_group',
        'course_id'
    ];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

//    public function listener(){
//        return $this->belongsTo('App\Models\Listener');
//    }

    public function listeners(){
        return $this->belongsTo('App\Models\Listener');
    }

    public function enrollments(){
        return $this->hasMany('App\Models\Enrollment');
    }
}
