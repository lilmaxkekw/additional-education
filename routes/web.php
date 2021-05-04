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

// Маршруты незарегистрированного пользователя
Route::get('/', 'MainController@index')->name('home');
Route::get('/course/{id}', 'MainController@showCourse')->name('course.show');
Route::get('/enrollment', 'MainController@enrollmentCourse')->name('user.enrollment');

// Маршруты авторизации и регистрации
Auth::routes([
    'verify' => true
]);

// Маршруты админки
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'role']], function(){

    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::resource('/courses', 'CourseController')->except('create');
    Route::resource('/categories', 'CategoryController')->except(['show', 'create', 'edit']);
    Route::resource('/applications', 'ApplicationController')->except(['show', 'create', 'edit']);
    Route::resource('/groups', 'GroupController')->except(['create', 'edit']);
    Route::resource('/users', 'UserController')->except('create');
    Route::resource('/sendmail', 'SendMailController')->except('create');
    Route::resource('/sections', 'SectionController');

});

// Маршруты зарегистрированного пользователя
Route::group(['namespace' => 'User', 'prefix' => 'user', 'middleware' => ['auth']], function(){

    Route::get('/', 'UserController@index')->name('user.index');

});

// Маршруты преподавателя
Route::group(['namespace' => 'Educator', 'prefix' => 'educator', 'middleware' => ['auth']], function(){

    Route::get('/account', 'EducatorController@show_account')->name('account');
    Route::post('/account/{id?}', 'EducatorController@edit_account')->name('account');
    Route::get('/report-card/{group?}', 'ReportCardController@groups')->name('report.card');
    Route::post('/report-card/{group?}', 'ReportCardController@update_data')->name('report.card');

});
