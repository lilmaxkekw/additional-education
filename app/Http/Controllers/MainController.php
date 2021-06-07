<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Course;
use App\Models\News;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        // все курсы
        $last_courses = Course::orderBy('created_at', 'DESC')->paginate(6);

//        $applications = [];
//        foreach($courses as $course){
//
//            $applications[] = Application::with('courses')->where('status_application', 1)->where('course_id', $course->id)->count();
//        }
//        dd($applications);
        // 4 последних новости
        $news = News::orderBy('created_at', 'DESC')->paginate(4);
        return view('index', [
//            'courses' => $courses,
            'news' => $news,
            'last_courses' => $last_courses
        ]);
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

    public function news(){
        $news = News::all();

        return view('news', [
            'news' => $news
        ]);
    }

    public function show_news($id){
        $news_item = News::find($id);
        return view('show_news_item', [
            'news_item' => $news_item
        ]);
    }

}
