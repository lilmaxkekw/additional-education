<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $count_applications = Application::all()->count();

        return view('admin.index', ['count_applications' => $count_applications]);
    }
}
