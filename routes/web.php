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

$altLangs = config('app.alt_langs', []);
if (in_array(request()->segment(1), $altLangs)) {
    app()->setLocale(request()->segment(1));
    config(['app.locale_prefix' => request()->segment(1)]);
}

Route::group(['prefix' => config('app.locale_prefix')], function () {
Route::get('/home/{lang}', function ($lang) {
       app()->setLocale($lang);
       return view('home',['lang'=>$lang]);
    })->name('language');
});

Route::get('/create',function(){
return view('workers.create');
})->name('create');