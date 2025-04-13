<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// Item Controller Routes
Route::controller(ItemController::class)->group(function () {
    Route::get('/items', 'index');
    Route::post('/store', 'store');
    Route::post('/update/{id}', 'update');
    Route::post('/delete/{id}', 'destroy');
});

Route::get('/todolist', [TodoController::class, 'index'])->name('todolist');
Route::post('/todolist', [TodoController::class, 'store'])->name('todolist.store');
Route::put('/todolist/{id}', [TodoController::class, 'update'])->name('todolist.update');
Route::delete('/todolist/{id}', [TodoController::class, 'destroy'])->name('todolist.destroy');

Route::put('/todolist/{id}/complete', [TodoController::class, 'markAsCompleted'])->name('todolist.complete');
Route::put('/todolist/{id}/undo', [TodoController::class, 'undoTask'])->name('todolist.undo');

Route::get('/completed-tasks', [TodoController::class, 'completedTasks'])->name('todolist.completed');

Route::get('/message', [MessageController::class, 'showForm'])->name('message.form');
Route::post('/message', [MessageController::class, 'store'])->name('message.store');
