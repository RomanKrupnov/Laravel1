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

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin.'

    ], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/deleteNews', 'HomeController@deleteNews')->name('deleteNews');
    Route::match(['post', 'get'], '/addNews', 'HomeController@addNews')->name('addNews');
});

Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/auth', 'AuthController@index')->name('auth');
Route::get('/registration', 'RegistrationController@index')->name('registration');

Route::group([
    'prefix' => 'news',
    'as' => 'news.'
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/one/{id}', 'NewsController@indexOne')->name('one');
    Route::group([
        'as' => 'category.'
    ], function () {
        Route::get('/category', 'CategoryController@index')->name('index');
        Route::get('/categoryOne/{slug}', 'CategoryController@show')->name('show');
    });
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
