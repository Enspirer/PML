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
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\SearchController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\PropertyHistoryController;
use App\Http\Controllers\Backend\FreeListningController;
use App\Http\Controllers\Backend\HomeFeaturedController;
use App\Http\Controllers\Backend\SubscribedEmailsController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\PropertyNewsController;
use App\Http\Controllers\Backend\HelpCategoryController;
use App\Http\Controllers\Backend\HelpSupportsController;


// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('country', [CountryController::class, 'index'])->name('country.index');
Route::get('country/create', [CountryController::class, 'create'])->name('country.create');
Route::post('country/store', [CountryController::class, 'store'])->name('country.store');
Route::get('country/getdetails', [CountryController::class, 'getdetails'])->name('country.getdetails');
Route::get('country/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
Route::post('country/update', [CountryController::class, 'update'])->name('country.update');
Route::get('country/delete/{id}', [CountryController::class, 'destroy'])->name('country.destroy');

Route::get('property', [PropertyController::class, 'index'])->name('property.index');
Route::get('property_nearby/{property_id}', [PropertyController::class, 'property_nearby_index'])->name('property.property_nearby_index');
Route::post('property_nearby_generate', [PropertyController::class, 'property_nearby_generate'])->name('property.property_nearby_generate');

Route::get('property/create', [PropertyController::class, 'create'])->name('property.create');
Route::post('property/store', [PropertyController::class, 'store'])->name('property.store');
Route::get('property/getdetails', [PropertyController::class, 'getDetails'])->name('property.getDetails');
Route::get('property/edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
Route::post('property/update', [PropertyController::class, 'update'])->name('property.update');
Route::get('property/delete/{id}', [PropertyController::class, 'destroy'])->name('property.destroy');
Route::get('findLocWithCountryID/{id}', [PropertyController::class, 'findLocWithCountryID'])->name('findLocWithCountryID');

Route::get('free_listning', [FreeListningController::class, 'index'])->name('free_listning.index');
Route::get('free_listning/getdetails', [FreeListningController::class, 'getDetails'])->name('free_listning.getDetails');
Route::get('free_listning/edit/{id}', [FreeListningController::class, 'edit'])->name('free_listning.edit');
Route::post('free_listning/update', [FreeListningController::class, 'update'])->name('free_listning.update');
Route::get('free_listning/delete/{id}', [FreeListningController::class, 'destroy'])->name('free_listning.destroy');

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

Route::get('property_news', [PropertyNewsController::class, 'index'])->name('property_news.index');
Route::get('property_news/create', [PropertyNewsController::class, 'create'])->name('property_news.create');
Route::post('property_news/store', [PropertyNewsController::class, 'store'])->name('property_news.store');
Route::get('property_news/getdetails', [PropertyNewsController::class, 'getdetails'])->name('property_news.getdetails');
Route::get('property_news/edit/{id}', [PropertyNewsController::class, 'edit'])->name('property_news.edit');
Route::post('property_news/update', [PropertyNewsController::class, 'update'])->name('property_news.update');
Route::get('property_news/delete/{id}', [PropertyNewsController::class, 'destroy'])->name('property_news.destroy');

Route::get('sidebar_ad', [AdvertisementController::class, 'index'])->name('sidebar_ad.index');
Route::post('sidebar_ad/update1', [AdvertisementController::class, 'update1'])->name('sidebar_ad.update1');
Route::post('sidebar_ad/update2', [AdvertisementController::class, 'update2'])->name('sidebar_ad.update2');

Route::get('property_page_ad', [AdvertisementController::class, 'property_index'])->name('property_page_ad.index');
Route::post('property_page_ad/update1', [AdvertisementController::class, 'property_update1'])->name('property_page_ad.update1');
Route::post('property_page_ad/update2', [AdvertisementController::class, 'property_update2'])->name('property_page_ad.update2');
Route::post('property_page_ad/update3', [AdvertisementController::class, 'property_update3'])->name('property_page_ad.update3');

Route::get('agents_page_ad', [AdvertisementController::class, 'agents_index'])->name('agents_page_ad.index');
Route::post('agents_page_ad/update1', [AdvertisementController::class, 'agents_update1'])->name('agents_page_ad.update1');
Route::post('agents_page_ad/update2', [AdvertisementController::class, 'agents_update2'])->name('agents_page_ad.update2');
Route::post('agents_page_ad/update3', [AdvertisementController::class, 'agents_update3'])->name('agents_page_ad.update3');

Route::get('solo_property_ad', [AdvertisementController::class, 'solo_property_index'])->name('solo_property_ad.index');
Route::post('solo_property_ad/update1', [AdvertisementController::class, 'solo_property_update1'])->name('solo_property_ad.update1');
Route::post('solo_property_ad/update2', [AdvertisementController::class, 'solo_property_update2'])->name('solo_property_ad.update2');

Route::get('solo_agent_ad', [AdvertisementController::class, 'solo_agent_index'])->name('solo_agent_ad.index');
Route::post('solo_agent_ad/update1', [AdvertisementController::class, 'solo_agent_update1'])->name('solo_agent_ad.update1');
Route::post('solo_agent_ad/update2', [AdvertisementController::class, 'solo_agent_update2'])->name('solo_agent_ad.update2');

Route::get('homeloan_ad', [AdvertisementController::class, 'homeloan_ad_index'])->name('homeloan_ad.index');
Route::post('homeloan_ad/update1', [AdvertisementController::class, 'homeloan_ad_update1'])->name('homeloan_ad.update1');
Route::post('homeloan_ad/update2', [AdvertisementController::class, 'homeloan_ad_update2'])->name('homeloan_ad.update2');


Route::get('file_manager', [FileManagerController::class, 'index'])->name('file_manager.index');
Route::get('file_manager/getdetails', [FileManagerController::class, 'getdetails'])->name('file_manager.getdetails');
Route::get('file_manager/delete/{id}', [FileManagerController::class, 'destroy'])->name('file_manager.destroy');

Route::get('contact_us', [ContactUsController::class, 'index'])->name('contact_us.index');
Route::get('contact_us/getdetails', [ContactUsController::class, 'getDetails'])->name('contact_us.getDetails');
Route::get('contact_us/edit/{id}', [ContactUsController::class, 'edit'])->name('contact_us.edit');
Route::post('contact_us/update', [ContactUsController::class, 'update'])->name('contact_us.update');
Route::get('contact_us/delete/{id}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy');

Route::get('search', [SearchController::class, 'index'])->name('search.index');
Route::get('search/getdetails', [SearchController::class, 'getdetails'])->name('search.getdetails');
Route::get('search/show/{id}', [SearchController::class, 'show'])->name('search.show');
Route::get('search/delete/{id}', [SearchController::class, 'destroy'])->name('search.destroy');

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

Route::get('watermark', [SettingsController::class, 'watermark'])->name('watermark');
Route::post('watermark/update', [SettingsController::class, 'watermark_update'])->name('watermark_update');


Route::get('location', [LocationController::class, 'index'])->name('location.index');
Route::get('location/create', [LocationController::class, 'create'])->name('location.create');
Route::post('location/store', [LocationController::class, 'store'])->name('location.store');
Route::get('location/getdetails', [LocationController::class, 'getdetails'])->name('location.getdetails');
Route::get('location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
Route::post('location/update', [LocationController::class, 'update'])->name('location.update');
Route::get('location/delete/{id}', [LocationController::class, 'destroy'])->name('location.destroy');


Route::get('sold_properties', [PropertyHistoryController::class, 'index'])->name('sold_properties.index');
Route::get('sold_properties/getdetails', [PropertyHistoryController::class, 'getdetails'])->name('sold_properties.getdetails');
Route::get('sold_properties/edit/{id}', [PropertyHistoryController::class, 'edit'])->name('sold_properties.edit');
Route::post('sold_properties/update', [PropertyHistoryController::class, 'update'])->name('sold_properties.update');
Route::get('sold_properties/delete/{id}', [PropertyHistoryController::class, 'destroy'])->name('sold_properties.destroy');


Route::get('home_page_features/create', [HomeFeaturedController::class, 'create'])->name('home_page_features.create');
Route::post('home_page_features/store', [HomeFeaturedController::class, 'store'])->name('home_page_features.store');

Route::get('home_page_latest/create', [HomeFeaturedController::class, 'home_page_latest_create'])->name('home_page_latest.create');
Route::post('home_page_latest/store', [HomeFeaturedController::class, 'home_page_latest_store'])->name('home_page_latest.store');

Route::get('subscribed_emails', [SubscribedEmailsController::class, 'index'])->name('subscribed_emails.index');
Route::get('subscribed_emails/getdetails', [SubscribedEmailsController::class, 'getdetails'])->name('subscribed_emails.getdetails');
Route::get('subscribed_emails/delete/{id}', [SubscribedEmailsController::class, 'destroy'])->name('subscribed_emails.destroy');

Route::get('pro_tal_settings', [PostController::class, 'pro_tal_settings'])->name('pro_tal_settings');
Route::post('pro_tal_settings/store', [PostController::class, 'pro_tal_settings_store'])->name('pro_tal_settings.store');


Route::get('tips_for_buyers', [PagesController::class, 'tips_for_buyers'])->name('tips_for_buyers');
Route::post('tips_for_buyers/update', [PagesController::class, 'tips_for_buyers_update'])->name('tips_for_buyers_update');

Route::get('tips_for_sellers', [PagesController::class, 'tips_for_sellers'])->name('tips_for_sellers');
Route::post('tips_for_sellers/update', [PagesController::class, 'tips_for_sellers_update'])->name('tips_for_sellers_update');

Route::get('commercial_resources', [PagesController::class, 'commercial_resources'])->name('commercial_resources');
Route::post('commercial_resources/update', [PagesController::class, 'commercial_resources_update'])->name('commercial_resources_update');

Route::get('marketing_services', [PagesController::class, 'marketing_services'])->name('marketing_services');
Route::post('marketing_services/update', [PagesController::class, 'marketing_services_update'])->name('marketing_services_update');


Route::get('help_category', [HelpCategoryController::class, 'index'])->name('help_category.index');
Route::post('help_category/store', [HelpCategoryController::class, 'store'])->name('help_category.store');
Route::get('help_category/getdetails', [HelpCategoryController::class, 'getdetails'])->name('help_category.getdetails');
Route::get('help_category/edit/{id}', [HelpCategoryController::class, 'edit'])->name('help_category.edit');
Route::post('help_category/update', [HelpCategoryController::class, 'update'])->name('help_category.update');
Route::get('help_category/delete/{id}', [HelpCategoryController::class, 'destroy'])->name('help_category.destroy');

Route::get('help_supports', [HelpSupportsController::class, 'index'])->name('help_supports.index');
Route::get('help_supports/create', [HelpSupportsController::class, 'create'])->name('help_supports.create');
Route::post('help_supports/store', [HelpSupportsController::class, 'store'])->name('help_supports.store');
Route::get('help_supports/getdetails', [HelpSupportsController::class, 'getdetails'])->name('help_supports.getdetails');
Route::get('help_supports/edit/{id}', [HelpSupportsController::class, 'edit'])->name('help_supports.edit');
Route::post('help_supports/update', [HelpSupportsController::class, 'update'])->name('help_supports.update');
Route::get('help_supports/delete/{id}', [HelpSupportsController::class, 'destroy'])->name('help_supports.destroy');

