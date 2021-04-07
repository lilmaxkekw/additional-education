<?php

namespace App\Http\Controllers\Educator;

use App\Models\Group;
use App\Models\Listener;
use App\Models\Performance;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportCardController extends BaseController
{
    public function groups($group_id = 1)
    {
        $groups = Group::select('id', 'number_group')->get(); //Все группы

        $fields = ['id_listener', 'last_name', 'first_name', 'patronymic'];
        $listeners = Listener::select($fields)->where('group_id', $group_id)->get(); //Слушатели выбранной группы

        $selected_course = Group::where('id', $group_id)->value('course_id'); //Выбранный курс привязанный к группе

        $fields = ['id_section', 'name_section', 'date_section'];
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
            compact('groups', 'group_id', 'listeners', 'sections', 'marks', 'possible_marks'));

    }

    public function update_data($group_id = null, Request $request)
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
            $mark = $data['mark'];
            $id_mark = $data['input'];

            Performance::where('id', $id_mark)->update(['mark' => $mark]);
        }
    }
}
