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

Route::get('/', 'MainController@index')->name('home');
Route::get('/course/{id}', 'MainController@showCourse')->name('course.show');
Route::get('/course-selection', 'CourseSelectionController@index');

// Маршруты авторизации и регистрации
Auth::routes([
    'verify' => true
]);

// Маршруты админки
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'verified']], function(){

//    auth()->login(App\Models\User::first());

    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::resource('/courses', 'CourseController')->except('create');
    Route::resource('/categories', 'CategoryController')->except(['show', 'create']);
    Route::resource('/applications', 'ApplicationController');
    Route::resource('/groups', 'GroupController');
    Route::resource('/users', 'UserController')->except('create');
});

// Маршруты личного кабинета преподавателя
Route::group(['namespace' => 'Educator', 'prefix' => 'educator', 'middleware' => 'auth'], function() {
    Route::get('/account/{id?}', 'EducatorController@show_account')->name('account');
    Route::post('/account/{id?}', 'EducatorController@edit_account')->name('account');

    Route::get('/report-card/{group?}',  'ReportCardController@groups')->name('report.card');
    Route::post('/report-card/{group?}',  'ReportCardController@update_data')->name('report.card');
});
