<?php

Route::view('admin','layouts.master');
Route::group(['middleware'=>['web']],function(){
  Route::get('blog/{slug}','BlogController@singlePost')
        ->where('slug','[\w\d\-\_]+')
        ->name('blog.single');
  Route::get('blog','BlogController@index')->name('blog.index');
  Route::get('/','PageController@index');
  Route::get('/about','PageController@about');
  Route::get('/contact', 'PageController@contact');
  Route::resource('posts', 'PostController');
  Route::resource('categories', 'CategoryController',['except'=>['create']]);
  Route::resource('tags', 'TagController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
