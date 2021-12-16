<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AizUploadController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ForSaleController;
use App\Http\Controllers\Frontend\NewDevelopmentController;
use App\Http\Controllers\Frontend\LandsController;
use App\Http\Controllers\Frontend\AgentsController;


use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact-us', [ContactController::class, 'index'])->name('contact_us');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::post('/aiz-uploader', [AizUploadController::class, 'show_uploader']);
Route::post('/aiz-uploader/upload', [AizUploadController::class, 'upload']);
Route::get('/aiz-uploader/get_uploaded_files', [AizUploadController::class, 'get_uploaded_files']);
Route::post('/aiz-uploader/get_file_by_ids', [AizUploadController::class, 'get_preview_files']);
Route::get('/aiz-uploader/download/{id}', [AizUploadController::class, 'attachment_download'])->name('download_attachment');
Route::get('uploads/all/{file_name}',[AizUploadController::class,'get_image_content']);



Route::get('lands', [LandsController::class, 'index'])->name('lands');
Route::get('lands/single-property', [LandsController::class, 'singleProperty'])->name('lands_single');
Route::get('new-development', [NewDevelopmentController::class, 'index'])->name('new_development');

Route::get('agents', [AgentsController::class, 'index'])->name('agents');

// Route::get('for-sale', [ForSaleController::class, 'index'])->name('for_sale');

Route::get('search_result_filter/{key_name}/{min_price}/{max_price}/{transaction_type}/{property_type}/{listed_since}/{building_type}/{beds}/{baths}/{land_size}/{open_house}/{zoning_type}/{units}/{building_size}/{farm_type}/{parking_type}/{city}',[ForSaleController::class,'for_sale'])->name('for_sale');

Route::get('for-sale/single-property/{id}', [ForSaleController::class, 'singleProperty'])->name('for_sale_single');
Route::post('contact_agent', [ForSaleController::class, 'contact_agent'])->name('contact_agent');
Route::post('prop_favourite',[ForSaleController::class,'propertyFavourite'])->name('propertyFavourite');
Route::post('prop_favourite/unsave/{id}',[ForSaleController::class,'propertyFavouriteDelete'])->name('propertyFavouriteDelete');

Route::post('property-search', [ForSaleController::class, 'search'])->name('property.search');




/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('accounts-dashboard', [DashboardController::class, 'account_dashboard'])->name('account_dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');



        Route::get('favourites', [DashboardController::class, 'favourites'])->name('favourites');
        Route::get('favourites/delete/{id}', [DashboardController::class, 'favouritesDelete'])->name('favourites-delete');

        Route::get('my-bookings', [DashboardController::class, 'myBookings'])->name('my-bookings');

        
    });
});




