<?php

use Illuminate\Support\Facades\Route;

Route::get('/','PageController@home')->name('home');
Route::get('/category/{id}','PageController@category')->name('category_page');
Route::get('/category/{category_id}/{post_id}','PageController@post')->name('post_page');
Route::get('/zahra/magazine','PageController@magazine')->name('magazine_page');
Route::get('/zahra/magazine/{date}', 'MagazineController@show')->name('magazine_view');
Route::post('/email', 'EmailController@create')->name('add_email');

Route::get('/search','PageController@search')->name('search');

Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@authenticate')->name('login');


Route::group(['middleware'=>['web','auth']],function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/dashboard/category', 'CategoryController@index')->name('category');
    Route::post('/dashboard/category/add', 'CategoryController@create')->name('add_category');
    Route::post('/dashboard/category/edit/{id}', 'CategoryController@edit')->name('edit_category');
    Route::get('/dashboard/category/del/{id}', 'CategoryController@destroy')->name('del_category');

/////////////////////////// Posts ///////////////
    Route::get('/dashboard/post', 'PostController@index')->name('post');
    Route::get('/dashboard/post/add', 'PostController@create')->name('create_post');
    Route::post('/dashboard/post/add', 'PostController@store')->name('add_post');
    Route::get('/dashboard/post/edit/{id}', 'PostController@edit')->name('edit_post');
    Route::post('/dashboard/post/update/{id}', 'PostController@update')->name('update_post');
    Route::get('/dashboard/post/delete/{id}', 'PostController@destroy')->name('delete_post');


    Route::get('/dashboard/magazine', 'MagazineController@index')->name('magazine');
    Route::post('/dashboard/magazine/add', 'MagazineController@create')->name('add_magazine');
    Route::get('/dashboard/magazine/delete/{id}', 'MagazineController@destroy')->name('del_magazine');
    Route::post('/dashboard/magazine/create/', 'MagazineController@store')->name('create_magazine');
    Route::post('/dashboard/magazine/un-create/', 'MagazineController@un_store')->name('un_create_magazine');

    Route::get('/dashboard/magazine/show/{date}', 'MagazineController@show')->name('show_magazine');

    Route::get('/dashboard/ads', 'AdsController@index')->name('ads');
    Route::post('/dashboard/ads','AdsController@control')->name('control_ad');

    Route::get('/dashboard/email', 'EmailController@index')->name('email');
    Route::get('/dashboard/email/del/{id}', 'EmailController@destroy')->name('del_email');


    Route::post('/logout', 'AuthController@logout')->name('logout');

});
