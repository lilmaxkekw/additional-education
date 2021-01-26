<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/educator/account', function () { return view('educator.account'); })->name('account');
Route::get('/educator/report-card', function () { return view('educator.report_card'); })->name('report.card');
