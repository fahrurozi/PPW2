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

Auth::routes(
    [
    'reset' => false]
);
// Route::get('/logout','HomeController@logout');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::resource('/mahasiswa', 'MahasiswaController');

// Route::resource('/buku', 'BukuController');
Route::get('/buku','BukuController@index');
Route::get('/buku/create','BukuController@create')->name('buku.create');
Route::post('/buku','BukuController@store')->name('buku.store');
Route::post('/buku/delete/{id}', 'BukuController@destroy')->name('buku.destroy');


Route::get('/buku/edit/{id}', 'BukuController@edit')->name('buku.edit');
Route::post('/buku/update/{id}', 'BukuController@update')->name('buku.update');

Route::get('/buku/search', 'BukuController@search')->name('buku.search');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users','UserController@index');
Route::get('/users/create','UserController@create')->name('users.create');
Route::post('/users','UserController@store')->name('users.store');
Route::post('/users/delete/{id}', 'UserController@destroy')->name('users.destroy');
Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
Route::post('/users/update/{id}', 'UserController@update')->name('users.update');

Route::get('/galeri','GaleriController@index');
Route::get('/galeri/create','GaleriController@create')->name('galeri.create');
Route::post('/galeri','GaleriController@store')->name('galeri.store');
Route::post('/galeri/delete/{id}', 'GaleriController@destroy')->name('galeri.destroy');
Route::get('/galeri/edit/{id}', 'GaleriController@edit')->name('galeri.edit');
Route::post('/galeri/update/{id}', 'GaleriController@update')->name('galeri.update');

Route::get('/list_buku', 'BukuController@list_buku')->name('list_buku');
Route::get('/list_buku/detail_buku/{title}', 'BukuController@galbuku')->name('detail.galeri.buku');