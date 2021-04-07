<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function listener(){
        return $this->belongsTo('App\Models\Listener');
    }

    public function enrollments(){
        return $this->hasMany('App\Models\Enrollment');
    }
}
