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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group([
    'middleware' => 'api',
], function () {
    Route::get('search/{name}',[UserController::class,'search']);
    Route::apiResource('users', UserController::class);
});
Route::get('/user', [\App\Http\Controllers\Admin\UserController::class,'index'])->name('user.index');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->middleware('auth:api');





//Route::get('users', [UserController::class, 'index'])->name('users.index');
//Route::post('users', [UserController::class, 'store'])->name('users.store');
//Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
//Route::match(['put', 'patch'], 'users/{user}', [UserController::class, 'update'])->name('users.update');
//Route::get('/users/delete/{id}', [UserController::class, 'delete']);
//Route::delete('users', [UserController::class, 'destroy'])->name('users.destroy');

