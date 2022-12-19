<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentRegController;
use App\Http\Controllers\ProfileControlController;
use App\Http\Controllers\creategroupcontroller;
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


Route::get('/', [StudentRegController::class, 'index']);
Route::post('/studentreg', [StudentRegController::class, 'studentreg']);
Route::post('login', [StudentRegController::class, 'login']);
Route::get('dashboard', [StudentRegController::class, 'dashboard']);
Route::get('logout', [StudentRegController::class, 'logout']);
Route::get('studante/updatedata/{id}', [ProfileControlController::class, 'dex'])->name('updatedetails');
Route::post('makeChange/{id}',[ProfileControlController::class, 'makeChange'])->name('makeChange');
Route::get('changePass/{id}',[ProfileControlController::class, 'changePass'])->name('changePass');
Route::post('changePassAction/{id}',[ProfileControlController::class, 'changePassAction'])->name('changePassAction');


