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

Auth::routes();

Route::get('/', function () {
    view('dashboard');
})->middleware('auth');

//Examination
Route::get('/allMyExaminations', function () {
    return \jiri\User::find(auth()->id())->isManaging()->get();
})->middleware('auth');
