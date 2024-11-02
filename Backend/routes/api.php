<?php

use App\Http\Controllers\appointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[RegisterController::class,'register']);
//Route::post('login',[LoginController::class,'login'])->name('login');
Route::get('doctors',[DoctorController::class,'index']);
Route::get('patients',[PatientController::class,'index']);

Route::put('appointment/update/{id}',[appointmentController::class,'update']);

Route::get('user/index',[UserController::class,'index']);
Route::get('appointments/{doctor_id}',[appointmentController::class,'index']);

Route::post('appointment/store',[appointmentController::class,'store']);

// Route::middleware(['isAdmin'])->group(function(){
//     Route::delete('admin/user/delete/{id}',[UserController::class,'destroy']);

// });
