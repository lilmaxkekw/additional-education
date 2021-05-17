<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Performance extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'listener_id',
        'mark',
        'section_id'
    ];

    public function listener(){
        return $this->belongsTo('App\Models\Listener');
    }

    public function section(){
        return $this->belongsTo('App\Models\Section');
    }
}
