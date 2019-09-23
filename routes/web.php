<?php



Route::group(['middleware'=>['web']],function(){
  Route::get('blog/{slug}','BlogController@singlePost')
        ->where('slug','[\w\d\-\_]+')
        ->name('blog.single');
  Route::get('/','PageController@index');
  Route::get('/about','PageController@about');
  Route::get('/contact', 'PageController@contact');
  Route::resource('posts', 'PostController');  
});





