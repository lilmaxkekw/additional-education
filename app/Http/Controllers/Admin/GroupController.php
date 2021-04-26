<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Models\Course;
use App\Models\Group;
use App\Models\Listener;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = ['id', 'number_group', 'start_date', 'end_date', 'course_id'];
        $groups = Group::select($fields)->paginate(2);
        $count = Group::count('id');
        $courses = Course::pluck('name_of_course', 'id');

        return view('admin.groups.index', ['groups' => $groups, 'count' => $count, 'courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::select('id', 'name_of_course')->get();
        return view('admin.groups.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupCreateRequest $request)
    {;
        $items = $request->validated();
        $result = Group::create($items);

        return response()->json('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fields = ['id_listener', 'last_name', 'first_name', 'patronymic', 'birthday'];
        $listeners = Listener::select($fields)->where('group_id', $id)->get();
        $new_listeners = Listener::select($fields)->where('group_id', '!=', $id)->get();
        $group = Group::select('number_group')->where('id', $id)->first();

        return view('admin.groups.show', compact('listeners', 'group', 'new_listeners'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        $courses = Course::select('id', 'name_of_course')->get();

        return view('admin.groups.edit', compact('group', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $result = Group::find($id)->update($data);

        if ($result)
            return redirect()->route('groups.index');
        else
            return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Group::find($id)->delete();

        if (!empty($result))
            return redirect()->route('groups.index')->with('success', 'Удаление данных произошло успешно.');
        else
            return redirect()->route('groups.index')->with('error', 'При удалении данных произошла ошибка.');
    }
}
