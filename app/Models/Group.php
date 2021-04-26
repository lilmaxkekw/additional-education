<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    protected $fillable = ['number_group', 'start_date', 'end_date', 'course_id'];

    public function course(){
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function listener(){
        return $this->belongsTo('App\Models\Listener');
    }

    public function enrollments(){
        return $this->hasMany('App\Models\Enrollment');
    }
}
