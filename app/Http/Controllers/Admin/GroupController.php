<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Course;
use App\Models\Group;
use App\Models\Listener;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $fields = ['id', 'number_group', 'start_date', 'end_date', 'course_id'];
        $groups = Group::select($fields)->paginate(5);
        $count = Group::count();
        $courses = Course::pluck('name_of_course', 'id');

        return view('admin.groups.index', [
            'groups' => $groups,
            'count' => $count,
            'courses' => $courses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(GroupRequest $request)
    {
        $data = Group::create($request->all());

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $listeners = Listener::with('user')->where('group_id', $id)->get();

        $group = Group::select('number_group')->where('id', $id)->first();
        $count = Listener::where('group_id', $id)->count();

        return view('admin.groups.show', [
            'listeners' => $listeners,
            'group' => $group,
            'count' => $count
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(GroupRequest $request, $id)
    {
        $result = Group::find($id)->update($request->all());

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
         Group::find($id)->delete();

        return response()->json('success');
    }
}
