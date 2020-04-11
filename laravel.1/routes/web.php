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
    Route::get('/', 'NewsController@index')->name('index'); //Отображение новостей в админке
    Route::group([
        'prefix' => 'news'
    ], function(){
        Route::get( '/edit/{news}', 'NewsController@edit')->name('edit'); //Редактирование новостей в админке
        Route::post( '/update/{news}', 'NewsController@update')->name('update');// Сохранение редактирования в БД
        Route::get('/destroy/{news}', 'NewsController@destroy')->name('destroy');// Удаление новости и з БД
        Route::match(['post', 'get'], '/addNews', 'NewsController@create')->name('addNews'); //Добавление новой новости
    });
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
    Route::get('/one/{news}', 'NewsController@show')->name('show');
    Route::group([
        'as' => 'category.'
    ], function () {
        Route::get('/category', 'CategoryController@index')->name('index');
        Route::get('/categoryOne/{slug}', 'CategoryController@show')->name('show');
    });
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
