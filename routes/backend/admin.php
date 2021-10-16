<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FileManagerController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\AgentRequestController;


// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('property', [PropertyController::class, 'index'])->name('property.index');
Route::get('property/create', [PropertyController::class, 'create'])->name('property.create');
Route::post('property/store', [PropertyController::class, 'store'])->name('property.store');
Route::get('property/getdetails', [PropertyController::class, 'getDetails'])->name('property.getDetails');
Route::get('property/edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
Route::post('property/update', [PropertyController::class, 'update'])->name('property.update');
Route::get('property/delete/{id}', [PropertyController::class, 'destroy'])->name('property.destroy');

Route::get('property_type', [PropertyTypeController::class, 'index'])->name('property_type.index');
Route::get('property_type/create', [PropertyTypeController::class, 'create'])->name('property_type.create');
Route::post('property_type/store', [PropertyTypeController::class, 'store'])->name('property_type.store');
Route::get('property_type/getdetails', [PropertyTypeController::class, 'getDetails'])->name('property_type.getDetails');
Route::get('property_type/edit/{id}', [PropertyTypeController::class, 'edit'])->name('property_type.edit');
Route::post('property_type/update', [PropertyTypeController::class, 'update'])->name('property_type.update');
Route::get('property_type/delete/{id}', [PropertyTypeController::class, 'destroy'])->name('property_type.destroy');

Route::get('agent', [AgentRequestController::class, 'agent_index'])->name('agent.index');
Route::get('agent/create', [AgentRequestController::class, 'agent_create'])->name('agent.create');
Route::post('agent/store', [AgentRequestController::class, 'agent_store'])->name('agent.store');
Route::get('agent/getdetails', [AgentRequestController::class, 'agent_getdetails'])->name('agent.getdetails');
Route::get('agent/edit/{id}', [AgentRequestController::class, 'agent_edit'])->name('agent.edit');
Route::post('agent/update', [AgentRequestController::class, 'agent_update'])->name('agent.update');
Route::get('agent/delete/{id}', [AgentRequestController::class, 'agent_destroy'])->name('agent.destroy');

Route::get('agent_request', [AgentRequestController::class, 'index'])->name('agent_request.index');
Route::get('agent_request/getdetails', [AgentRequestController::class, 'getdetails'])->name('agent_request.getdetails');
Route::get('agent_request/edit/{id}', [AgentRequestController::class, 'edit'])->name('agent_request.edit');
Route::post('agent_request/update', [AgentRequestController::class, 'update'])->name('agent_request.update');
Route::get('agent_request/delete/{id}', [AgentRequestController::class, 'destroy'])->name('agent_request.destroy');

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

