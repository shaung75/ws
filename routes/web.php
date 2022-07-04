<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\PianoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TypeController;
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
	Route::get('/', [DashboardController::class, 'index']);

	// Clients
	Route::get('/clients', [ClientController::class, 'index']);
	Route::post('/clients', [ClientController::class, 'store']);
	Route::get('/clients/create', [ClientController::class, 'create']);
	Route::get('/clients/{client}', [ClientController::class, 'show']);
	Route::put('/clients/{client}', [ClientController::class, 'update']);
	Route::get('/clients/{client}/edit', [ClientController::class, 'edit']);

	// Pianos
	Route::get('/pianos', [PianoController::class, 'index']);
	Route::post('/pianos', [PianoController::class, 'store']);
	Route::get('/pianos/assigned', [PianoController::class, 'index']);
	Route::get('/pianos/unassigned', [PianoController::class, 'index']);
	Route::put('/pianos/assign-client', [PianoController::class, 'assignClient']);
	Route::get('/pianos/create', [PianoController::class, 'create']);
	Route::get('/pianos/{piano}', [PianoController::class, 'show']);
	Route::put('/pianos/{piano}', [PianoController::class, 'update']);
	Route::get('/pianos/{piano}/edit', [PianoController::class, 'edit']);

	// Manufacturers
	Route::get('/manufacturers', [ManufacturerController::class, 'index']);
	Route::post('/manufacturers', [ManufacturerController::class, 'store']);
	Route::put('/manufacturers', [ManufacturerController::class, 'update']);
	Route::get('/manufacturers/{manufacturer}/delete', [ManufacturerController::class, 'destroy']);

	// Service Types
	Route::get('/types', [TypeController::class, 'index']);
	Route::post('/types', [TypeController::class, 'store']);
	Route::put('/types', [TypeController::class, 'update']);
	Route::get('/types/{type}/delete', [TypeController::class, 'destroy']);

	// Services
	Route::get('/services', [ServiceController::class, 'index']);
	Route::post('/services', [ServiceController::class, 'store']);
	Route::get('/services/{service}', [ServiceController::class, 'show']);
	Route::put('/services/{service}', [ServiceController::class, 'update']);
	Route::get('/services/{service}/edit', [ServiceController::class, 'edit']);
	Route::get('/services/create', [ServiceController::class, 'create']);
	Route::get('/services/create/{piano}', [ServiceController::class, 'create']);

	// Invoices
	Route::get('/invoices', [InvoiceController::class, 'index']);
	Route::get('/invoices/create', [InvoiceController::class, 'create']);
	Route::post('/invoices/add', [InvoiceController::class, 'store']);
	Route::get('/invoices/{invoice}', [InvoiceController::class, 'show']);
	Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit']);
	Route::put('/invoices/{invoice}/payment', [InvoiceController::class, 'updatePayment']);
	Route::get('/invoices/{invoice}/pdf', [InvoiceController::class, 'pdf']);
	Route::get('/invoices/{invoice}/mail', [InvoiceController::class, 'sendInvoice']);
	Route::post('/invoices/create/{client}', [InvoiceController::class, 'store']);

	// Invoice items
	Route::delete('/invoice-items/{item}', [ItemController::class, 'destroy']);
	Route::post('/invoice-items/create/{invoice}', [ItemController::class, 'store']);	

	// Settings page
	Route::get('/settings', [SettingController::class, 'show']);
	Route::put('/settings', [SettingController::class, 'update']);

	Route::get('/maps', [TestController::class, 'index']);

	Route::get('/account',[ UserController::class, 'index']);
	Route::put('/account',[ UserController::class, 'update']);
	Route::post('/logout', [UserController::class, 'logout']);
});