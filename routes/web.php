<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']);
Route::get('/tasks', function () {
    return redirect()->route('tasks.index');
});
//Route::get('/activities', [TaskController::class, 'index'])->name('tasks.activities');

Route::resource('tasks', TaskController::class);