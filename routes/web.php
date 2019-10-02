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

Auth::routes();

//For data  insertion 
Route::get('/home', 'HomeController@index');
Route::post('/home', 'HomeController@save');

//For data reterival 
Route::get('/getTasks','HomeController@allTasks');

//For data removal 
Route::post('/deleteTask/{id}', 'HomeController@deleteTask');

//for status change
Route::post('/changeTask/{id}', 'HomeController@changeTask');
Route::post('/cancel/{id}', 'HomeController@cancel');
Route::post('/finish/{id}', 'HomeController@finish');



