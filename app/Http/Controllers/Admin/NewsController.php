<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

/**
 * Class NewsController
 * @package App\Http\Controllers\Admin
 */
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        return view('admin.news.index', ['news' => $news]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(NewsRequest $request)
    {
        $news_title = News::create($request->all());

        return response()->json($news_title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function change_status(Request $request){
        dd($request->all());
        $news = News::find($request->id);
        $news->news_status = $request->news_status;
        $news->save();

        return response()->json(['success' => 'status change']);
    }
}
