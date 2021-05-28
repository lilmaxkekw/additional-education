<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $dates = ['date_section'];
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'name_section',
        'description_section',
        'date_section',
        'status',
        'partition_id'
    ];

    public function performances(){
        return $this->hasMany('App\Models\Performance');
    }

    public function partition()
    {
        return $this->belongsTo('App\Models\Partition');
    }
}
