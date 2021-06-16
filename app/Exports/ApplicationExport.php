<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ApplicationExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return \DB::table('applications')
            ->join('courses', 'applications.course_id', '=', 'courses.id')
            ->join('users', 'applications.user_id', '=', 'users.id')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->where('status_application', 1)
            ->select('applications.id', 'users.name', 'courses.name_of_course', 'categories.name_of_category', 'users.email', 'users.number_phone', 'users.birthday', 'users.place_of_residence', 'users.insurance_number')
            ->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'ФИО',
            'Выбранный курс',
            'Категория курса',
            'Email',
            'Номер телефона',
            'Дата рождения',
            'Место жительства',
            'ИНН'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true]
            ]
        ];
    }
}
