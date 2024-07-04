<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', UserController::class);
Route::resource('hotels', HotelController::class);
Route::resource('kamars', KamarController::class);
Route::resource('/penilaians', PenilaianController::class);


// Route::get('/hotels/{id}/edit', 'HotelController@edit')->name('hotels.edit');
// Route::put('/hotels/{id}', 'HotelController@update')->name('hotels.update');

