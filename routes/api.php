<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\NoticiasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Route::post('login', [UserController::class, 'login']);
//Route::post('logout', [UserController::class, 'logout']);
Route::post('login', [LoginController::class,'login']);
Route::post('logout',[LoginController::class, 'logout']);
Route::get('checarLogin', [LoginController::class, 'checarLogin']);
Route::get('listarPopulacaoEConsumo/{id}', [EstadoController::class, 'listarPopulacaoEConsumo']);
Route::get('/noticias/{country}', [NoticiasController::class, 'obterPrincipaisManchetesPorPais']);
//Route::get('/noticias/{categoria}', [NoticiasController::class, 'obterNoticiasPorCategoria']);
Route::get('getNomeUsuarioPeloUsername/{username}', [UserController::class, 'getNomeUsuarioPeloUsername']);
Route::resources([
    'user' => UserController::class,
    'estados' => EstadoController::class,
]);

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
