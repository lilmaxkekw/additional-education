<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $new_applications = Application::where('status_application', '=', 0)->count();
        $approved_applications = Application::where('status_application', '=', 1)->count();
        $count_courses = Course::count();

        return view('admin.index', [
            'new_applications' => $new_applications,
            'approved_applications' => $approved_applications,
            'count_courses' => $count_courses
        ]);
    }
}
