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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostsController@index')->name('top');

Route::group(['middleware' => 'auth'], function (){
    Route::resource('posts', 'PostsController', ['only' => ['create','show', 'store', 'destroy']]);
    Route::resource('comments', 'CommentsController', ['only' => ['store']]);
    Route::post('images-upload', 'PostController@imagesUploadPost')->name('images.upload');
});

