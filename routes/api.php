<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TodoListController;
use App\Http\Controllers\Api\UserController;
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

//Route::get('user-add', function() {
//    return view('admin.users.create');
//});
//Route::get('user-edit', function() {
//    return view('admin.users.edit');
//});

Route::group([
    'middleware' => 'auth:api',
], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('departments', DepartmentController::class);
    Route::apiResource('permissions', PermissionController::class);
    Route::apiResource('/todo-list',TodoListController::class);
    Route::apiResource('roles', RoleController::class);
    Route::get('/todo-list-check/{todo}',[TodoListController::class,'markTodoCompleted']);
    Route::post('/todo-list-filter',[TodoListController::class,'filter']);
    Route::post('/todo-list-change',[TodoListController::class,'change']);
});
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->middleware('auth:api');

