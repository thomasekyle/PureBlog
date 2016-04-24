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
use App\User;
use Http\Controllers\AuthController;
use Http\Controllers\PasswordController;

/////////////////////////////////////////////
//AUTH ROUTES
///////////////////////////////////////////

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);

/////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////
//	Dashboard Routes 										   //
////////////////////////////////////////////////////////////////

//Must be authenticated User to access these routes
Route::group(['middleware' => 'auth'], function() {

//Main Blog Dashboard
Route::get('/dashboard/main','DashboardController@getDashboard');

//Search Routes
Route::get('/dashboard/5mintopics/search', 'SearchController@searchTopics');
Route::get('/dashboard/file/search/', 'SearchController@searchFiles');

//Profile Routes
Route::get('/dashboard/profile', 'DashboardController@getProfile');
Route::post('/dashboard/profile/update/{id}', 'UserController@update');

//File Routes
Route::get('/dashboard/files/main', 'DashboardController@getFiles');
Route::post('/dashboard/files/upload', 'FileController@store');
Route::get('/dashboard/files/delete/{id}', 'FileController@destroy');
Route::post('/dashboard/files/update/{id}', 'DocumentController@update');
Route::get('/dashboard/files/edit/{id}', 'DocumentController@edit');


//Post Routes
Route::get('/dashboard/posts/main', 'DashboardController@getPosts');
Route::get('/dashboard/posts/new', 'PostController@create');
Route::post('/dashboard/posts/store', 'PostController@store');
Route::get('/dashboard/posts/edit/{id}', 'PostController@edit');
Route::post('/dashboard/posts/update/{id}', 'PostController@update');
Route::get('/dashboard/posts/delete/{id}', 'PostController@destroy');


///////////////////////
//ADMIN ROUTES
/////////////////////

//Site Setting Routes
Route::get('/dashboard/settings/main', 'DashboardController@getSettings');
Route::post('/dashboard/settings/update/{id}', 'SettingsController@update');

//Email Setting Routes
Route::get('/dashboard/emailsettings', 'DashboardController@getEmailSettings');

//Users Routes
Route::get('/dashboard/users/main', 'DashboardController@getUsers');
Route::get('/dashboard/users/new', 'UserController@create');
Route::post('/dashboard/users/store', 'UserController@store');
Route::get('/dashboard/users/edit/{id}','UserController@edit');
Route::post('/dashboard/users/update/{id}', 'UserController@update');
Route::get('/dashboard/users/delete/{id}', 'UserController@destroy');
Route::get('/dashboard/users/password/{id}', 'UserController@changePassword');
Route::post('/dashboard/users/password/update/{id}', 'UserController@updatePassword');

});

/////////////////////////////////////////////////////////
//  Blog Routes
///////////////////////////////////////////////////////
Route::get('/', function()
{
	return redirect('/blog');
});
Route::get('/blog' , function()
{
	$user = \Auth::user();
	$posts = \App\Posts::orderBy('id', 'desc')->paginate(15);
	$featuredpost = \App\Posts::find(6);
	return View::make('blog.blog' ,compact('featuredpost','posts', 'user'));
});

Route::get('/blog/view/{id}' , 'BlogController@getPost');

//Site Routes
Route::get('/about', function()
{
    return View::make('blog.about');
});
Route::get('/videos', function()
{
    return View::make('blog.videos');
});
Route::get('/games', function()
{
    return View::make('blog.games');
});
Route::get('/code', function()
{
    return View::make('blog.code');
});


