<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberPayment;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// home page
Route::get('/', function () {
    return view('home');
})->name("home");

// unauthorized
Route::get("/unauthorized", function () {
    return view("unauthorized");
});

// dashboard
Route::middleware('auth')->group(function () {
    Route::get("/dashboard", [dashboardController::class, "index"])->name("dashboard");

    // verify email
    Route::get('/email/verify', [EmailVerifyController::class, "notice"])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerifyController::class, "verify"])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerifyController::class, "resend"])->middleware('throttle:6,1')->name('verification.send');

    // logout
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

// auth routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, "showRegister"])->name('register');
    Route::get('/login', [AuthController::class, "showLogin"])->name('login');
    Route::get("/forgot-password", [ResetPasswordController::class, "showForgotPassword"])->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, "sendLink"])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, "resetForm"])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, "resetPassword"])->name('password.update');
});

// auth backend routes
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

// members routes
Route::middleware(['auth', 'owner'])->group(function () {
    Route::get('/owner/members', [MemberController::class, "index"])->name("owner.members");
    Route::post("/owner/member/add", [MemberController::class, "store"])->name('addMember');
    Route::delete("/owner/member/delete/{id}", [MemberController::class, "destroy"])->name('deleteMember');
    Route::put("/owner/member/update/{id}", [MemberController::class, "update"])->name('updateMember');
    // mark as payed
    Route::post('/owner/members/pay/{id}',[MemberPayment::class, "pay"]) -> name("member.pay");
});