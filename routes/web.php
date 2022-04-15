<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\HomePageSettingsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SliderBannerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ManagePageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DownloadsController;
use App\Http\Controllers\ContactUsController;

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

Route::get('/', [LandingPageController::class, 'index']);

Route::get('/download-file/{file_name}', [DownloadsController::class, 'downloadFile']);
Route::get('/download', [DownloadsController::class, 'downloads_view']);

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
    Route::post('/manage-site/homepage-settings/update-header', [HomePageSettingsController::class, 'updateHeader']);

    Route::get('/manage-page/about', [ManagePageController::class, 'about_view']);
    Route::post('/manage-page/update-about', [ManagePageController::class, 'updateAboutContent']);

    Route::get('/manage-page/privacy-policy', [ManagePageController::class, 'privacy_policy_view']);
    Route::post('/manage-page/update-privacy-policy', [ManagePageController::class, 'updatePrivacyPolicy']);


    Route::resource('/manage-site/gallery', GalleryController::class);
    Route::post('/manage-site/gallery/update/{id}', [GalleryController::class, 'update']);
    Route::post('/manage-site/gallery/fb-photos-sync', [GalleryController::class, 'getFreshFbPhotos']);
    Route::post('/update-gallery-settings', [GalleryController::class, 'updateGallerySettings']);

    Route::get('/subscriber/list', [SubscriptionController::class, 'index']);
    Route::get('/subscriber/search', [SubscriptionController::class, 'search'])->name('searchSubscriber');
    Route::post('/subscriber/send-bulk-mail', [SubscriptionController::class, 'sendBulkMail']);
    Route::get('/subscriber/export-csv', [SubscriptionController::class, 'exportCSV']);
    Route::resource('/subscriber', SubscriptionController::class);

    Route::resource('/slider-banner', SliderBannerController::class);
    Route::post('/slider-banner/update/{id}', [SliderBannerController::class, 'update']);

    Route::resource('/slider', SliderController::class);

    Route::post('/post/update/{id}', [PostController::class, 'update']);
    Route::get('/post/advocacies', [PostController::class, 'advocacies_view']);
    Route::get('/post/events', [PostController::class, 'events_view']);
    Route::get('/post/projects', [PostController::class, 'projects_view']);
    Route::get('/post/news', [PostController::class, 'news_view']);
    Route::resource('/post', PostController::class);

    Route::post('/blog/update/{id}', [BlogController::class, 'update']);
    Route::resource('/manage-site/blog', BlogController::class);

    Route::post('/downloads/update/{id}', [DownloadsController::class, 'update']);
    Route::resource('/manage-site/downloads', DownloadsController::class);
});



Route::get('/blog', [BlogController::class, 'blog_view']);
Route::get('/blog/read/{id}', [BlogController::class, 'read']);

Route::get('/privacy-policy', [ManagePageController::class, 'privacy_policy_page_view']);

Route::get('/gallery', [GalleryController::class, 'gallery_view']);

Route::get('/admin/login', [AuthController::class, 'admin_login_view']);
Route::post('/admin/do-login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/send-mail', [SubscriptionController::class, 'sendMail'])->name('sendMail');
Route::get('/subscription/confirm', [SubscriptionController::class, 'confirmSubscription']);

Route::post('/contact-us-send', [ContactUsController::class, 'sendMail']);
