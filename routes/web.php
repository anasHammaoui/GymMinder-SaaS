<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
}) -> name("dashboard");
// ******************auth routes views*************
Route::get('/register',[AuthController::class,"showRegister"])->name('register');

Route::get('/login', [AuthController::class,"showLogin"])->name('login');

Route::get('/forgetpassword', function () {
    return view('auth.forgetPassword');
})->name('forget');

Route::get('/resetpassword', function () {
    return view('auth.resetPassword');
})->name('reset');

//  *********************** auth routes backend********************
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout') -> middleware("auth");
// verify email
 //instruct user to click link in the email
Route::get('/email/verify', [EmailVerifyController::class, "notice"])->middleware('auth')->name('verification.notice');
//verify email and get back to a dashboard 
Route::get('/email/verify/{id}/{hash}', [EmailVerifyController::class, "verify"])->middleware(['auth', 'signed'])->name('verification.verify'); 
// resend verificaiton
Route::post('/email/verification-notification', [EmailVerifyController::class, "resend"])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// reset password 
Route::get("/forgot-password",[ResetPasswordController::class, "showForgotPassword"])->middleware('guest')->name('password.request');
Route::post('/forgot-password',[ResetPasswordController::class,"sendLink"])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, "resetForm"])->middleware('guest')->name('password.reset');
Route::post('/reset-password',[ResetPasswordController::class, "resetPassword"])->middleware('guest')->name('password.update');