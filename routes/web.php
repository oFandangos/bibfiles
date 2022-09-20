<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;

Route::get('/',[FileController::class, 'index']);

Route::get('login', [LoginController::class, 'redirectToProvider']);
Route::get('callback', [LoginController::class, 'handleProviderCallback']);
Route::post('logout', [LoginController::class, 'logout']);


Route::resource('/files', FileController::class);
Route::get('/excel', [FileCOntroller::class,'excel'])->name('download_planilha');

# Logs  
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('can:admin');


Route::get('/pedidos', [PedidoController::class,'index']);
Route::get('/pedidos/{file}', [PedidoController::class,'create']);
Route::post('/novopedido', [PedidoController::class,'store']);
Route::get('/pendentes', [PedidoController::class,'pendentes']);
Route::get('/pedidos_realizados', [PedidoController::class,'index']);
Route::post('/autorizar/{pedido}', [PedidoController::class,'autorizar']);


Route::get('acesso/autorizado', [PedidoController::class,'acesso_autorizado'])->name('acesso_autorizado');

Route::get('/{file_by_name}', [PedidoController::class,'file_by_name']);

# Mantendo retrocompatibilidade com antigo sistema de FTP
# Exemplo: private/A/Abdala_JB_AsComemoracoesDos500Anos.pdf
Route::get('/private/{letra}/{file_by_name}', [PedidoController::class,'retro']);

