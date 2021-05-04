<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listener;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(8);
        $roles = Role::all();
        $count = User::count();

        return view('admin.users.index', ['users' => $users, 'roles' => $roles, 'count' => $count]);
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        User::create($request->all());

        return json_encode(['status_code' => 200]);
    }

    public function show($id){
        $user = User::find($id);

        return view('admin.users.show', ['user' => $user]);
    }
}
