<?php

Route::view('admin','layouts.master');
Route::view('post_index','menu.post.index');
Route::view('post_create','menu.post.create');
Route::view('tag_index','menu.tag.index');
Route::view('tag_create','menu.tag.create');

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
  // comment
  Route::post('comments/{post_id}', 'CommentController@store')->name('comments.store');
  Route::get('comments/{id}/edit', 'CommentController@edit')->name('comments.edit');
  Route::put('comments/{id}/update', 'CommentController@update')->name('comments.update');
  Route::delete('comments/{id}/destroy', 'CommentController@destroy')->name('comments.destroy');
  Route::get('comments/{id}/delete', 'CommentController@delete')->name('comments.delete');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
