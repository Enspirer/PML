<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\TestController;
use App\Http\Controllers\Frontend\TestTwoController;
use App\Http\Controllers\Frontend\PanoController;
use App\Http\Controllers\Frontend\AizUploadController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ForSaleController;
use App\Http\Controllers\Frontend\NewDevelopmentController;
use App\Http\Controllers\Frontend\LandsController;
use App\Http\Controllers\Frontend\AgentsController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\AgentController;
use App\Http\Controllers\Frontend\User\AreaManagementController;
use App\Http\Controllers\Frontend\IndividualAgentController;
use App\Http\Controllers\Frontend\PreListningController;


/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');

Route::post('home_page', [HomeController::class, 'home_page'])->name('home_page');
Route::post('country-change', [HomeController::class, 'countryChange'])->name('country_change');



Route::get('contact-us', [ContactController::class, 'index'])->name('contact_us');
Route::post('contact_us.store', [ContactController::class, 'store'])->name('contact_us.store');
// Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::post('/aiz-uploader', [AizUploadController::class, 'show_uploader']);
Route::post('/aiz-uploader/upload', [AizUploadController::class, 'upload']);
Route::get('/aiz-uploader/get_uploaded_files', [AizUploadController::class, 'get_uploaded_files']);
Route::post('/aiz-uploader/get_file_by_ids', [AizUploadController::class, 'get_preview_files']);
Route::get('/aiz-uploader/download/{id}', [AizUploadController::class, 'attachment_download'])->name('download_attachment');
Route::get('uploads/all/{file_name}',[AizUploadController::class,'get_image_content']);



Route::get('lands', [LandsController::class, 'index'])->name('lands');
Route::get('lands/single-property', [LandsController::class, 'singleProperty'])->name('lands_single');
Route::get('new-development', [NewDevelopmentController::class, 'index'])->name('new_development');
Route::get('test', [TestController::class, 'index'])->name('test');
Route::get('testtwo', [TestTwoController::class, 'index'])->name('testtwo');
Route::get('pano/{image_id}', [PanoController::class, 'index'])->name('pano');

// Route::get('agents', [AgentsController::class, 'index'])->name('agents');

// Route::get('for-sale', [ForSaleController::class, 'index'])->name('for_sale');

Route::get('search_result_filter/{key_name}/{min_price}/{max_price}/{transaction_type}/{property_type}/{listed_since}/{building_type}/{beds}/{baths}/{land_size}/{open_house}/{zoning_type}/{units}/{building_size}/{farm_type}/{parking_type}/{city}',[ForSaleController::class,'for_sale'])->name('for_sale');

Route::get('for-sale/single-property/{id}', [ForSaleController::class, 'singleProperty'])->name('for_sale_single');
Route::post('contact_agent', [ForSaleController::class, 'contact_agent'])->name('contact_agent');
Route::post('prop_favourite',[ForSaleController::class,'propertyFavourite'])->name('propertyFavourite');
Route::post('prop_favourite/unsave/{id}',[ForSaleController::class,'propertyFavouriteDelete'])->name('propertyFavouriteDelete');

Route::post('save_search',[ForSaleController::class,'save_search'])->name('save_search');
Route::post('save_search/unsave/{id}',[ForSaleController::class,'save_search_Delete'])->name('save_search_Delete');

Route::post('property-search', [ForSaleController::class, 'search'])->name('property.search');

Route::post('search_result',[HomeController::class,'get_search_result'])->name('search_result_function');

Route::get('find-agent/{country}/{area}/{agent_type}/{agent_name}', [AgentsController::class, 'index'])->name('find-agent');
Route::post('find-agent/store', [AgentsController::class, 'store'])->name('find-agent.store');
Route::get('find-agent/individual_agent/{id}', [IndividualAgentController::class, 'index'])->name('individual_agent');

Route::get('individual_post/{id}', [HomeController::class, 'individual_post'])->name('individual_post');

