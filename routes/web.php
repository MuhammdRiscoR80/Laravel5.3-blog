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
Route::group(['middleware' => ['web']], function () {
	//authetication login
	Auth::routes();
	Route::get('/home', 'HomeController@index');

	// Pages
	Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
		->where('slug', '[\w\d\-\_]+');
	Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);
	Route::get('/', 'PagesController@getIndex');
	Route::get('/about', 'PagesController@getAbout');
	Route::get('/contact', 'PagesController@getContact');
	Route::post('/contact', 'PagesController@postContact');
	// Post
	Route::resource('posts', 'PostController');
	// Category
	Route::resource('categories', 'CategoryController', ['except' => ['create']]);
	// Tag
	Route::resource('tags', 'TagController', ['except' => ['create']]);
	//commentary
	Route::post('comment/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comment.store']);
	Route::get('comment/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comment.delete']);
	Route::resource('comment', 'CommentController');

});
