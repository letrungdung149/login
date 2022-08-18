<?php

use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('backend')
    ->middleware(['auth'])
    ->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');

    });
Route::get('/login', [DashboardController::class, 'getLogin'])->name('login');
Route::post('/login', [DashboardController::class, 'postLogin']);
Route::get('/logout', [DashboardController::class, 'getLogout'])->name('getLogout');;


