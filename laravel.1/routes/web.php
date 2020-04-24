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
        'as' => 'admin.',
        'middleware' => ['auth', 'role']
    ], function () {

    Route::get('/user', 'UserController@index')->name('indexUser');
    Route::get('/destroy/{user}', 'UserController@destroy')->name('destroy');
    Route::get('/user/toggleAdmin/{user}', 'UserController@toggleAdmin')->name('toggleAdmin');
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/userEdit/{user}', 'UserController@edit')->name('editUser');
    Route::post('/update/{user}', 'UserController@update')->name('update');
    Route::group([
        'prefix' => 'parser'
    ], function () {
        Route::match(['post','get'],'/addResources', 'ParserController@create')->name('addResources');
        Route::get('/parser', 'ParserController@parse')->name('parser');
        Route::get('/index', 'ParserController@index')->name('resourcesIndex');
        Route::get('/destroy/{resources}', 'ParserController@destroy')->name('destroy');
        Route::get('/resourcesEdit/{resources}', 'ParserController@edit')->name('editResources');
        Route::post('/updateResources/{resources}', 'ParserController@update')->name('updateResources');
    });
    Route::group([
        'prefix' => 'news'
    ], function () {
        Route::resource('news', 'NewsController')->except('show');
    });
    Route::group([
        'prefix' => 'category'
    ], function () {
        Route::resource('category', 'CategoryController')->except('show');
    });
});
Route::get('/auth/vk', 'LoginController@loginVK')->name('vkLogin');
Route::get('/auth/vk/response', 'LoginController@responseVK')->name('vkResponse');
Route::get('/auth/git', 'LoginController@loginGit')->name('gitLogin');
Route::get('/auth/git/response', 'LoginController@responseGit')->name('gitResponse');
Route::match(['get', 'post'], '/profile', 'ProfileController@update')->name('updateProfile');
Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/auth', 'AuthController@index')->name('auth');
Route::get('/registration', 'RegistrationController@index')->name('registration');

Route::group([
    'prefix' => 'news',
    'as' => 'news.'
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/one/{news}', 'NewsController@show')->name('show');
    Route::group([
        'as' => 'category.'
    ], function () {
        Route::get('/category', 'CategoryController@index')->name('index');
        Route::get('/categoryOne/{slug}', 'CategoryController@show')->name('show');
    });
});


Auth::routes();
