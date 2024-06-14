<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('employee','App\Http\Controllers\EmployeeController')->middleware('auth');

Route::resource('company','App\Http\Controllers\CompanyController')->middleware('auth');

Route::fallback(function(){

    return view('notfound');
});

Route::get('/workers', function(){
return view('workers.home');
})->name('workers');


Route::get('/create',function(){
return view('workers.create');
})->name('create');