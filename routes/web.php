<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Auth;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthUser;
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

Route::view('/', 'home')->name('home');
Route::view('login', 'login')->name('login')->middleware(Auth::class);

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories', 'index')->name('categories');
    Route::get('categories/{id}', 'show')->name('category');
});

Route::controller(ActivityController::class)->group(function () {
    Route::get('activities', 'index')->name('activities');
    Route::get('activities/{id}', 'show')->name('activity');
});

/* Routes du visiteur*/
Route::name('user.')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('user/login', 'login')->name('login');
        Route::post('user/signUp', 'create')->name('signUp');
        Route::middleware(AuthUser::class)->group(function () {
            Route::get('user/logout', 'logout')->name('logout');
            Route::get('user/profil', 'show')->name('profil');
        });
    });
});



/* Routes des admins */
Route::name('admin.')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::post('admin/login', 'login')->name('login');
        Route::middleware(AuthAdmin::class)->group(function () {
            Route::get('admin/logout', 'logout')->name('logout');
            Route::get('user/{id}', 'showUser')->name('showUser');
            Route::get('validateActivity/{user}/{activity}', 'validateActivity')->name('validateActivity');
            Route::get('admin/profil', 'profil')->name('profil');
            Route::post('admin/modify', 'update')->name('update');
            Route::get('addActivity', [ActivityController::class, 'create'])->name('formAddActivity');
            Route::post('addActivity', [ActivityController::class, 'store'])->name('addActivity');
            Route::post('updateActivity', [ActivityController::class, 'update'])->name('updateActivity');
            Route::get('users', [UserController::class, 'index'])->name('users');
            Route::get('scores', [ScoreController::class, 'show'])->name('scores');
            Route::post('searchUser', 'searchUser')->name('searchUser');
            Route::delete('activity/{id}', [ActivityController::class, 'destroy'])->name('activityDelete');
        });
    });
});

/* Generer les migrations lors du deploiement*/
/*Route::get('migrate', function () {
    $exitCode = Artisan::call('migrate:fresh --seed --force');
});*/

/* Optimiser l'application*/
/*Route::get('migrate', function () {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('view:cache');
});*/
