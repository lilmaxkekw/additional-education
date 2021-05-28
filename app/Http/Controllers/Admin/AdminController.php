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
        // количество новых заявок
        $new_applications = Application::where('status_application', '=', 0)->count();
        // количество подтвержденных заявок
        $approved_applications = Application::where('status_application', '=', 1)->count();
        // количество курсов
        $count_courses = Course::count();
        // количество новых пользователей
        $new_users = User::where('created_at', '>=', Carbon::now()->format('Y-m-d'))->count();

        // последние заявки
//        $last_applications = Application::where('created_at', '>=', Carbon::now()->format('Y-m-d'))->sortByDesc('created_at');
        $last_applications = Application::orderBy('created_at', 'desc')->where('created_at', '>=', Carbon::now()->format('Y-m-d'))->get();

        // диаграмма
        $chart = new PopularityOfCourses;
        $courses = Course::all();

        $data = [];
        $applications = [];
        foreach($courses as $course){
            $data[] = $course->name_of_course;

            $applications[] = Application::where('status_application', 1)->where('course_id', $course->id)->count();
        }

        $chart->labels($data);

        $chart->title('Количество слушателей по курсам', 24,  '#3B82F6');
        $chart->dataset('Количество слушателей', 'bar', $applications)->options([
            'backgroundColor' => '#3B82F6'
        ]);
        $chart->loaderColor('#3B82F6');

        return view('admin.index', [
            'new_applications' => $new_applications,
            'approved_applications' => $approved_applications,
            'count_courses' => $count_courses,
            'last_applications' => $last_applications,
            'new_users' => $new_users,
            'chart' => $chart
        ]);
    }
}
