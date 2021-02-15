<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listener extends Model
{
    public function enrollments(){
        return $this->hasMany('App\Models\Enrollment');
    }

    public function performances(){
        return $this->hasMany('App\Models\Performance');
    }
}
