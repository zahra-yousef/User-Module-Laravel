<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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

// Admin 
Route::prefix('/users')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/create', [UsersController::class, 'create'])->name('users.create');
    Route::delete('/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});

Route::get('/users', [UsersController::class, 'index'])->name('users.index')->middleware('auth');
Route::post('/users', [UsersController::class, 'store'])->name('users.store')->middleware('auth');;
Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');