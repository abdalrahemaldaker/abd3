<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\YearController as AdminYearController;
use App\Http\Controllers\StageController;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin', [AdminController::class, 'dashboard']);
// Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);



Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::resource('admin/users',UserController::class);


    Route::group(['as' => 'admin.' , 'prefix' => 'admin' , 'middleware' => 'auth'] ,function(){

        Route::get('/', [AdminController::class, 'dashboard']);
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
        Route::resource('users',UserController::class)->except('show');
        Route::resource('years',AdminYearController::class)->except('show');
        Route::resource('stages', StageController::class);

    });
    // Route::resource('stages', StageController::class);
    });

