<?php

namespace App\Http\Controllers\Educator;

use App\Http\Requests\ReportCardRequest;
use App\Models\Group;
use App\Models\Course;
use App\Models\Listener;
use App\Models\Performance;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportCardController extends BaseController
{
    public function groups(Request $request, $group_id = 0)
    {

        $request->session()->put('group_id', $group_id);
        $course = 0;

        if ($group_id != 0) {
            $tmp_group = Group::where('id', $group_id)->first();
            $course = Course::where('id', $tmp_group->course_id)->first();
        }

        $groups = Group::select('id', 'number_group')->orderBy('number_group')->get(); //Все группы

        $fields = ['id_listener'];
        $listeners = Listener::with('user')->where('group_id', $group_id)->get(); //Слушатели выбранной группы
        //dd($listeners);
        $selected_course = Group::where('id', $group_id)->value('course_id'); //Выбранный курс привязанный к группе
        $request->session()->put('course_id', $selected_course);

        $fields = ['id_section', 'number_hours', 'name_section', 'description_section', 'date_section'];
        $sections = Section::select($fields)->where('course_id', $selected_course)->get(); //Разделы курса привязанные к курсу

        $marks = Performance::
            join('listeners', 'performances.listener_id', '=', 'listeners.id_listener')
            ->join('sections', 'performances.section_id', '=', 'sections.id_section')
            ->select('performances.id', 'performances.mark', 'listeners.id_listener', 'sections.id_section')
            ->where('listeners.group_id', $group_id)
            ->get();

        $possible_marks = [
            '5' => 5,
            '4' => 4,
            '3' => 3,
            '2' => 2,
            '1' => 1,
            'Пропуск' => 'Пропуск',
            NULL => 'Оценка отсутствует'
        ];

        return view('educator.report_card',
            compact('groups', 'group_id', 'listeners', 'sections', 'marks', 'possible_marks', 'course'));

    }

    public function update_data(Request $request)
    {
        $data = $request->input();

        if ($data['status'] == 'dates') {
            if (($data['date'])) {
                if (!empty($data['date'])) {
                    $id_section = $data['idSection'];
                    $date = $data['date'];

                    Section::where('id_section', $id_section)->update(['date_section' => $date]);
                }
                else {
                    $id_section = $data['idSection'];
                    $date = Carbon::now();

                    Section::where('id_section', $id_section)->update(['date_section' => $date]);
                }
            }
        }

        if ($data['status'] == 'marks') {

            $mark_idMark_idListener = explode('|', $data['mark']);

            $mark = $mark_idMark_idListener[0];
            $id_mark = $mark_idMark_idListener[1];
            $id_listener = $mark_idMark_idListener[2];

            Performance::where('id', $id_mark)->update(['mark' => $mark]);

            $count_sections = Section::where('course_id', $request->session()->get('course_id'))->count();

            $array_sections = Section::select('id_section')->where('course_id', $request->session()->get('course_id'))->get();

            $sum_marks = Performance::where('listener_id', $id_listener)->whereIn('section_id', $array_sections)->sum('mark');

            $average_marks = $sum_marks / $count_sections;
            $request->session()->put('average_marks', $average_marks);

            $response = [
                'average_marks' => $average_marks,
                'id_listener' => $id_listener,
            ];

            return response()->json($response);
        }
    }

    public function edit_modal(ReportCardRequest $request)
    {
        $result = DB::table('sections')->where('id_section', $request->id_section)->update($request->except('id_section', '_token'));
        return response()->json($result);
    }
}
