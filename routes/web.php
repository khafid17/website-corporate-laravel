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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');
});

    Route::resource('/category', 'CategoryController');
	Route::resource('/tag', 'TagController');

	Route::get('/post/tampil_hapus', 'PostController@tampil_hapus')->name('post.tampil_hapus');
	Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
	Route::delete('/post/kill/{id}', 'PostController@kill')->name('post.kill');
	Route::resource('/post', 'PostController');
    Route::resource('/user', 'UserController');

    route::get('/files/create', 'DocumentController@create');
    route::post('/files', 'DocumentController@store');
    route::get('/file', 'DocumentController@index')->name('download');
    route::get('/files/{id}', 'DocumentController@show');

// migrasi demakkab
// route::get('home', 'DashboardController@index');
route::get('/berita', 'DashboardController@berita');
route::get('/dashboard', 'DashboardController@dashboard');
route::get('/news/{slug}', 'DashboardController@news');
Route::get('image/{filename}', 'DashboardController@displayImage')->name('image.displayImage');
// route::get('/lihat/{slug}', 'DashboardController@lihat');

// route::get('/tambah', 'BerkasController@create');
// route::post('/datas', 'BerkasController@store');
// route::get('/data', 'BerkasController@index')->name('unduh');
// route::get('/data/{id}', 'BerkasController@show');

route::get('/corona', 'CovidController@chart');

route::get('/dokumen', 'BerkasController@index');
route::get('/data/{dokumen}', 'BerkasController@data');

// download demakkab
// route::get('/files/create', 'DocumentController@create');
// route::post('/files', 'DocumentController@store');
// route::get('/file', 'DocumentController@index')->name('download');
// route::get('/files/{id}', 'DocumentController@show');

// route::get('/files/download/{file}', 'DocumentController@download');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Route::group(['middleware' => ['auth', 'VerifyAdmin']], function () {
//     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
//     Route::get('/users/index', 'UserController@index')->name('users.index');
//     Route::post('/users/{user}/admin_role', 'UserController@make_admin')->name('users.admin_role');
//     Route::post('/users/{user}/writer_role', 'UserController@make_writer')->name('users.writer_role');
// });




    // Route::resource('categories', 'CategoryController');
    // Route::resource('tags', 'TagController');
    // Route::resource('posts', 'PostController');