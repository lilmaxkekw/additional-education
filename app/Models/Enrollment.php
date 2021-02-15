<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public function group(){
        return $this->belongsTo('App\Models\Group');
    }

    public function listener(){
        return $this->belongsTo('App\Models\Listener');
    }
}
