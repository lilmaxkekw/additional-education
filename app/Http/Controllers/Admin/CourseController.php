<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Partition;
use App\Models\Section;

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

        return view('admin.courses.index', [
            'courses' => $courses,
            'categories' => $categories
        ]);
    }
    /**
     * @param CourseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CourseRequest $request)
    {
        Course::create($request->all());
        $course = Course::all()->last();

        Partition::create([
            'name' => 'Итого',
            'status' => 'Total',
            'course_id' => $course->id
        ]);

        return response()->json(['success' => 'Курс успешно добавлен']);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $course = Course::where('id', $id)->first();
        $categories = Category::all();
        $partitions = Partition::where('course_id', $id)->get();
        $count = Section::count();

        return view('admin.courses.show', [
            'course' => $course,
            'categories' => $categories,
            'count' => $count,
            'partitions' => $partitions
        ]);
    }

    /**
     * @param CourseRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CourseRequest $request, $id)
    {
        $data = Course::where('id', $id)->update($request->except(['_token']));

        return response()->json($data);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        Course::destroy($id);

        return redirect()->route('courses.index')->with('success', 'Курс ' . $course->name_of_course . ' успешно удален');
    }

}
