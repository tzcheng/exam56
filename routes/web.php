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
//    return view('welcome');
    $data = ['name' => 'tzcheng', 'say' => '嗨！'];
    return view('welcome', $data);

});

Auth::routes();
Route::pattern('exam', '[0-9]+');


Route::get('/', 'ExamController@index')->name('index');
Route::get('/home', 'ExamController@index')->name('home');

Route::get('/exam', 'ExamController@index')->name('exam.index');
Route::get('/exam/create', 'ExamController@create')->name('exam.create');
Route::get('/exam/{exam}', 'ExamController@show')->name('exam.show');

Route::post('/exam', 'ExamController@store')->name('exam.store');

