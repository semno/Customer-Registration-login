<?php

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

//middleware use in controller
Route::get('home', 'homeController@index')->name('home');
Route::get('/', 'homeController@index')->name('home');
Route::post('/profileupload', 'homeController@upload');

/**
 * View for guest only
 *
 * @param  middleware guard type
 * @return view page if guest / or redirect Home route
 */
Route::group(['middleware' => ['guest']], function () {
	Route::get('login', 'loginController@index')->name('login');
	Route::post('login', 'loginController@store')->name('site.login');
	Route::post('register', 'registerController@store')->name('site.register');
	Route::get('verifyemail/{token?}', 'registerController@verify');
});
	Route::get('logout', 'loginController@logout')->name('site.logout');

