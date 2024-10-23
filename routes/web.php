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

    Route::get('/tasks/create', [TaskController::class, 'create'])
    ->middleware(['auth'])
    ->name('tasks.create');

Route::post('/tasks', [TaskController::class, 'store'])
    ->middleware(['auth'])
    ->name('tasks.store');
require __DIR__.'/auth.php';
