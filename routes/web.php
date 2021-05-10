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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['verify' => true]);

Route::get('create','CountrieController@index')->name('create')->middleware('verified');

Route::resource('news', 'NewsController');

Route::post('news', 'NewsController@store')->name('news.store')->middleware('verified');

Route::get('ambient','NewsAmbientController')->name('news.ambient');
Route::get('art', 'NewsArtController')->name('news.art');
Route::get('culture', 'NewsCultureController')->name('news.culture');
Route::get('economic', 'NewsEconomicController')->name('news.economic');
Route::get('education', 'NewsEducationController')->name('news.education');
Route::get('health', 'NewsHealthController')->name('news.health');
Route::get('opinion', 'NewsOpinionController')->name('news.opinion');
Route::get('politic', 'NewsPoliticController')->name('news.politic');
Route::get('science', 'NewsScienceController')->name('news.science');
Route::get('sport', 'NewsSportController')->name('news.sport');
Route::get('technology', 'NewsTechnologyController')->name('news.technology');
Route::get('world', 'NewsWorldController')->name('news.world');
Route::get('more', 'NewsMoreController')->name('news.more');

Route::post('news/{id}', 'NewsController@update')->name('news.update')->middleware('verified');
Route::get('news/{id}/show', 'NewsController@show')->name('news.show');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('verified');
Route::get('/blogger', 'BloggerController@index')->name('blogger')->middleware('verified');

Route::get('news/regions/{id}','CountrieController@getRegions');
Route::get('news/cities/{id}','CountrieController@getCities');

/*rutas para news/create*/
Route::resource('countrie','CountrieController');//ruta news clave1
Route::get('regions/{id}','CountrieController@getRegions');
Route::get('cities/{id}','CountrieController@getCities');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/blogger', 'Auth\LoginController@showBloggerLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/blogger', 'Auth\RegisterController@showBloggerRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/blogger', 'Auth\LoginController@bloggerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/blogger', 'Auth\RegisterController@createBlogger');

Route::view('/admin', 'admin');
Route::view('/blogger', 'blogger');

//Route::get('regions/{id}','CountrieController@getRegions');
//Route::get('cities/{id}','CountrieController@getCities');
//Route::get('/nexmo', 'NexmoController@show')->name('nexmo');
//Route::post('/nexmo', 'NexmoController@verify')->name('nexmo');
//Route::get('formulario', 'StorageController@index');
//Route::get('newss/create', 'StorageController@index');