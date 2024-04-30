<?php

use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\WelcomeController;
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



Route::get('/', WelcomeController::class)->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/timeline', TimelineController::class)->name('timeline');
    Route::post('/status/create', [StatusController::class, 'store'])->name('status.store');

    Route::get('/explore', ExploreUserController::class)->name('users.index');

    Route::prefix('/profile')->group(function () {
        Route::get('{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
        Route::post('{user}', [FollowingController::class, 'store'])->name('following.store');
        Route::get('{user}', ProfileInformationController::class)->name('profile')->withoutMiddleware('auth');
    });
});

Route::middleware('guest')->group(function () {
});

require __DIR__ . '/auth.php';
