<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
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
        $courses = Course::paginate(8);
        $categories = Category::all();

        return view('admin.courses.index', ['courses' => $courses, 'categories' => $categories]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.courses.create', ['categories' => Category::all()]);
    }

    /**
     * @param CourseRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CourseRequest $request)
    {
        #TODO
        $course = Course::create($request->all());
        return response()->json($course);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $course = Course::where('id', $id)->first();
        $categories = Category::all();

        return view('admin.courses.show', [
            'course' => $course,
            'categories' => $categories
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categories = Category::all();
        $course = Course::where('id', $id)->first();

        return view('admin.courses.edit', ['course' => $course, 'categories' => $categories]);
    }

    /**
     * @param CourseRequest $request
     * @param $id
     */
    public function update(CourseRequest $request, $id)
    {
        Course::where('id', $id)->update($request->except(['_token']));
        return json_encode(['status_code' => 200]);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        Course::destroy($id);

        return redirect()->route('courses.index')->with('success', 'Курс ' . $course->name_of_course . ' успешно удален');
    }

}
