<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param SectionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SectionRequest $request)
    {
        $data = Section::create([
            'name_section' => $request->name_section,
            'description_section' => $request->description_section,
            'date_section' => $request->date_section,
            'status' => 'Total',
            'partition_id' => $request->partition_id
        ]);

        return response()->json($data);
    }
}
