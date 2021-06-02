<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\Performance;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function dashboard(){
        return view('user.dashboard');
    }

    /**
     * Подача заявки на курс
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function enrollment_course(Request $request){
        $data = Application::create([
//            'phone_number' => $request->number_phone,
            'birthday' => $request->birthday,
            'place_of_residence' => $request->place_of_residence,
            'platform_address' => $request->platform_address,
            'insurance_number' => $request->insurance_number,
            'course_id' => 1,
            'user_id' => auth()->user()->id,
            'status_application' => 0
        ]);

        return response()->json($data);
    }

    /**
     * Личный кабинет
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account(){
        return view('user.account', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Редактирование данных
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit_account(UserRequest $request){
        $id = auth()->user()->id;
        $data = $request->input();
        $result = User::find($id)->update($data);

        $response = [
            'result' => $result,
        ];

        return response()->json($response);
    }

    /**
     * Вывод успеваемости
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show_performance(){
        $performanace = Performance::where('listener_id', auth()->user()->id)->get();

        return view('user.performance', ['performance' => $performanace]);
    }

    /**
     * Вывод заявок
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show_applications(){
//        \DB::enableQueryLog();
        $applications = Application::where('user_id', auth()->user()->id)->get();
//        dd(\DB::getQueryLog());
        return view('user.applications', ['applications' => $applications]);
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

        return back();
    }
}
