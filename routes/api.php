<?php

use Illuminate\Http\Request;
use App\Http\Controllers\backend\PropertyController;
use App\Http\Controllers\Frontend\User\AgentController;
use App\Http\Controllers\Frontend\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('get_property_type_details/{id}', [PropertyController::class, 'property_type'])->name('property_type');
Route::get('findLocationWithCountryID/{id}', [AgentController::class, 'findLocationWithCountryID'])->name('findLocationWithCountryID');
Route::get('map_api/{fromLat}/{toLat}/{fromLng}/{toLng}', [HomeController::class, 'map_api'])->name('map_api');


Route::get('facebook_news', [HomeController::class, 'facebook_news'])->name('facebook_news');
Route::get('twitter_news', [HomeController::class, 'twitter_news'])->name('twitter_news');

Route::get('test-markers',[HomeController::class, 'fake_makers'])->name('fake_makers');



Route::get('test_api', [HomeController::class, 'test_api'])->name('test_api');
