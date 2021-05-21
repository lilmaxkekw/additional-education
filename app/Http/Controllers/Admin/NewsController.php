<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function show_news(){
        $news = News::all();
        return view('admin.news.index', ['news' => $news]);
    }

}
