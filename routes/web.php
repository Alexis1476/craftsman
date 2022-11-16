<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
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

Route::get('activities', [ActivityController::class, 'index'])->name('activities');
Route::get('login', function () {
    return view('login');
})->name('login');

/* Routes du visiteur*/
Route::post('login', [VisitorController::class, 'login'])->name('login');
Route::post('signUp', [VisitorController::class, 'create'])->name('signUp');
Route::post('logout', [VisitorController::class, 'logout'])->name('logout');

Route::get('activities/{id}', [VisitorController::class, 'show'])->name('visitor.activities');

/*Routes des admins*/
Route::post('admin/login', [UserController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [UserController::class, 'logout'])->name('admin.logout');

/*Generer les migrations lors du deploiement*/
Route::get('migrate', function () {
    $exitCode = Artisan::call('migrate:fresh --seed --force');
});
