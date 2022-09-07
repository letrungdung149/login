<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

//Route::get('add-user', function() {
//    return view('admin.users.create');
//});



Route::prefix('backend')
    ->group(function() {
//        Route::get('/dashboard', [DashboardController::class,'home']);
//        Route::get('/user', [UserController::class,'index']);
//        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
    });
Route::get('/', [DashboardController::class, 'getLogin'])->name('login');
//Route::post('/login', [DashboardController::class, 'postLogin']);
//Route::get('/logout', [DashboardController::class, 'getLogout'])->name('getLogout');;


