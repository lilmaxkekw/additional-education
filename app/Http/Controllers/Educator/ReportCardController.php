<?php

namespace App\Http\Controllers\Educator;

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

        $fields = ['id_listener', 'last_name', 'first_name', 'patronymic'];
        $listeners = Listener::select($fields)->where('group_id', $group_id)->get(); //Слушатели выбранной группы

        $selected_course = Group::where('id', $group_id)->value('course_id'); //Выбранный курс привязанный к группе
        $request->session()->put('course_id', $selected_course);

        $fields = ['id_section', 'number_hours', 'name_section', 'description_section', 'date_section'];
        $sections = Section::select($fields)->where('courses_id', $selected_course)->get(); //Разделы курса привязанные к курсу

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

        //dd($data, 'update_data');

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

            $count_sections = Section::select(DB::raw('count(*) as number_sections'))->where('courses_id', $request->session()->get('course_id'))->first();

            $array_sections = Section::select('id_section')->where('courses_id', $request->session()->get('course_id'))->get();

            $sum_marks = Performance::select(DB::raw('sum(mark) as sum_marks'))->where('listener_id', $id_listener)->whereIn('section_id', $array_sections)->first();

            $average_marks = $sum_marks->sum_marks / $count_sections->number_sections;
            $request->session()->put('average_marks', $average_marks);

            $response = [
                'average_marks' => $average_marks,
                'id_listener' => $id_listener,
            ];

            return response()->json($response);
        }
    }

    public function edit_section($id)
    {
        $section = Section::where('id_section', $id)->first();
        return view('educator.edit', compact('section'));
    }

    public function update_section($id, Request $request)
    {
        $result = Section::where('id_section', $id)->update($request->except(['_token', '_method']));

        if (empty($result)) {
            return back()->with('error', 'Произошла ошибка при изменении записи');
        } else {
            $group_id = $request->session()->get('group_id');
            return redirect()->route('report.card', $group_id)->with('success', 'Запись успешно обновлена');
        }
    }

    public function edit_modal($id, Request $request)
    {
        dd($id);
        $result = Section::where('id_section', $id)->update($request->except(['_token', '_method']));

        if (empty($result)) {
            return json_encode('Error');
        } else {
            return json_encode('Success');
        }
    }
}
