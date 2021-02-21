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
        return view('admin.courses.index', ['courses' => $courses]);
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
        $path_image = $request->file('file-upload')->store('images');

        $course = Course::create([
            'name_of_course' => $request->input('name_of_course'),
            'description_of_course' => $request->input('description_of_course'),
            'number_of_course' => $request->input('number_of_course'),
            'category_id' => $request->input('categories'),
            'image_of_course' => $path_image
        ]);

        return redirect()->route('courses.index')->with('success', 'Курс ' . $course->name_of_course . ' успешно добавлен');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $course = Course::where('id', $id)->first();
        $category = Category::where('id', $course->category_id)->first();

        return view('admin.courses.show', [
            'course' => $course,
            'category' => $category]);
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
        Course::where('id', $id)->update([
            'name_of_course' => $request->input('name_of_course'),
            'description_of_course' => $request->input('description_of_course'),
            'number_of_course' => $request->input('number_of_course'),
            'category_id' => $request->input('categories')
        ]);

        return redirect()->route('courses.show', ['course' => $id]);
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
