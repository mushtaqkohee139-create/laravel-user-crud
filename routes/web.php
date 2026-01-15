<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ValidUser;
use App\Http\Controllers\UserController;

Route::view('/','login');

Route::resource('users', UserController::class)
    ->middleware(ValidUser::class);

Route::get('/userpage', function () {
    return view('userpage');
})->name('userpage')->middleware('auth');

Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/logout',[UserController::class,'logout'])->name('logout');
//Route::resource('/adduser', UserController::class);