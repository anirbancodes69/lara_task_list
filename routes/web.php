<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Redirect to list of all tasks: START
Route::get('/', function () {
    return redirect()->route('tasks.index');
});
// END


// List of all tasks: START
Route::get('/tasks', function (){
    return view('pages.index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');
// END


// Create form to add a task: START
Route::view('/tasks/create', 'pages.create')->name('tasks.create');
// END


// View one single task: START
Route::get('/tasks/{task}', function (Task $task){ 
    return view('pages.show', [
        'task' => $task
    ]);
})->name('tasks.show');
// END


// Edit form to edit a task: START
Route::get('/tasks/{task}/edit', function (Task $task){ 
    return view('pages.edit', [
        'task' => $task
    ]);
})->name('tasks.edit');
// END


// Store data of a newly added task: START
Route::post('/tasks', function(TaskRequest $request){
   $data = $request->validated();
   $task = Task::create($data);
   return redirect()->route('tasks.show', ['task'=> $task->id])->with('success','Task created successfully!');
})->name('tasks.store');
// END


// Update data of an existing task: START
Route::put('/tasks/{task}', function(TaskRequest $request, Task $task){
    $data = $request->validated();
    $task->update($data);
    return redirect()->route('tasks.show', ['task'=> $task->id])->with('success','Task updated successfully!');
 })->name('tasks.update');
// END


// Delete the task: START
Route::delete('/tasks/{task}', function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')->with('success','Task deleted successfully!');
})->name('tasks.destroy');
// END


// Toogle completed status for tasks: START
Route::put('/tasks/{task}/toogle-task', function(Task $task){
    $task->toggleCompleted();
    return redirect()->back()->with('success','Task updated successfully!');
})->name('tasks.toggle_completed');
// END

// 404 PAGE FALLBACK
Route::fallback(function () {
    return view('pages.not_found');
});