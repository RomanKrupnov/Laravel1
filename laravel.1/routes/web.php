
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
        'prefix'=> 'admin',
        'namespace'=> 'Admin',
        'as'=>'admin.'

    ],function (){
    Route::get('/','HomeController@index')->name('index');
    Route::get('/deleteNews','HomeController@deleteNews')->name('deleteNews');
    Route::get('/addNews','HomeController@addNews')->name('addNews');
});

Route::get('/','HomeController@index')->name('main');
Route::get('/about','AboutController@index')->name('about');


Route::get('/news','NewsController@index')->name('news');
Route::get('/newsOne/{id}','NewsController@indexOne')->name('newsOne');


Route::get('/category','CategoryController@index')->name('category');
Route::get('/categoryOne/{id}','CategoryController@indexOne')->name('categoryOne');
