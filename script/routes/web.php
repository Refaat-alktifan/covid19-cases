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


// All installer route are here
Route::get('install', 'Installer\InstallerController@install')->name('install');
Route::get('install/check', 'Installer\InstallerController@check')->name('install.check');
Route::get('install/info', 'Installer\InstallerController@info')->name('install.info');
Route::get('install/migrate', 'Installer\InstallerController@migrate')->name('install.migrate');
Route::get('install/seed', 'Installer\InstallerController@seed')->name('install.seed');
Route::post('install/store', 'Installer\InstallerController@send');
Route::get('404', function () {
	return abort(404);
})->name(404);


// Welcome route for homepage
Route::get('/', 'WelcomeController@index')->name('welcome');

// Coronavirus reports route
Route::post('country', 'ReportController@AllCountry')->name('country.report');
Route::post('get-info-country/{id}', 'ReportController@country')->name('country.src');


// Laravel default auth
Auth::routes();



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| All Admin routes are here
|
 */
Route::group(['prefix'=>'admin','as'=>'admin.','namespace'=>'Admin','middleware'=>'auth'],function(){
	Route::resource('script','CJController');
	Route::resource('seo','SeoController');
	Route::resource('settings','SettingsController');
	Route::get('/mysettings','UserController@index')->name('admin.mysettings');
	Route::post('mysettingsup','UserController@genUpdate')->name('users.genupdate');
	Route::post('mypassup','UserController@updatePassword')->name('users.passup');
});

