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

Route::group(['namespace' => 'Educator', 'prefix' => 'educator'], function() {
    Route::get('/account/{id?}', 'EducatorController@show_account')->name('account');
    Route::post('/account/{id?}', 'EducatorController@edit_account')->name('account');
    Route::get('/report-card/{group?}',  'ReportCardController@groups')->name('report.card');
    Route::post('/report-card/{group?}',  'ReportCardController@update_marks')->name('report.card');
});
