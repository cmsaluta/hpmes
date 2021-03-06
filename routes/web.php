<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', 'AppController@index')->name('index');
// Route::get('login', 'AppController@login')->name('login');
// Route::get('dashboard', 'DashboardController@index')->name('dashboard');

// Route::prefix('auth')->group(function() {
// 	Route::get('init', 'AppController@init');
// 	Route::post('login_request', 'AppController@login_request');
// 	Route::get('logout_request', 'AppController@logout_request');
// });
Route::get('/', 'main\LoginController@index')->name('main.login');
Route::post('/login', 'main\AuthController@login')->name('main.auth.login');
Route::get('/logout', 'main\AuthController@logout')->name('main.auth.logout');
Route::get('/dashboard', 'main\DashboardController@index')->name('main.dashboard');

// SPA
Route::get('/physicalform', 'main\DashboardController@index');
// Route::get('/request_travel', 'main\DashboardController@index');
// Route::get('/list_requests', 'main\DashboardController@index');
// Route::get('/list_travels', 'main\DashboardController@index');
// Route::get('/list_transportation', 'main\DashboardController@index');
// Route::get('/transaction_logs', 'main\DashboardController@index');
// Route::get('/list_transportation', 'main\DashboardController@index');
// Route::get('/list_vehicle', 'main\DashboardController@index');
// Route::get('/list_drivers', 'main\DashboardController@index');
// Route::get('/list_service_provider', 'main\DashboardController@index');


// dev routes

Route::get('/data', function() {
    dd(auth()->user());
});

// Route::get('/travel/index', 'page\TravelController@index');

// // Request Travel
// Route::group(['prefix' => 'travel', 'namespace' => 'Page'], function () {
//     Route::get('/index', 'TravelController@index');
//     Route::put('/store', 'TravelController@store');
// });


