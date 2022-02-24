<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GeneralSettingsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/users', UserController::class);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::get('/user/search', [UserController::class, 'search'])->name('searchUser');

    Route::get('/general-settings', [GeneralSettingsController::class, 'index']);
    Route::post('/general-settings/update-basic-info', [GeneralSettingsController::class, 'updateBasicInfo']);
    Route::post('/general-settings/update-contact-and-footer', [GeneralSettingsController::class, 'updateContactAndFooter']);
    Route::post('/general-settings/update-logo', [GeneralSettingsController::class, 'updateLogo']);

    Route::get('/subscriber/list', [SubscriptionController::class, 'index']);
});

Route::get('/admin/login', [AuthController::class, 'admin_login_view']);
Route::post('/admin/do-login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/send-mail', [SubscriptionController::class, 'sendMail'])->name('sendMail');
Route::get('/subscription/confirm', [SubscriptionController::class, 'confirmSubscription']);
