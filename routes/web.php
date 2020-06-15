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

// Route::get('/', function () {
//     return view('welcome');
// });

/**route view
Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    $nama = 'Saifudin Mahara';
    return view('about', ['nama' => $nama]);
});
 **/

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');

// cara route mahasiswa manual
// Route::get('/mahasiswa', 'MahasiswaController@index');
// Route::get('/mahasiswa/search', 'MahasiswaController@search');
// Route::get('/mahasiswa/create', 'MahasiswaController@create');
// Route::post('/mahasiswa/store', 'MahasiswaController@store');
// Route::patch('/mahasiswa/{mahasiswa}', 'MahasiswaController@update');
// Route::delete('/mahasiswa/{mahasiswa}', 'MahasiswaController@destroy');
// Route::get('/mahasiswa/{mahasiswa}/edit', 'MahasiswaController@edit'); 

// cara route otomatis
Route::resource('mahasiswa', 'MahasiswaController');

// Route for Teacher
Route::get('/dosen', 'TeachersController@index');
Route::get('/dosen/create', 'TeachersController@create');
Route::get('/dosen/{teacher}', 'TeachersController@show');
Route::post('/dosen', 'TeachersController@store');
Route::delete('/dosen/{teacher}', 'TeachersController@destroy');
Route::get('/dosen/{teacher}/edit', 'TeachersController@edit');
Route::patch('/dosen/{teacher}', 'TeachersController@update');
