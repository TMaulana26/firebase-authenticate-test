<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Verify;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Http\Controllers\SSOController;
use App\Livewire\Auth\Passwords\Confirm;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\EmailVerificationController;

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
Route::middleware('guest')->group(function () {
    Route::view('/', 'welcome')->name('home');

    Route::get('login', Login::class)
        ->name('login');

    Route::get('google/redirect', [GoogleAuthController::class, 'redirect'])
        ->name('redirect');

    Route::get('register', Register::class)
        ->name('register');

    Route::get('google/callback', [GoogleAuthController::class, 'callback'])
        ->name('callback');



});
Route::get('sso/redirect', [SSOController::class, 'redirect'])->name('sso.redirect');

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('sso/callback', [SSOController::class, 'redirectToClient'])->name('sso.callback.client');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
