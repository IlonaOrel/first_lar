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
    $allTasks = \App\Models\Task::all();
  //  $allTasks = \App\Models\Task::orderBy('id', 'asc')->get();// равноценно записи выше
    return view('tasks.index', ['tasks'=>$allTasks]);
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

// delete delete task
Route::delete('/tasks/{task}', function (\App\Models\Task $task){
    $task->delete();
    return redirect(route('tasks.index'));
})->name('tasks.delete');

Route::get('/tasks/{task}/edit', function (\App\Models\Task $task){
     return view('tasks.edit', ['task'=>$task]);
})->name('tasks.edit');

//Route::patch('/tasks/{task}', function (\App\Models\Task $task, Request $request ){
//    $validator = Validator::make($request->all(), [
//        'name' => 'required|max:255',
//    ]);
//
//    if ($validator->fails()) {
//        return redirect(route('tasks.create'))
//            ->withInput()
//            ->withErrors($validator);
//    }
//    $task = new \App\Models\Task();
//    $task->name = $request->name;
//    $task->save();
//    return redirect(route('tasks.index'));
//})->name('tasks.update');