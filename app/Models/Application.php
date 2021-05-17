<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
//        'phone_number',
        'birthday',
        'place_of_residence',
        'platform_address',
        'insurance_number',
        'course_id',
        'user_id',
        'status_application'
        ];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
