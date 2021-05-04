<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listener;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Group;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::all();
        $count = Application::count();
        $groups = Group::all();

        return view('admin.applications.index', ['applications' => $applications, 'count' => $count, 'groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
//        TODO
        $users = $request->insert;
        $group = $request->group_id;
        $data = [];

        foreach($users as $user){
            $data[] = [
                'user_id' => $user,
                'group_id' => $group,
                'created_at' => Carbon::now()
            ];
            Application::where('user_id', $user)->update([
                'status_application' => 1
            ]);
        }

        \DB::enableQueryLog();
        Application::where('user_id', 1)->update(['status_application' => 1]);
        dd(\DB::getQueryLog());

        $listener = \DB::table('listeners')->insert($data);

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

}
