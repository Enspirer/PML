<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FileManagerController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\AdvertisementController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/getdetails', [CategoryController::class, 'getdetails'])->name('category.getdetails');
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('post', [PostController::class, 'index'])->name('post.index');
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/store', [PostController::class, 'store'])->name('post.store');
Route::get('post/getdetails', [PostController::class, 'getdetails'])->name('post.getdetails');
Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('post/update', [PostController::class, 'update'])->name('post.update');
Route::get('post/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('sidebar_ad', [AdvertisementController::class, 'index'])->name('sidebar_ad.index');
Route::post('sidebar_ad/store', [AdvertisementController::class, 'store'])->name('sidebar_ad.store');
Route::post('sidebar_ad/update1', [AdvertisementController::class, 'update1'])->name('sidebar_ad.update1');
Route::post('sidebar_ad/update2', [AdvertisementController::class, 'update2'])->name('sidebar_ad.update2');


Route::get('file_manager', [FileManagerController::class, 'index'])->name('file_manager.index');
Route::get('file_manager/getdetails', [FileManagerController::class, 'getdetails'])->name('file_manager.getdetails');
Route::get('file_manager/delete/{id}', [FileManagerController::class, 'destroy'])->name('file_manager.destroy');

Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
Route::post('settings/update', [SettingsController::class, 'settings_update'])->name('settings_update');

Route::get('about_us', [SettingsController::class, 'about_us'])->name('about_us');
Route::post('about_us/update', [SettingsController::class, 'about_us_update'])->name('about_us_update');

Route::get('privacy_policy', [SettingsController::class, 'privacy_policy'])->name('privacy_policy');
Route::post('privacy_policy/update', [SettingsController::class, 'privacy_policy_update'])->name('privacy_policy_update');

Route::get('terms_and_conditions', [SettingsController::class, 'terms_and_conditions'])->name('terms_and_conditions');
Route::post('terms_and_conditions_update/update', [SettingsController::class, 'terms_and_conditions_update'])->name('terms_and_conditions_update');

Route::get('contactus_thanks', [SettingsController::class, 'contactus_thanks'])->name('contactus_thanks');
Route::post('contactus_thanks_update/update', [SettingsController::class, 'contactus_thanks_update'])->name('contactus_thanks_update');


