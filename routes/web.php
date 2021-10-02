<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\EmailController;

use App\Models\Post;

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

//Frontend Routes
Route::get('/', 'App\Http\Controllers\FrontendController@home')->name('website');
Route::get('/about', [FrontendController::class, 'about'])->name('website.about');
Route::get('/category/{slug}', [FrontendController::class, 'category'])->name('website.category');
Route::get('/post/{slug}', 'App\Http\Controllers\FrontendController@post')->name('website.post');
Route::get('/contact', [FrontendController::class, 'contact'])->name('website.contact');
Route::post('/contact', [FrontendController::class, 'send_message'])->name('website.contact');
Route::get('send-email',[EmailController::class,'sendEmail']);


/*Route::get('/', function(){
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
});*/


//Admin panel routes
use \App\Http\Controllers\CategoryController; 
use \App\Http\Controllers\UserController; 
Route::group([ 'prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard.index');
    });
    
    Route::resource('category', CategoryController::class);
    //Route::resource('category', '\App\Http\Controllers\CategoryController');
    Route::resource('tag', '\App\Http\Controllers\TagController');
    Route::resource('post', '\App\Http\Controllers\PostController');
    Route::resource('user', UserController::class);
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('/profile-update', [UserController::class, 'profile_update'])->name('user.profile.update');
    Route::get('setting', 'App\Http\Controllers\SettingController@edit')->name('setting.edit');
    Route::post('setting', 'App\Http\Controllers\SettingController@update')->name('setting.update');
    Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact.index');
    Route::get('/contact/show/{id}', 'App\Http\Controllers\ContactController@show')->name('contact.show');
    Route::delete('/contact/delete/{id}', 'App\Http\Controllers\ContactController@destroy')->name('contact.destroy');
});

/* ** For work without login 

Route::get('/dashboard', function(){
    return view('admin.dashboard.index');
});

//Route::get('/category', [CategoryController::class, 'index']);
Route::resource('category', '\App\Http\Controllers\CategoryController');
Route::resource('tag', '\App\Http\Controllers\TagController');
Route::resource('post', '\App\Http\Controllers\PostController');*/


Route::get('/test', function(){
    $posts = Post::all();

    $id = 50;

    foreach($posts as $post){
        //$post->image = "https://picsum.photos/600/400";
        $post->image = "https://picsum.photos/id/".$id."/600/400.jpg";
        $post->save();
        $id++;
    }
    return $posts;
});


    
