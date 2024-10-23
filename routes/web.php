<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('tasks', TaskController::class)
    ->middleware(['auth'])
    ->except(['show']);

Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggleCompletion'])
    ->middleware(['auth'])
    ->name('tasks.toggle');

require __DIR__ . '/auth.php';
