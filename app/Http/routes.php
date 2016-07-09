<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('test',function(){
	return "test route text";
});

Route::get('test/{id}',function(){
	//return "test id =".$id;
});

Route::get('test/demo',function(){
	return "test route demo";
});

Route::get('showinfo','WelcomeController@showinfo');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/

Route::get('/','BasicController@home');
Route::get('about-us','BasicController@about_us');
Route::get('service','BasicController@service');
Route::get('portfolio','BasicController@portfolio');
Route::get('blog','BasicController@blog');
Route::get('contact','BasicController@contact');

// Register
Route::get('register','BasicController@register');
Route::post('register','BasicController@register_post');

// Show Member
Route::get('showmember','BasicController@showmember');

// Show Product
Route::get('showproduct','BasicController@showproduct');

// Route Resource
Route::resource('books','BookController');

// Book Detail Modal
Route::get('books/detail/{id}','BookController@book_detail');

// Book Edit Modal
Route::get('books/edit/{id}','BookController@book_edit');

// Submit Contact
Route::post('contact-submit','BasicController@contact_submit');

// Route Controller
Route::controller('admin','Admins\LoginController');

Route::group([
	'prefix' => 'admin',
	'middleware'=>'auth',
	'namespace'=>'Admins'
], function(){
	
 });


// Export Excel
Route::get('export','BasicController@export');