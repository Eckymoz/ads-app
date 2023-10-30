<?php

use App\Http\Controllers\AnnouncementsController;
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
    Route::get('/announcements/create',                [AnnouncementsController::class, 'create']) ->name('announcements.create');
    Route::get('/announcements/{announcement}/edit',   [AnnouncementsController::class, 'edit'])   ->name('announcements.edit');
    Route::get('/announcements/{announcement}',        [AnnouncementsController::class, 'show'])   ->name('announcements.show');
    Route::post('/announcements',                      [AnnouncementsController::class, 'store'])  ->name('announcements.store');
    Route::put('/announcements/{announcement}/update', [AnnouncementsController::class, 'update']) ->name('announcements.update');
});
