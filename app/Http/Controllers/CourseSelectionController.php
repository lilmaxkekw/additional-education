<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseSelectionController extends Controller
{
    public function index(){

        return view('course_selection', ['courses' => Course::all()]);
    }
}
