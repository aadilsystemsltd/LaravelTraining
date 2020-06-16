<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/**
 * Display All Blogs
 */

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/getAllBlogs', 'BlogController@getAllBlogs');
/**
 * Add A New Blog
 */
Route::post('/saveBlog', 'BlogController@saveBlog')->middleware('auth');
/**
 * Delete An Existing Task
 */
Route::get('/deleteBlog/{id}', 'BlogController@deleteBlog')->middleware('auth');

Route::get('/editBlog/{id}', 'BlogController@getEditBlog')->middleware('auth');

Route::get('/saveBlog', 'BlogController@getSaveBlog')->middleware('auth');

Route::post('/saveEditedBlog', 'BlogController@saveEditedBlog')->middleware('auth');

Route::post('/addComment', 'BlogController@PostComments')->middleware('auth');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'BlogController@getBlogsList')->name('home');

Route::get('/profile', 'HomeController@getProfile')->name('profile');

Route::get('/getEditProfile', 'HomeController@getEditProfile');

Route::post('/postProfile', 'HomeController@postProfile');


