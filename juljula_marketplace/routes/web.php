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
Route::get('/ads/create', 'App\Http\Controllers\AdvertisementController@create');
Route::post('/ads/store', 'App\Http\Controllers\AdvertisementController@store')->middleware('auth')
    ->name('ads.store');
