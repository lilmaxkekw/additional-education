<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('index', ['courses' => $courses]);
    }

    public function showCourse($id){
        session()->put('course_id', $id);
        return view('show_course', ['course' => Course::find($id)]);
    }

    public function enrollmentCourse(){
        if(auth()->check()){
            return redirect()->route('user.index');
        }

        return redirect()->route('register');
    }

    public function courses() {
        $courses = Course::all();
        return view('courses', ['courses'=>$courses]);
    }

    public function contacts() {
        return view('contacts');
    }

    public function gallery() {
        return view('gallery');
    }

}
