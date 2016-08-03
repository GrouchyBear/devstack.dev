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
|--------------------------------------------------------------------------
| DashBoard Routes
|--------------------------------------------------------------------------
*/

Route::get('/feed', [
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);


Route::post('/createpost', [
    'uses'  => 'PostController@postCreatePost',
    'as'    => 'post.create',
    'middleware' => 'auth'
]);



Route::get('/delete-post/{post_id}', [
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);


Route::post('/edit', [
    'uses' => 'PostController@postEditPost',
    'as' => 'edit'
]);



/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
*/

Route::get('/account', [
    'uses' => 'UserController@getAccount',
    'as'  => 'account',
    'middleware' => 'auth'
]);

Route::post('/updateaccount', [
    'uses' => 'UserController@postSaveAccount',
    'as'   => 'account.save'
]);

Route::get('/userimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as'   => 'account.image'
]);

/*
|--------------------------------------------------------------------------
| Login/Logout Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function(){
    return view('register');
});

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);


/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);

/*
|--------------------------------------------------------------------------
| End of Working Routes
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Experimental Routes
|--------------------------------------------------------------------------
*/

Route::post('/submit', function(Request $request){
    $content = $request['content'];
    return view('output', ['content' => $content]);
})->name('submit');