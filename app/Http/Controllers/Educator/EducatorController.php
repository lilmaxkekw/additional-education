<?php

namespace App\Http\Controllers\Educator;

use App\Models\Listener;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class EducatorController extends BaseController
{
    public function show_account()
    {
        $item = User::where('id', $id = auth()->user()->id)->first();
        return view('educator.account', compact('item'));
    }

    public function edit_account(Request $request)
    {

        $id = auth()->user()->id;
        $data = $request->input();
        $result = User::find($id)->update($data);

        $response = [
            'result' => $result,
        ];

        return response()->json($response);
    }
}
