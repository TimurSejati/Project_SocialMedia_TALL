<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\TimelineController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('timeline');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('timeline', TimelineController::class)->name('timeline');
    Route::get('status/{hash}/edit', \App\Http\Livewire\Status\Edit::class)->name('status.edit');
    Route::get('status/{hash}/delete', \App\Http\Livewire\Status\Delete::class)->name('status.delete');
});

Route::get('settings', \App\Http\Livewire\Account\Edit::class)->middleware('auth')->name('settings');
Route::get('user/{identifier}', \App\Http\Livewire\Account\Show::class)->name('account.show');

Route::get('user/{identifier}/{follow}', \App\Http\Controllers\FollowingController::class)->name('account.following');

Route::get('status/{hash}', \App\Http\Livewire\Status\Show::class)->name('status.show');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

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

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
