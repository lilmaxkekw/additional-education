<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $users = User::paginate(8);
        $roles = Role::all();
        $count = User::count();

        return view('admin.users.index', [
            'users' => $users,
            'roles' => $roles,
            'count' => $count
        ]);
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function store(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        return response()->json($user);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $user = User::find($id);

        return view('admin.users.show', ['user' => $user]);
    }
}
