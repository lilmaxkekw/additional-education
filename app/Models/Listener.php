<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listener extends Model
{
    public function enrollments(){
        return $this->hasMany('App\Models\Enrollment');
    }

    public function groups(){
        return $this->hasMany('App\Models\Group');
    }

    public function performances(){
        return $this->hasMany('App\Models\Performance');
    }

    public function users(){
        return $this->hasOne('App\Models\Users');
    }
}
