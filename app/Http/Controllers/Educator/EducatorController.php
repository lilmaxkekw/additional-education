<?php

namespace App\Http\Controllers\Educator;

use App\Models\Listener;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class EducatorController extends BaseController
{
    public function show_account($id)
    {
        $id_user = User::select('id', 'role_id')->where('id', $id)->first();
        $role_user = Role::select('name_role')->where('id', $id_user->role_id)->first();

        //Преподаватель должен быть слушателем?
//        if ($role_user->name_role == 'Преподаватель')
//        {
//            $item = User::select('id', 'name', 'email')->where('id', $id_user->id)->first();
//            return view('educator.account', compact('item'));
//        }
//        else
//        {
//            abort(404);
//        }
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
