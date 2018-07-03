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

Route::get('/home', 'HomeController@index')->name('home');
// 到 homecontroller 執行index  home代表別名

Route::get('/exam/create', function () {
    return view('exam.create');
})->name('exam.create');
