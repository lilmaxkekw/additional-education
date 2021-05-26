<?php

namespace App\Http\Controllers\Educator;

use App\Http\Requests\UserRequest;
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

    public function edit_account(UserRequest $request)
    {
        $id = auth()->user()->id;
        $result = \DB::table('users')->where('id', $id)->update($request->except('_token'));

        return response()->json($result);
    }
}
