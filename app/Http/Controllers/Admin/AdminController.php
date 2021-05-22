<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $new_applications = Application::where('status_application', '=', 0)->count();
        $approved_applications = Application::where('status_application', '=', 1)->count();
        $count_courses = Course::count();

        $last_users = User::where('created_at', '>=', Carbon::now()->format('Y-m-d'))->count();
        $last_applications = Application::where('created_at', '>=', Carbon::now()->format('Y-m-d'))->get();

        return view('admin.index', [
            'new_applications' => $new_applications,
            'approved_applications' => $approved_applications,
            'count_courses' => $count_courses,
            'last_users' => $last_users,
            'last_applications' => $last_applications
        ]);
    }
}
