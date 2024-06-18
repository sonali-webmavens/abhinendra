<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactoryController;

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


Route::resource('Factory',FactoryController::class);

Route::get('/workers', function(){
return view('workers.home');
})->name('workers');


Route::get('/create',function(){
return view('workers.create');
})->name('create');

