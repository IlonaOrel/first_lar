<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});

//get all tasks
Route::get('/tasks', function (){
    return view('tasks.index');
})->name('tasks.index');

// get create form
Route::get('/tasks/create', function (){
    return view('tasks.create');
})->name('tasks.create');

//post store task
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect(route('tasks.create'))
            ->withInput()
            ->withErrors($validator);
    }
    $task = new \App\Models\Task();
    $task->name = $request->name;
    $task->save();
    return redirect(route('tasks.index'));
})->name('tasks.store');