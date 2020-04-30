<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'GalleryController@index')->name('index');

Route::get('/gallery.create', function () {
    return view('gallery.create');
});

Route::post('/gallery.create', 'GalleryController@create');
Route::get('/gallery.view{id}', 'GalleryController@view');
Route::get('/gallery.delete{id}', 'GalleryController@delete');

//-------images Routes-----------//

Route::get('/images.view{id}', 'ImageController@view')->name('view');
Route::get('/images.add{id}', 'ImageController@add');
Route::post('/images.insert{id}', 'ImageController@insert');