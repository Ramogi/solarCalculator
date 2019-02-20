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

/*Route::get('/', function () {
    return view('home');
});*/


/*Route::resource('installers','InstallerController');
Route::resource('services','ServiceController');
Route::resource('posts','PostController');
*/

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::group(['middleware' => 'auth'], function () {
   Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
   Route::post('register','Auth\RegisterController@register');
   Route::post('logout','Auth\LoginController@logout')->name('logout');
});


Route::get('posts','PostController@index')->name('post-index');
Route::get('posts/create','PostController@create')->name('post-create');
Route::post('posts','PostController@store')->name('post-store');
Route::get('posts/{post}/edit','PostController@edit')->name('post-edit');
Route::patch('posts/{post}','PostController@update')->name('post-update');
Route::delete('posts/{post}','PostController@destroy')->name('post-delete');


//Old Routes
/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('posts','PostController');

Route::resource('/','PostController@index');
Route::resource('posts','PostController');*/

//ENd Old Routes

/*Route::group(['prefix' => 'posts'], function(){
    Route::get('/show/{id}', 'PostController@show')
      ->name('show_post');

    Route::get('/create', 'PostController@create')
        ->name('create_post')
        ->middleware('can:create-post');
    Route::post('/create', 'PostController@store')
        ->name('store_post')
        ->middleware('can:create-post');

    Route::get('/edit/{post}', 'PostController@edit')
        ->name('edit_post');
        ->middleware('can:update-post, post');

    Route::post('/edit/{post}', 'PostController@update')
          ->name('update_post');
          ->middleware('can:update-post, post');

    Route::get('/delete/{post}', 'PostController@destroy')
            ->name('delete_post');
            ->middleware('can:delete-post, post');
});
