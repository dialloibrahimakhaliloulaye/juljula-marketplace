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

Route::get('/auth', function () {
    return view('backend.admin.index');
});

//admin
Route::group(['prefix'=>'auth'], function (){
    Route::resource('/category', 'App\Http\Controllers\CategoryController');
    Route::resource('/subcategory', 'App\Http\Controllers\SubcategoryController');
    Route::resource('/childcategory', 'App\Http\Controllers\ChildcategoryController');
});

Route::get('/', 'App\Http\Controllers\MenuController@menu');

//ads
Route::get('/ads/create', 'App\Http\Controllers\AdvertisementController@create')->name('ads.create')->middleware('auth');
Route::post('/ads/store', 'App\Http\Controllers\AdvertisementController@store')->middleware('auth')
    ->name('ads.store');
Route::get('/ads', 'App\Http\Controllers\AdvertisementController@index')->name('ads.index')->middleware('auth');
Route::get('/ads/{id}/edit', 'App\Http\Controllers\AdvertisementController@edit')->name('ads.edit')->middleware('auth');
Route::put('/ads/{id}/update', 'App\Http\Controllers\AdvertisementController@update')->name('ads.update')->middleware('auth');
Route::delete('/ads/{id}/delete', 'App\Http\Controllers\AdvertisementController@destroy')->name('ads.destroy')->middleware('auth');

//profile
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile')->middleware('auth');
Route::post('/profile', 'App\Http\Controllers\ProfileController@updateProfile')->name('update.profile')->middleware('auth');

//frontend
Route::get('/product/{categorySlug}/{subcategorySlug}','App\Http\Controllers\FrontendController@findBySubcategory')->name('subcategory.show');
Route::get('/product/{categorySlug}/{subcategorySlug}/{childcategorySlug}','App\Http\Controllers\FrontendController@findByChildcategory')->name('childcategory.show');
