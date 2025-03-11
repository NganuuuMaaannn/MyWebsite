<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::controller(ItemController::class)->group(function () {
    Route::get('/items', 'index');
    Route::post('/store', 'store');
    Route::post('/update/{id}', 'update');
    Route::post('/delete/{id}', 'destroy');
});
