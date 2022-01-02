<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/main', [\App\Http\Controllers\FormController::class, 'store'])->middleware(['throttle:limitform']);


Route::post('/update/{id}', [\App\Http\Controllers\FormController::class, 'status']);

