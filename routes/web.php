<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
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


Route::get('/', [DashboardController::class, 'getLogin'])->name('login');

Route::prefix('backend')
    ->group(function() {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::get('/department', [DepartmentController::class,'index'])->name('department.index');
        Route::get('/user', [UserController::class,'index'])->name('user.index');
});





