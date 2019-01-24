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

use Illuminate\Http\Request;

Auth::routes();

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

//Examination
//get
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
//post
Route::post('/examination', 'ExaminationController@store')->middleware('auth');
Route::post('/examination/{id}/examiners', function ($id, Request $request) {
    foreach ($request['examiners'] as $examiner) {
        jiri\ExaminationUser::create([
            'examination_id' => $id,
            'user_id' => $examiner['id'],
            'role' => 'examiner',
        ]);
    }

    return ['message' => 'Examiners successfully saved'];
})->middleware('auth');
Route::post('/examination/{id}/students', function ($id, Request $request) {
    foreach ($request['students'] as $student) {
        jiri\ExaminationUser::create([
            'examination_id' => $id,
            'user_id' => $student['id'],
            'role' => 'student',
        ]);
    }

    return ['message' => 'Students successfully saved'];
})->middleware('auth');
Route::post('/examination/{id}/projects', function ($id, Request $request) {
    foreach ($request['projects'] as $project) {
        jiri\Project::create([
            'name' => $project['name'],
            'examination_id' => $id,
        ])->weightings()->create([
            'weighting' => $project['weighting']
        ]);
    }

    return ['message' => 'Projects successfully saved'];
})->middleware('auth');
Route::post('/examination/{id}/weightings', function ($id, Request $request) {
    foreach ($request['weightings'] as $weighting) {
        jiri\Project::where('name', $weighting['name'])
            ->orderBy('created_at', 'desc')
            ->first()
            ->weightings()
            ->create([
                'weighting' => $weighting['weighting']
            ]);
    }

    return ['message' => 'Custom weightings successfully saved'];
})->middleware('auth');

//Mark
Route::get('/marks/currently-managed-examinations', function () {
    return \jiri\Mark::with([
        'examination:id,name',
        'project:id,name',
        'givenTo:id,name',
        'givenBy:id,name'])
        ->fromAnExaminationManagedByCurrentUser()
        ->get();
})->middleware('auth');

//User
Route::get('/user/active', function () {
    return \jiri\User::select('id', 'name', 'email')->active()->get();
})->middleware('auth');
Route::get('/user/current', function () {
    return \jiri\User::findOrFail(auth()->id(), ['id', 'name', 'email']);
})->middleware('auth');
Route::post('/user', function (Request $request) {
    return jiri\User::create([
        'name' => $request['name'],
        'email' => $request['email'],
    ]);
})->middleware('auth');
