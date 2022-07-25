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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
############################################################################

Route::get('/allFiles', 'FileController@index')->name('file.index');


Route::get('/file/create', 'FileController@create')->name('file.create');
Route::post('/file/create', 'FileController@store')->name('file.store');

// edit
Route::get('/file/edit/{id}', 'FileController@edit')->name('file.edit');
//updata
Route::post('/file/edit/{id}', 'FileController@update')->name('file.update');
// Delete

Route::get('/file/delete/{id}', 'FileController@destroy')->name('file.destroy');

// show
Route::get('/file/show/{id}', 'FileController@show')->name('file.show');

// downlod
Route::get('/file/Download/{id}', 'FileController@Download')->name('file.Download');
