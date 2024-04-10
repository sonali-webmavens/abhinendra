<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('operations','App\Http\Controllers\EmployeeController')->middleware('auth');

Route::fallback(function(){

    return "Sorry page not found";
});



