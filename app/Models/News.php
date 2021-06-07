<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'news_title',
        'content',
        'news_status'
    ];

    protected function getShortContentAttribute(){
        return Str::words((string) $this['content'], 20);
    }
}
