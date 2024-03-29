<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ApplicationExport;
use App\Http\Controllers\Controller;
use App\Models\Listener;
use App\Models\Partition;
use App\Models\Performance;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $applications = Application::all();
        $count = Application::count();
        $groups = Group::all();

        return view('admin.applications.index', [
            'applications' => $applications,
            'count' => $count,
            'groups' => $groups
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $users = $request->insert;
        $group = $request->group_id;

        $data = [];
        $success = [];

        // Массив ошибок
        $error_data = [];

        foreach($users as $user){
            if(! Listener::where('user_id', $user)->exists()){
                $data[] = [
                    'user_id' => $user,
                    'group_id' => $group,
                    'created_at' => Carbon::now()
                ];

                Application::where('user_id', $user)->update([
                    'status_application' => 1
                ]);

                $success[] = $user;
            }else{
                $error_data = ["пользователь ${user} уже записан на курс"];

            }
        }
        $listener = \DB::table('listeners')->insert($data);


        $selected_course = Group::where('id', $group)->value('course_id');
        $partitions = Partition::select('id')->where('course_id', $selected_course)->where('status', NULL)->get();
        $sections = Section::whereIn('partition_id', $partitions)->get();
        $total_sections = Section::select('id_section')->whereIn('partition_id', $partitions)->where('status', 'Total')->get();

        $l = DB::table('listeners')->whereIn('user_id', $success)->get();
       //dd($total_sections);
        foreach ($l as $item){
            foreach ($sections as $section){
                Performance::create([
                    'listener_id' => $item->id_listener,
                    'section_id' => $section->id_section
                ]);
            }
        }

        Performance::whereIn('section_id', $total_sections)->update([
            'status' => 'Total',
        ]);


//        foreach ($l as $item){
//            foreach ($total_sections as $total_section){
//                Performance::create([
//                    'listener_id' => $item->id_listener,
//                    'section_id' => $total_section->id_section,
//                    'status' => 'Total',
//                ]);
//            }
//        }


        // Проверка на ошибки
        if(! empty($error_data)){
            return response()->json('fail');
        }
        return response()->json($listener);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(){
        return Excel::download(new ApplicationExport, 'Одобренные заявки.xlsx');
    }

}
