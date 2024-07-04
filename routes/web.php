<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', UserController::class);
Route::resource('hotel', HotelController::class);

//edit
Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
Route::put('/hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');

//create
Route::get('hotels/create', [HotelController::class, 'create'])->name('hotels.create');
Route::post('hotels', [HotelController::class, 'store'])->name('hotels.store');