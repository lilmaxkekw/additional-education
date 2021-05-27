<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Charts\PopularityOfCourses;
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
//        $last_applications = Application::where('created_at', '>=', Carbon::now()->format('Y-m-d'))->get();

        // Chart
        $courses = Course::all();
        $chart = new PopularityOfCourses;

        $data = [];
        $applications = [];
        foreach($courses as $course){
            $data[] = $course->name_of_course;

            $applications[] = Application::where('status_application', 1)->where('course_id', $course->id)->count();
        }

        $chart->labels($data);

        $chart->title('Количество слушателей по курсам', 24,  '#3B82F6');
        $chart->dataset('Количество слушателей', 'bar', $applications)->options([
            'backgroundColor' => '#6EE7B7'
        ]);
        $chart->loaderColor('#3B82F6');

        return view('admin.index', [
            'new_applications' => $new_applications,
            'approved_applications' => $approved_applications,
            'count_courses' => $count_courses,
            'last_users' => $last_users,
            'chart' => $chart
        ]);
    }
}
