<?php

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



/*$stripe = App::make('App\Http\Stripe'); // OR $stripe = resolve('App\Http\Stripe');
$stripe2 = App::make('App\Http\Stripe'); // OR $stripe = resolve('App\Http\Stripe');
$stripe3 = App::make('App\Http\Stripe'); // OR $stripe = resolve('App\Http\Stripe');
*/

$stripe = resolve('App\Http\Stripe');
dd($stripe); 
// dd($stripe2); dd($stripe3); 



Route::get('/', function () {
    return view('welcome');
});


/*Route::get('/about', function () {
    return view('pages.about');
});*/
Auth::routes();
Route::resource('/roles','RolesController');
Route::resource('/cms','CmsController');
Route::resource('/user','UserController');
Route::resource('/category','CategoryController');

Route::get('/admin', 'HomeController@index')->name('admin');
Route::get('/helpers', 'HomeController@helpers')->name('helpers');

Route::get('/pages', 'PagesController@index');
Route::get('/pages/about', 'PagesController@about');
Route::get('/pages/services', 'PagesController@services');
Route::get('/pages/contact', 'PagesController@contact');
Route::get('/pages/slug/{slug}', 'PagesController@slug')->name('slug');

Route::get('/delete_form', 'RolesController@delete_form');
Route::post('/change_status', 'RolesController@change_status')->name('change_status');


Route::get('/delete_form_cms', 'CmsController@delete_form');
Route::post('/change_status_cms', 'CmsController@change_status')->name('change_status_cms');

Route::get('/delete_form_user', 'UserController@delete_form');
Route::post('/change_status_user', 'UserController@change_status')->name('change_status_user');


Route::get('/delete_form_cat', 'CategoryController@delete_form');
Route::post('/change_status_cat', 'CategoryController@change_status')->name('change_status_cat');

