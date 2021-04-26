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
//        $id_user = User::select('id', 'role_id')->where('id', $id)->first();
        return view('educator.layout.app');
    }

    public function edit_account($id, Request $request)
    {
        $data = $request->input();
        $result = User::find($id)->update($data);

        if (!empty($result))
            return redirect()->route('account', $id)->with('success', 'Данные успешно сохранены!');
        else
            return redirect()->route('account', $id)->with('error', 'При сохранении данных произошла ошибка!');

    }
}
