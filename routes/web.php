<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::resource('tasks', TaskController::class);
Route::resource('categories', CategoryController::class);
