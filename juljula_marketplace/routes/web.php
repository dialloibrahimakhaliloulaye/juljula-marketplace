<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChildcategoryController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\View;

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


Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');


//admin
Route::group(['prefix'=>'auth', 'middleware'=>'admin'], function (){
    Route::get('/', function () { return view('backend.admin.index');});
    Route::resource('/category', 'App\Http\Controllers\CategoryController');
    Route::resource('/subcategory', 'App\Http\Controllers\SubcategoryController');
    Route::resource('/childcategory', 'App\Http\Controllers\ChildcategoryController');

    //adminListing
    Route::get ('/all-ads', 'App\Http\Controllers\AdminListingController@index')->name('all.ads');

    //listing reported ad
    Route::get ('/reported-ads', 'App\Http\Controllers\FraudController@index')->name('reported.ads');
});

Route::get('/', 'App\Http\Controllers\FrontAdsController@index');

//ads
Route::get('/ads/create', 'App\Http\Controllers\AdvertisementController@create')->name('ads.create')->middleware('auth');
Route::post('/ads/store', 'App\Http\Controllers\AdvertisementController@store')->middleware('auth')
    ->name('ads.store');
Route::get('/ads', 'App\Http\Controllers\AdvertisementController@index')->name('ads.index')->middleware('auth');
Route::get('/ads/{id}/edit', 'App\Http\Controllers\AdvertisementController@edit')->name('ads.edit')->middleware('auth');
Route::put('/ads/{id}/update', 'App\Http\Controllers\AdvertisementController@update')->name('ads.update')->middleware('auth');
Route::delete('/ads/{id}/delete', 'App\Http\Controllers\AdvertisementController@destroy')->name('ads.destroy')->middleware('auth');
Route::get('/ad-pending', 'App\Http\Controllers\AdvertisementController@pendingAds')->name('pending.ad')->middleware('auth');


//profile
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile')->middleware('auth');
Route::post('/profile', 'App\Http\Controllers\ProfileController@updateProfile')->name('update.profile')->middleware('auth');

//user ads
Route::get('/ads/{userId}/view', 'App\Http\Controllers\FrontendController@viewUserAds')->name('show.user.ads');

//frontend
Route::get('/product/{categorySlug}/{subcategorySlug}','App\Http\Controllers\FrontendController@findBySubcategory')->name('subcategory.show');
Route::get('/product/{categorySlug}/{subcategorySlug}/{childcategorySlug}','App\Http\Controllers\FrontendController@findByChildcategory')->name('childcategory.show');
Route::get('/product/{categorySlug}','App\Http\Controllers\FrontendController@findBycategory')->name('category.show');
//Route::get('products/{id}/{slug}', 'App\Http\Controllers\FrontendController@show')->name('product.view');
Route::get('products/{id}/{slug}', 'App\Http\Controllers\FrontendController@show')->name('ads.show');

//Message
Route::post('/send/message', 'App\Http\Controllers\SendMessageController@store');
Route::get('/messages', 'App\Http\Controllers\SendMessageController@index')->name('messages')->middleware('auth');
Route::get('/users', 'App\Http\Controllers\SendMessageController@chatWithThisUser');
Route::get('/message/user/{id}', 'App\Http\Controllers\SendMessageController@showMessages');
Route::post('/start-conversation', 'App\Http\Controllers\SendMessageController@startConversation');

//login with facebook
Route::get('auth/facebook', 'App\Http\Controllers\SocialLoginController@facebookRedirect');
Route::get('auth/facebook/callback', 'App\Http\Controllers\SocialLoginController@loginWithFacebook');

//save ad
Route::post('/ad/save', 'App\Http\Controllers\SaveAdController@saveAd');
Route::get('/saved-ads', 'App\Http\Controllers\SaveAdController@getSaveAd')->name('saved.ad');
Route::post('/ad/remove', 'App\Http\Controllers\SaveAdController@removeAd')->name('remove.ad');

//report ads
Route::post('/report-this-ad', 'App\Http\Controllers\FraudController@store')->name('report.ad');
