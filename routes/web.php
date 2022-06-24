<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest');
Route::get('/forgot-password', [UserController::class, 'passwordRequest'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [UserController::class, 'passwordEmail'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [UserController::class, 'passwordReset'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [UserController::class, 'passwordUpdate'])->middleware('guest')->name('password.update');

Route::middleware('auth')->group(function() {
	Route::get('/', function () {
	    return view('dashboard', ['title' => 'Dashboard']);
	});

	Route::get('/clients/', [ClientController::class, 'index']);
	Route::post('/clients', [ClientController::class, 'store']);
	Route::get('/clients/create', [ClientController::class, 'create']);
	Route::get('/clients/{client}', [ClientController::class, 'show']);
	Route::put('/clients/{client}', [ClientController::class, 'update']);
	Route::get('/clients/{client}/edit', [ClientController::class, 'edit']);

	
	

	Route::post('/logout', [UserController::class, 'logout']);
});