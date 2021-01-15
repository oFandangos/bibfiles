<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;

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

Route::get('/',[FileController::class, 'index']);

Route::resource('/file', FileController::class);

Route::get('/enviar', [FileController::class,'enviar']);
Route::get('/consulta', [FileController::class,'consulta']);

Route::post('/file/store', [FileController::class,'store']);
Route::post('/file/destroy', [FileController::class,'destroy']);

