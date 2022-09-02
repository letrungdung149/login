<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResource('users', UserController::class);

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);
Route::get('search/{name}',[UserController::class,'search']);

//Route::get('users', [UserController::class, 'index'])->name('users.index');
//Route::post('users', [UserController::class, 'store'])->name('users.store');
//Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
//Route::match(['put', 'patch'], 'users/{user}', [UserController::class, 'update'])->name('users.update');
//Route::get('/users/delete/{id}', [UserController::class, 'delete']);
//Route::delete('users', [UserController::class, 'destroy'])->name('users.destroy');

