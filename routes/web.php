<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentRegController;
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
Route::get('/s', function(){
    return view('sidebar');
}
   
);

