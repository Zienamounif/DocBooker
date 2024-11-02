<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('login', [LoginController::class,'login'])->name('login.store');

Route::get('login', function () {
    return view('login');
})->name('login.show');



Route::post('register', [RegisterController::class,'register'])->name('register.store');

Route::get('register', function () {
    return view('register');

})->name('register.show');

 //Route::post('appointment/store',[appointmentController::class,'store'])->name('appointment.store');