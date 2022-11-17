<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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
    return view('home');
})->name('home');

Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('categories/{name}', [CategoryController::class, ''])->name('category');
Route::get('activities', [ActivityController::class, 'index'])->name('activities');
Route::get('activities/{name}', [ActivityController::class, ''])->name('activity');

Route::get('login',  function () {
    return view('login');
})->name('login');

/* Routes du visiteur*/
Route::post('user/login', [UserController::class, 'login'])->name('user.login');
Route::post('user/signup', [UserController::class, 'create'])->name('user.signUp');
Route::get('user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('user/activities', [UserController::class, 'show'])->name('user.activities');

/* Routes des admins*/
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/modify', [AdminController::class, ''])->name('admin.modify');
Route::get('users/{id}', [AdminController::class, ''])->name('admin.finduser');

/* Generer les migrations lors du deploiement*/
Route::get('migrate', function () {
    $exitCode = Artisan::call('migrate:fresh --seed --force');
});
