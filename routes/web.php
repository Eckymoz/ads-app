<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/ads/create',                [AdsController::class, 'create'])             ->name('ads.create');
    Route::get('/ads/{ad}/edit',             [AdsController::class, 'edit'])               ->name('ads.edit');
    Route::get('/ads/{ad}',                  [AdsController::class, 'show'])               ->name('ads.show');
    Route::post('/ads',                      [AdsController::class, 'store'])              ->name('ads.store');
    Route::put('/ads/{ad}/update',           [AdsController::class, 'update'])             ->name('ads.update');
    Route::get('/ads/user/{id}',             [AdsController::class, 'userAds'])            ->name('ads.user');
    Route::post('/ads/filters',              [AdsController::class, 'adsFilter'])          ->name('ads.filters');


    Route::get('/users/{user}/edit',  [UsersController::class, 'edit'])   ->name('users.edit');
    Route::put('users/{user}/update', [UsersController::class, 'update']) ->name('users.update');
});
