<?php

namespace App\Http\Controllers\Educator;

use App\Http\Requests\ReportCardRequest;
use App\Models\Group;
use App\Models\Course;
use App\Models\Listener;
use App\Models\Partition;
use App\Models\Performance;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\Attendance;

class ReportCardController extends BaseController
{
    public function groups(Request $request, $group_id = 0, $partition_id = 0)
    {
        $request->session()->put('group_id', $group_id);
        //Для вывода названия курса при выбранной группе, если 0 - нету названия курса
        $course = 0;
        //Для проверки в журнале успекваемости
        $partitions = 0;
        $sections = 0;
        $listeners = 0;
        $marks = 0;
        $possible_marks = 0;
        $selected_partition = 0;
        $status_page = Partition::where('id', $partition_id)->value('status');
        $headers_partitions = 0;
        $headers_sections = 0;
        $total_marks = 0;

        if ($group_id != 0) {
            $group = Group::select('course_id')->where('id', $group_id)->first();
            $course = Course::where('id', $group->course_id)->first();
            $partitions = Partition::where('course_id', $group->course_id)->get();
            //Разделы для вывода итоговых оценок
            $headers_partitions = Partition::where('course_id', $group->course_id)->where('status', NULL)->get('name');

            if ($partition_id) {
                //Выбранный раздел
                $selected_partition = Partition::where('id', $partition_id)->value('id');
                $request->session()->put('partition_id', $selected_partition);

                //Выбранный курс. Для среднего балла слушателей за раздел //Темы для вывода итоговых оценок
                $selected_course = Group::where('id', $group_id)->value('course_id');
                $course_partitions = Partition::where('course_id', $selected_course)->where('status', NULL)->get('id');
                $headers_sections = Section::where('status', 'Total')->whereIn('partition_id', $course_partitions)->get();
                $total_marks = Performance::where('status', 'Total')->get();

                $fields = ['id_section', 'name_section', 'description_section', 'date_section', 'status'];
                //Темы выбранного раздела
                $sections = Section::select($fields)->where('partition_id', $partition_id)->get();
                $sections = $sections->sortBy('status');
                //Итоговая тема выбранного раздела
                $total_sections = Section::select($fields)->where('partition_id', $partition_id)->where('status', 'Total')->get();

                //Слушатели выбранной группы
                $listeners = Listener::with('user')->where('group_id', $group_id)->get();

                //Оценки слушателей
                $marks = Performance::
                    join('listeners', 'performances.listener_id', '=', 'listeners.id_listener')
                    ->join('sections', 'performances.section_id', '=', 'sections.id_section')
                    ->select('performances.id', 'performances.mark', 'listeners.id_listener', 'sections.id_section')
                    ->where('listeners.group_id', $group_id)
                    ->get();

                //Возможные оценки
                $possible_marks = [
                    '5' => 5,
                    '4' => 4,
                    '3' => 3,
                    '2' => 2,
                    '1' => 1,
                    'Пропуск' => 'Пропуск',
                    NULL => 'Оценка отсутствует'
                ];
            }
        }
        //Все группы
        $groups = Group::with('course')->orderBy('number_group')->get();
        //dd($groups);

        //Chart
        $tmp_marks = ['Пропуск'];

        $dates = Section::where('partition_id', $selected_partition)->where('status', NULL)->get();
        $result_dates = [];
        $id_sections = [];
        $number_attendees = [];
        $number_absentees = [];

        foreach ($dates as $date) {
            $result_dates[] = Carbon::parse($date->date_section)->format('d.m.Y');
            $id_sections[] = $date->id_section;
        }

        $chart = new Attendance();
        $chart->labels($result_dates);
        foreach ($id_sections as $id_section) {
            $number_attendees[] = Performance::where('status', NULL)->where('section_id', $id_section)->where('mark', '!=', 'Пропуск')->where('mark', '!=', NULL)->get()->count('id');
            $number_absentees[] = Performance::where('status', NULL)->where('section_id', $id_section)->whereIn('mark', $tmp_marks)->get()->count('id');
        }

        $chart->dataset('Количество присутствующих', 'bar', $number_attendees)->options([
            'backgroundColor' => '#6EE7B7'
        ]);

        $chart->dataset('Количество отсутствующих', 'bar', $number_absentees)->options([
            'backgroundColor' => '#FCA5A5',
        ]);

        return view('educator.report_card',
            compact('groups', 'group_id', 'listeners', 'sections', 'marks', 'possible_marks', 'course', 'partitions', 'selected_partition', 'status_page', 'headers_sections', 'total_marks', 'chart'));

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
            $count_sections = Section::where('partition_id', $request->session()->get('partition_id'))->count();
            $array_sections = Section::select('id_section')->where('status', NULL)->where('partition_id', $request->session()->get('partition_id'))->get();
            $sum_marks = Performance::where('listener_id', $id_listener)->whereIn('section_id', $array_sections)->sum('mark');

            $average_marks = $sum_marks / ($count_sections - 1);
            $request->session()->put('average_marks', $average_marks);

            $response = [
                'id_listener' => $id_listener,
                'average_marks' => $average_marks,
            ];

            return response()->json($response);
        }

        if ($data['status'] == 'total') {
            Performance::where('section_id', $data['id_section'])->where('listener_id', $data['id_listener'])->update(['mark' => $data['mark']]);
            $response = [
                'id' => $data['id'],
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
