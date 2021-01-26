<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name_of_course', 'description_of_course', 'number_of_course'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
