<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\Listener;
use App\Models\Partition;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\Performance;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Подача заявки на курс
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function enrollment_course(Request $request){
        $exists_applications = Application::where('course_id', '=', $request->course_id)->where('user_id', '=', auth()->user()->id)->count();

        if($exists_applications > 0){
            return response()->json(['error' => 'error']);
        }

        $data = Application::create([
            'course_id' => $request->course_id,
            'user_id' => auth()->user()->id
        ]);

        return response()->json($data);
    }

    /**
     * Личный кабинет
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account(){
        return view('user.account', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Редактирование данных
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit_account(Request $request){
        $id = auth()->user()->id;

        $result = User::find($id)->update([
            'name' => $request->name,
            'number_phone' => $request->number_phone,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'place_of_residence' => $request->place_of_residence,
            'insurance_number' => $request->insurance_number
        ]);

        return response()->json($result);
    }

    /**
     * Вывод успеваемости
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show_performance($partition_id = 0){
        $performanace = Performance::where('listener_id', auth()->user()->id)->get();

        $haveGroup = false;
        $partitions = 0;
        $sections = 0;
        $status_page = 0;
        $total_marks = 0;
        $headers_sections = 0;
        $marks = 0;
        $listener = 0;

        $listener = Listener::where('user_id', auth()->user()->id)->first();

        if (!empty($listener->group_id)) {

            $haveGroup = true;

            $course_id = Group::where('id', $listener->group_id)->first();
            $course = Course::where('id', $course_id->course_id)->first();
            $partitions = Partition::where('course_id', $course->id)->get();

            $partitions_id = Partition::where('course_id', $course->id)->pluck('id');
            $sections = Section::whereIn('partition_id', $partitions_id)->get();

            $status_page = Partition::where('id', $partition_id)->value('status');
            $total_marks = Performance::where('status', 'Total')->get();
            $course_partitions = Partition::where('course_id', $course->id)->where('status', NULL)->get('id');
            $headers_sections = Section::where('status', 'Total')->whereIn('partition_id', $course_partitions)->get();

            $marks = Performance::
            join('listeners', 'performances.listener_id', '=', 'listeners.id_listener')
                ->join('sections', 'performances.section_id', '=', 'sections.id_section')
                ->select('performances.id', 'performances.mark', 'listeners.id_listener', 'sections.id_section')
                ->get();


        }

        return view('user.performance', [
            'performance' => $performanace,
            'partitions' => $partitions,
            'sections' => $sections,
            'status_page' => $status_page,
            'total_marks' => $total_marks,
            'headers_sections' => $headers_sections,
            'marks' => $marks,
            'listener' => $listener,
            'haveGroup' => $haveGroup,
        ]);
    }

    /**
     * Вывод заявок
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show_applications(){
        $applications = Application::where('user_id', auth()->user()->id)->get();
        return view('user.applications', ['applications' => $applications]);
    }

    public function upload_image(Request $request)
    {
        if ($request->has('image')){
            Storage::put(auth()->user()->id.'.'.$request->image->extension(), file_get_contents($request->image));
            User::find(auth()->user()->id)->update([
                'photo' => auth()->user()->id.'.'.$request->image->extension(),
            ]);
        }

        return back();
    }
}
