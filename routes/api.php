<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->group(function () {
Route::get('all-todo',[TodoController::class,'allTodo']);
Route::get('todo/{id}',[TodoController::class,'singleTodo']);
Route::post('create-todo',[TodoController::class,'createTodo']);
Route::put('update-todo/{id}',[TodoController::class,'updateTodo']);
Route::delete('delete-todo/{id}',[TodoController::class,'deleteTodo']);
});

Route::post('login',[AuthController::class,'login']);
