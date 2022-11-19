<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ScoreController;
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
//Route::get('categories/{name}', [CategoryController::class, ''])->name('category');
Route::get('activities', [ActivityController::class, 'index'])->name('activities');
//Route::get('activities/{name}', [ActivityController::class, ''])->name('activity');

Route::get('login', function () {
    return view('login');
})->name('login');

/* Routes du visiteur*/
Route::name('user.')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('user/login', 'login')->name('login');
        Route::post('user/signUp', 'create')->name('signUp');
        Route::middleware(['App\Http\Middleware\AuthUser'])->group(function () {
            Route::get('user/logout', 'logout')->name('logout');
            Route::get('user/activities', 'show')->name('activities');
        });
    });
});

/* Routes des admins */
Route::name('admin.')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::post('admin/login', 'login')->name('login');
        Route::middleware(['App\Http\Middleware\AuthAdmin'])->group(function () {
            Route::get('admin/logout', 'logout')->name('logout');
            Route::get('user/{id}', 'showUser')->name('showUser');
            Route::get('validateActivity/{user}/{activity}', 'validateActivity')->name('validateActivity');
            //Route::get('admin/modify', '')->name('admin.modify');
            Route::get('scores', [ScoreController::class, 'show'])->name('scores');
        });
    });
});

/* Generer les migrations lors du deploiement*/
Route::get('migrate', function () {
    $exitCode = Artisan::call('migrate:fresh --seed --force');
});
