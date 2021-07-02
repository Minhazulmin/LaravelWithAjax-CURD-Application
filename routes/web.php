<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/', [CustomerController::class,'index']);
Route::get('/show/data', [CustomerController::class, 'showData']);
Route::post('/store/customer', [CustomerController::class, 'storeData']);
Route::get('/edit/Customer/{id}', [CustomerController::class, 'editData']);
Route::post('/update/Customer/{id}', [CustomerController::class, 'updateData']);
Route::get('delete/Customer/{id}', [CustomerController::class, 'delete']);


