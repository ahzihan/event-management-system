<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\TokenVerificationMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//Web API Routes
Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/user-login', [UserController::class, 'UserLogin']);
Route::post('/send-otp', [UserController::class, 'SendOTPCode']);
Route::post('/verify-otp', [UserController::class, 'VerifyOTP']);
Route::post('/reset-password', [UserController::class, 'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);



//After Authentication
Route::get('/user-details', [UserController::class, 'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update', [UserController::class, 'UserUpdate'])->middleware([TokenVerificationMiddleware::class]);


//User Logout
Route::get('/userLogout', [UserController::class, 'UserLogout']);

// Page Routes
Route::get('/userLogin', [UserController::class, 'LoginPage']);
Route::get('/userRegistration', [UserController::class, 'RegistrationPage']);
Route::get('/sendOtp', [UserController::class, 'SendOtpPage']);
Route::get('/verifyOtp', [UserController::class, 'VerifyOTPPage']);
Route::get('/resetPassword', [UserController::class, 'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userProfile', [UserController::class, 'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/eventPage', [EventController::class, 'EventPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/messagePage', [EventController::class, 'MessagePage'])->middleware([TokenVerificationMiddleware::class]);

//Event Api
Route::get('/list-event', [EventController::class, 'EventList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/create-event', [EventController::class, 'EventCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/edit-event", [EventController::class, 'EventByID'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/update-event', [EventController::class, 'EventUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/delete-event', [EventController::class, 'EventDelete'])->middleware([TokenVerificationMiddleware::class]);


//After Authentication
Route::get('/dashboard', [DashboardController::class, 'DashboardPage'])->middleware([TokenVerificationMiddleware::class]);

