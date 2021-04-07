<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('welcome', ['courses' => Course::all()]);
    }

    public function showCourse($id){
        session()->put('course_id', $id);
        return view('course_show', ['course' => Course::find($id)]);
    }
}
