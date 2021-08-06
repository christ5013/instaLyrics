<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; //gama gama para dli mo error HAHAHA

use Illuminate\Support\Facades\Request;

use App\Post;

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


Auth::routes();


Route::post('/follow/{user}', 'FollowController@store');

Route::get('/', 'PostController@index');
Route::post('/p', 'PostController@store');
Route::get('p/create', 'PostController@create');
Route::get('p/{post}', 'PostController@show');
Route::get('/deletePost/{id}', 'PostController@delete');
Route::get('/update/{post}/edit', 'PostController@edit')->name('post.edit');
Route::patch('/update/{postid}', 'PostController@update')->name('post.update');


// comment area
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::get('delete/{id}', 'CommentController@deleteComment');

// profile
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.index');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');