Route::get('pre_listing', [PreListningController::class, 'index'])->name('pre_listing');
Route::post('pre_listing/store', [PreListningController::class, 'store'])->name('pre_listing.store');

Route::post('email_alert',[ForSaleController::class,'email_alert'])->name('email_alert');

Route::get('save_keyword/{city}', [HomeController::class, 'save_keyword'])->name('save_keyword');

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
        Route::get('agent-bookings', [DashboardController::class, 'agentBookings'])->name('agent-bookings');
        Route::post('agent-bookings/respond', [DashboardController::class, 'agentBookingsRespond'])->name('agent-bookings-respond');

        Route::get('feedback', [DashboardController::class, 'feedback'])->name('feedback');
        Route::post('feedback/store', [DashboardController::class, 'feedbackStore'])->name('feedback.store');

        Route::get('agent', [AgentController::class, 'index'])->name('agent');
        Route::post('agent/store', [AgentController::class, 'store'])->name('agent.store');
        Route::post('agent/update', [AgentController::class, 'update_agent'])->name('agent.update_agent');

        Route::get('properties', [AgentController::class, 'properties'])->name('properties');
        Route::get('properties/create', [AgentController::class, 'createProperty'])->name('create-property');
        Route::post('properties/store', [AgentController::class, 'createPropertyStore'])->name('create-property.createPropertyStore');
        Route::get('properties/edit/{id}', [AgentController::class, 'editProperty'])->name('property-edit');
        Route::post('properties/edit', [AgentController::class, 'updateProperty'])->name('property-update');
        Route::get('properties/delete/{id}', [AgentController::class, 'deleteProperty'])->name('property-delete');
        Route::get('properties/sold_status/{id}', [AgentController::class, 'sold_status'])->name('sold_status');
        Route::get('properties/pending_status/{id}', [AgentController::class, 'pending_status'])->name('pending_status');


        Route::get('area-management-property-approval', [AreaManagementController::class, 'propertyApproval'])->name('area-management-property-approval');
        Route::get('area-management/get-property-approval', [AreaManagementController::class, 'getPropertyApproval'])->name('get-property-approval');
        Route::get('area-management/single-property-approval/{id}', [AreaManagementController::class, 'singlePropertyApproval'])->name('single-property-approval');
        Route::post('area-management/single-property-approval/update', [AreaManagementController::class, 'singlePropertyApproved'])->name('single-property-approved');


        Route::get('area-management-agent-approval', [AreaManagementController::class, 'agentApproval'])->name('area-management-agent-approval');
        Route::get('area-management/get-agent-approval', [AreaManagementController::class, 'getAgentApproval'])->name('get-agent-approval');
        Route::post('area-management/get-agent-approval/update', [AreaManagementController::class, 'getAgentApprovalUpdate'])->name('get-agent-approval-update');        
        Route::get('area-management/agent-approval-delete/{id}', [AreaManagementController::class, 'agentApprovalDelete'])->name('agentApprovalDelete');
        Route::get('area-management/single-agent-approval/{id}', [AreaManagementController::class, 'singleAgentApproval'])->name('single-agent-approval');
        Route::post('area-management/single-agent-approval/update', [AreaManagementController::class, 'singleAgentApprovalUpdate'])->name('singleAgentApprovalUpdate');


        Route::get('area-management-supports', [AreaManagementController::class, 'supports'])->name('supports');        
        Route::get('area-management/get-supports', [AreaManagementController::class, 'getSupports'])->name('get-supports');        
        Route::get('area-management/supports/edit/{id}', [AreaManagementController::class, 'supportsEdit'])->name('supports.edit');
        Route::post('area-management/supports/update', [AreaManagementController::class, 'supportsUpdate'])->name('supports.update');
        Route::get('area-management/supports/delete/{id}', [AreaManagementController::class, 'supportsDelete'])->name('supports.delete');

        Route::get('search_history', [DashboardController::class, 'search_history'])->name('search_history');
        Route::get('search_history_get_details', [DashboardController::class, 'search_history_get_details'])->name('search_history_get_details');
    
    
    });
});




