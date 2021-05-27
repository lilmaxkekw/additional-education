<?php

namespace App\Http\Controllers\Educator;

use App\Http\Requests\UserRequest;
use App\Models\Listener;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        //dd($result);
        return response()->json($result);
    }

    public function upload_image(Request $request)
    {

        if ($request->has('image')){
            //dd(auth()->user()->id.'.'.$request->image->extension());
            Storage::put(auth()->user()->id.'.'.$request->image->extension(), file_get_contents($request->image));
            User::find(auth()->user()->id)->update([
                'photo' => auth()->user()->id.'.'.$request->image->extension(),
            ]);
        }

        //dd(auth()->user());

//        $imageName = time().'.'.$request->image->extension();
//        $request->image->move(public_path('storage/app/images'), $imageName);
//        User::find(auth()->user()->id)->update([
//            'photo' => $imageName,
//        ]);
//
//        return back()
//            ->with('success','You have successfully upload image.')
            //->with('image',$imageName);
        return back();
    }
}
