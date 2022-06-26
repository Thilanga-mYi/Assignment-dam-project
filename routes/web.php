<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherSettingsController;
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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/weather_settings')->group(function () {
    Route::get('/', [WeatherSettingsController::class, 'index'])->middleware('auth');
    Route::get('/enroll', [WeatherSettingsController::class, 'enroll'])->middleware('auth');
    Route::get('/list', [WeatherSettingsController::class, 'list'])->middleware('auth');
    Route::get('/get', [WeatherSettingsController::class, 'getOne'])->middleware('auth');
    Route::get('/change_status', [WeatherSettingsController::class, 'changeStatus'])->middleware('auth');
});
