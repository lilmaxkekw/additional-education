<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $categories = Category::paginate(10);
        //
        $count = count($categories);
        //
        $all = Category::all()->count();

        return view('admin.categories.index',
            [
                'categories' => $categories,
                'count' => $count,
                'all' => $all
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());

//        return redirect()->route('categories.index')->with('success', 'Категория ' . $category->name_of_category .' успешно добавлена');
        return json_encode(['status_code' => 200, 'name_of_category' => $category->name_of_category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.categories.edit', ['category' => Category::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        Category::where('id', $id)->update([
            'name_of_category' => $request->input('name_of_category')
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
//        $category = Category::find($id);
        Category::destroy($id);

//        return redirect()->route('categories.index')->with('success', 'Категория ' . $category->name_of_category . ' успешно удалена');
        return json_encode(['status_code' => 200]);
    }
}
