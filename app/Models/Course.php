<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = ['name_of_course', 'description_of_course', 'number_of_course', 'category_id', 'image_of_course'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function groups(){
        return $this->hasMany('App\Models\Group');
    }

    public function applications(){
        return $this->hasMany('App\Models\Application');
    }

    public function partitions(){
        return $this->hasMany('App\Models\Partition');
    }

    /**
     * @return string
     */
    protected function getShortContentAttribute(){
        return Str::words((string) $this['description_of_course'], 30);
    }
}
