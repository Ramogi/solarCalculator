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



Route::get('/dashboard', 'HomeController@index')->name('home');
Auth::routes();


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


Route::get('/services', 'ServiceController@index')->name('list_services');
Route::group(['prefix' => 'services'], function () {
    Route::get('/show/{id}', 'ServiceController@show')
        ->name('show_service');
    Route::get('/create', 'ServiceController@create')
        ->name('create_service')
        ->middleware('can:create-service');
    Route::post('/create', 'ServiceController@store')
        ->name('store_service')
        ->middleware('can:create-service');
    Route::get('/edit/{service}', 'ServiceController@edit')
        ->name('edit_service')
        ->middleware('can:update-service,service');
    Route::post('/edit/{service}', 'ServiceController@update')
        ->name('update_service')
        ->middleware('can:update-service,service');
    Route::delete('/delete/{service}', 'ServiceController@destroy')
        ->name('delete_service')
        ->middleware('can:delete-service,service');
});


Route::get('/installers', 'InstallerController@index')->name('list_installers');
Route::group(['prefix' => 'installers'], function () {
    Route::get('/show/{id}', 'InstallerController@show')
        ->name('show_installer');
    Route::get('/create', 'InstallerController@create')
        ->name('create_installer')
        ->middleware('can:create-installer');
    Route::post('/create', 'InstallerController@store')
        ->name('store_installer')
        ->middleware('can:create-installer');
    Route::get('/edit/{installer}', 'InstallerController@edit')
        ->name('edit_installer')
        ->middleware('can:update-installer,installer');
    Route::post('/edit/{installer}', 'InstallerController@update')
        ->name('update_installer')
        ->middleware('can:update-installer,Installer');
    Route::delete('/delete/{installer}', 'InstallerController@destroy')
        ->name('delete_installer')
        ->middleware('can:delete-installer,installer'); 
});






