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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::resource('/group', 'GroupController')->names('groups');
});
Route::get('/', function () {
    return view('welcome');
})->name('main');

Auth::routes();

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::resource('/courses', 'CourseController');
    Route::resource('/categories', 'CategoryController')->except('show');
    Route::resource('/applications', 'ApplicationController');
    Route::resource('/groups', 'GroupController');
});

Route::group(['namespace' => 'Educator', 'prefix' => 'educator'], function() {
    Route::get('/account/{id?}', 'EducatorController@show_account')->name('account');
    Route::post('/account/{id?}', 'EducatorController@edit_account')->name('account');

    Route::get('/report-card/{group?}', 'ReportCardController@groups')->name('report.card');
    Route::post('/report-card/{group?}', 'ReportCardController@update_data')->name('report.card');
});
