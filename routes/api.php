<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::resources([
    'user' => UserController::class
]);

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/