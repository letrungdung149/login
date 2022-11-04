<?php

use App\Events\PostcastProcessed;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TodoListController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SendMailController;
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
//Route::get('/test',function (){
//    event(new PostcastProcessed());
//    return view('welcome');
//});
//Route::get('send-mail',[SendMailController::class,'sendMail']);

//password
Route::get('/forget-password', [ForgotPasswordController::class, 'forgetPass'])->name('customer.forgetPass');
Route::post('/forget-password', [SendMailController::class, 'sendMail']);
Route::get('/get-password/{user}/{token}', [ForgotPasswordController::class, 'getPass'])->name('customer.getPass');
Route::post('/get-password/{user}/{token}', [ForgotPasswordController::class, 'postGetPass']);


Route::prefix('backend')
    ->group(function () {
        Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/role', [RoleController::class, 'index'])->name('role.index');
        Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('/todo', [TodoListController::class, 'index'])->name('todo.index');
    });





