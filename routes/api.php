<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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

//Route::get('user-add', function() {
//    return view('admin.users.create');
//});
//Route::get('user-edit', function() {
//    return view('admin.users.edit');
//});

Route::group([
    'middleware' => 'auth:api',
], function () {
    Route::apiResource('users', UserController::class)->middleware('check:user-list');
});
Route::apiResource('departments', DepartmentController::class);
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->middleware('auth:api');
