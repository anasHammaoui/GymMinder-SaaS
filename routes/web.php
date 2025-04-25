<?php

use App\Http\Controllers\admin\AdminOwnersController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\EmailVerifyController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\owner\AttendanceController;
use App\Http\Controllers\owner\MemberController;
use App\Http\Controllers\owner\MemberPayment;
use App\Http\Controllers\payment\PlatformPaymentController;
use App\Http\Controllers\ProfileController;
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
    // search members
    Route::get('/owner/members/search', [MemberController::class, "search"])->name('searchMembers');
});
// Attendance Routes
Route::middleware(["auth","owner"]) -> group(function (){
    Route::get("/owner/attendance",[AttendanceController::class,"index"])-> name("attendance");
    Route::post("/owner/attendance/{id}",[AttendanceController::class,"markAttendance"])-> name("markAttendance");
    Route::get("owner/attendance/{id}",[AttendanceController::class, 'attendanceCalendar']) -> name("showAttendace");
});
// owner profile routes
Route::resource('profile', ProfileController::class)->middleware('auth')->names('profile');
// *********************owner payment
Route::get('/owner/subscriptions', [PlatformPaymentController::class, 'index'])-> middleware(['auth', 'owner'])->name("subscriptions");
Route::post('/checkout', [PlatformPaymentController::class, 'checkout'])->name('payment.checkout');
Route::get('/success',[PlatformPaymentController::class, "success"])->name('payment.success');
Route::get('/cancel',[PlatformPaymentController::class, "cancel"])->name('payment.cancel');
        
// website admin
Route::middleware(["auth","admin"])-> group(function (){
Route::get("admin/owners",[AdminOwnersController::class,"index"]) -> name("admin.owners");
Route::put("admin/owners/{id}",[AdminOwnersController::class,"ownerStatus"]) -> name("admin.status");
Route::get("admin/owners/search", [AdminOwnersController::class, "search"])->name('searchOwners');
});