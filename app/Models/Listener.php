<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listener extends Model
{
    protected $fillable = [
        'user_id',
        'group_id'
    ];

    public function enrollments(){
        return $this->hasMany('App\Models\Enrollment');
    }

    public function groups(){
        return $this->hasMany('App\Models\Group');
    }

    public function performances(){
        return $this->hasMany('App\Models\Performance');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
