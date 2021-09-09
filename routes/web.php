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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function(){
    //return view('layouts.template');
    return view('website.home');
})->name('website');

Route::get('/about', function(){
    return view('website.about');
});
Route::get('/category', function(){
    return view('website.category');
});
Route::get('/postshow', function(){
    return view('website.post');
});
Route::get('/contact', function(){
    return view('website.contact');
});

//Admin panel routes

use \App\Http\Controllers\CategoryController; 
Route::group([ 'prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard.index');
    });
    
    Route::resource('category', CategoryController::class);
    //Route::resource('category', '\App\Http\Controllers\CategoryController');
    Route::resource('tag', '\App\Http\Controllers\TagController');
    Route::resource('post', '\App\Http\Controllers\PostController');
});

/* ** For work without login 

Route::get('/dashboard', function(){
    return view('admin.dashboard.index');
});

//Route::get('/category', [CategoryController::class, 'index']);
Route::resource('category', '\App\Http\Controllers\CategoryController');
Route::resource('tag', '\App\Http\Controllers\TagController');
Route::resource('post', '\App\Http\Controllers\PostController');*/


    
