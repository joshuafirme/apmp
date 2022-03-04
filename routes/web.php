<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\HomePageSettingsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\GalleryController;

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

    Route::resource('/role', RoleController::class);
    Route::post('/role/update/{id}', [RoleController::class, 'update']);

    Route::get('/manage-site/general-settings', [GeneralSettingsController::class, 'index']);
    Route::post('/manage-site/general-settings/update-basic-info', [GeneralSettingsController::class, 'updateBasicInfo']);
    Route::post('/manage-site/general-settings/update-contact-and-footer', [GeneralSettingsController::class, 'updateContactAndFooter']);
    Route::post('/manage-site/general-settings/update-logo', [GeneralSettingsController::class, 'updateLogo']);

    Route::get('/manage-site/homepage-settings', [HomePageSettingsController::class, 'index']);
    Route::post('/manage-site/homepage-settings/update-cover', [HomePageSettingsController::class, 'updateCover']);

    Route::resource('/manage-site/gallery', GalleryController::class);
    Route::post('/manage-site/gallery/update/{id}', [GalleryController::class, 'update']);
    Route::post('/manage-site/gallery/fb-photos-sync', [GalleryController::class, 'getFreshFbPhotos']);
    Route::post('/update-gallery-settings', [GalleryController::class, 'updateGallerySettings']);

    Route::get('/subscriber/list', [SubscriptionController::class, 'index']);
    Route::get('/subscriber/search', [SubscriptionController::class, 'search'])->name('searchSubscriber');
    Route::post('/subscriber/send-bulk-mail', [SubscriptionController::class, 'sendBulkMail']);
    Route::get('/subscriber/export-csv', [SubscriptionController::class, 'exportCSV']);
    Route::resource('/subscriber', SubscriptionController::class);
});

Route::get('/admin/login', [AuthController::class, 'admin_login_view']);
Route::post('/admin/do-login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/send-mail', [SubscriptionController::class, 'sendMail'])->name('sendMail');
Route::get('/subscription/confirm', [SubscriptionController::class, 'confirmSubscription']);
