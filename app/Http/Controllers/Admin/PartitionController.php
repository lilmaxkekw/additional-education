<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartitionRequest;
use App\Models\Partition;
use App\Models\Section;

class PartitionController extends Controller
{
    public function store(PartitionRequest $request){
        $data = Partition::create([
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'name' => $request->name,
            'number_hours' => $request->number_hours,
            'course_id' => $request->course_id
        ]);

        Section::create([
            'name_section' => 'Итого',
            'status' => 'Total',
            'partition_id' => $data->id
        ]);

        return response()->json($data);
    }

    public function update(){

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $partition = Partition::find($id);
        Partition::destroy($id);

        return redirect()->route('course.index');
    }
}
