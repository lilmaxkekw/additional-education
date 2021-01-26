<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use App\Models\Course;

/**
 * Class CourseController
 * @package App\Http\Controllers\Admin
 */
class CourseController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $courses = Course::paginate(10);

        return view('admin.courses.index', ['courses' => $courses]);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.courses.create');
    }


    /**
     * @param CourseRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CourseRequest $request)
    {
        Course::create($request->all());
        return redirect('/admin/courses');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $course = Course::where('id', $id)->first();

        return view('admin.courses.show', ['course' => $course]);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $course = Course::where('id', $id)->first();

        return view('admin.courses.edit', ['course' => $course]);
    }


    /**
     * @param CourseRequest $request
     * @param $id
     */
    public function update(CourseRequest $request, $id)
    {
        Course::where('id', $id)->update($request->all());

        return redirect('/admin/courses');
    }


    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
