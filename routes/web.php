<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;

Route::get('/',[FileController::class, 'index']);

Route::get('login', [LoginController::class, 'redirectToProvider']);
Route::get('callback', [LoginController::class, 'handleProviderCallback']);
Route::post('logout', [LoginController::class, 'logout']);


Route::resource('/file', FileController::class);

Route::get('/enviar', [FileController::class,'enviar']);
Route::get('/consulta', [FileController::class,'consulta']);

Route::post('/file/store', [FileController::class,'store']);
Route::post('/file/destroy', [FileController::class,'destroy']);



