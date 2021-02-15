<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    public function listener(){
        return $this->belongsTo('App\Models\Listener');
    }

    public function section(){
        return $this->belongsTo('App\Models\Section');
    }
}
