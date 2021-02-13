<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $dates = ['date_section'];
    protected $dateFormat = 'Y-m-d';

    public function performances(){
        return $this->hasMany('App\Models\Performance');
    }
}
