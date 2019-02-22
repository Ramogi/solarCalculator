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

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/calculator', function () {
    return view('pages.calculator');
});

/*Route::get('/calculator', function () {
    return view('calc');
});*/






/*
Route::resource('services','ServiceController');
Route::resource('posts','PostController');*/


Route::get('/dashboard', 'HomeController@index')->name('home');
Auth::routes();

Route::resource('installers','InstallerController');


Route::get('/posts', 'PostController@index')->name('list_posts');
Route::group(['prefix' => 'posts'], function () {
    Route::get('/show/{id}', 'PostController@show')
        ->name('show_post');
    Route::get('/create', 'PostController@create')
        ->name('create_post')
        ->middleware('can:create-post');
    Route::post('/create', 'PostController@store')
        ->name('store_post')
        ->middleware('can:create-post');
    Route::get('/edit/{post}', 'PostController@edit')
        ->name('edit_post')
        ->middleware('can:update-post,post');
    Route::post('/edit/{post}', 'PostController@update')
        ->name('update_post')
        ->middleware('can:update-post,post');
    Route::delete('/delete/{post}', 'PostController@destroy')
        ->name('delete_post')
        ->middleware('can:delete-post,post');
});
