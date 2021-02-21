<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name_of_course', 'description_of_course', 'number_of_course', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function groups(){
        return $this->hasMany('App\Models\Group');
    }

    public function applications(){
        return $this->hasMany('App\Models\Application');
    }
}
