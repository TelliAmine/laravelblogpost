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
/*
Route::get('/', function () {
    return view('home');
});
*/

/*Route::get('/posts/{id}/{author}', function ($myid,$author) {
    return $myid .$author;
});
*/
//Route::get('/posts/{id}/{author?}','HomeController@blog' )->name('blog_post') ;



Route::get('/' ,function(){
return view('welcome');
} );
//Route::get('/home' ,'HomeController' )->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::resource('/posts', 'PostController')->only('index','show','create','store','edit','update','destroy');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');



