<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Task Routes
Route::get('demos/tasks', [DemoController::class, 'showTasks'])->name('tasks.show');
Route::patch('demos/tasks/{id}', [DemoController::class, 'updateTasksStatus']);
Route::put('demos/tasks/updateAll', [DemoController::class, 'updateTasksOrder']);
