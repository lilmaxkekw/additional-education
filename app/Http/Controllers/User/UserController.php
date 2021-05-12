<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Application;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function enrollment_course(Request $request){
        Application::create([
            'phone_number' => $request->phone_number,
            'birthday' => $request->birthday,
            'place_of_residence' => $request->place_of_residence,
            'platform_address' => $request->platform_address,
            'insurance_number' => $request->insurance_number,
            'course_id' => 1,
            'user_id' => auth()->user()->id,
            'status_application' => 0
        ]);

//        return response()->json($data);

        // TODO
        return redirect()->back()->with('success');
    }

    public function account(){
        return view('user.account', [
            'user' => auth()->user()
        ]);
    }
}
