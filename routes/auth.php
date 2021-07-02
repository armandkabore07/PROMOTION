<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/membres', [RegisteredUserController::class, 'index'])
                ->middleware('auth')
                ->name('membres.index');


Route::get('/membres/{id}', [RegisteredUserController::class, 'show'])
                ->middleware('auth')
                ->name('membres.show');

Route::get('/membres/{id}/edit', [RegisteredUserController::class, 'edit'])
                ->middleware('auth')
                ->name('membres.edit');

Route::match(['put','patch'],'/membres/{id}', [RegisteredUserController::class, 'update'])
               ->middleware('auth')
               ->name('membres.update');

Route::delete('/membres/{id}', [RegisteredUserController::class, 'destroy'])
                 ->middleware('auth')
                 ->name('membres.destroy');

Route::get('/reinitialisation/{id}', [RegisteredUserController::class, 'reinitialisation'])
                 ->middleware('auth')
                 ->name('membres.reinitialisation');

Route::get('/register', [RegisteredUserController::class, 'create'])
               ->middleware('auth')
               ->name('creerMembres');

Route::post('/membres', [RegisteredUserController::class, 'store'])
                ->middleware('auth')
                ->name('membres.store');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
