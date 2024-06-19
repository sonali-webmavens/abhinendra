<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\SeederFactoryController;
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

Route::get('/fakefactory',[SeederFactoryController::class,'factory'])->name('factory');

Route::get('/fakeseeder',[SeederFactoryController::class,'seeder'])->name('seeder');

Route::get('/sendmail',[SeederFactoryController::class,'sendmail'])->name('sendmail');