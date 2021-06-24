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

// Route::get('/dashboard', function () {
//     if (session('berhasil_login')) {
//         return view('index');
//     }else{
//         return redirect('/');
//     }
// });


Route::get('/abcdefghijklmnopqrstuvwxyz', function () {
    return view('welcome');
});

Auth::routes();


// Ini untuk login
// Route::post('/', 'App\Http\Controllers\Otentikasi\OtentikasiController@login')->name('login');
// Route::get('/', 'App\Http\Controllers\Otentikasi\OtentikasiController@index')->name('login'); 
Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login'); 
Route::post('/', 'App\Http\Controllers\Auth\LoginController@login')->name('login'); 




Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () { return view('index'); });
    
    // Ini untuk tambah data
    Route::get('/crud', 'App\Http\Controllers\CrudController@index')->name('crud');
    Route::get('/crud/tambah', 'App\Http\Controllers\CrudController@tambah')->name('crud.tambah');

    // Ini untuk simpan data
    Route::post('/crud','App\Http\Controllers\CrudController@simpan')->name('crud.simpan');

    //Route untuk delete data
    Route::delete('/crud/{id}','App\Http\Controllers\CrudController@delete')->name('crud.delete');

    // Route untuk edit data
    Route::get('/crud/edit/{id}','App\Http\Controllers\CrudController@edit')->name('crud.edit');
    Route::patch('/crud/{id}','App\Http\Controllers\CrudController@update')->name('crud.update');

    // Ini untuk logout
    Route::get('logout', 'App\Http\Controllers\Otentikasi\OtentikasiController@logout')->name('logout');


});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
