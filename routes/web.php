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
    return view('dashboard');
})->middleware('auth');

//Examination
Route::get('/all-my-examinations', function () {
    return \jiri\User::find(auth()->id())->isManaging()->get();
})->middleware('auth');
Route::get('/my-future-examinations', function () {
    return \jiri\User::find(auth()->id())->comingManagedExaminations()->get();
})->middleware('auth');
Route::get('/my-current-examinations', function () {
    return \jiri\User::find(auth()->id())->currentManagedExaminations()->get();
})->middleware('auth');
Route::get('/my-past-examinations', function () {
    return \jiri\User::find(auth()->id())->finishedManagedExaminations()->get();
})->middleware('auth');
Route::get('/marks/currentManagedExaminations', function () {
    return \jiri\Mark::with([
        'examination:id,name',
        'project:id,name',
        'givenTo:id,name',
        'givenBy:id,name'])
        ->fromAnExaminationManagedByCurrentUser()
        ->get();
})->middleware('auth');
