<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\DisplayController;



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

Route::get('/', 'DisplayController@index');

Route::resource('post', 'PostController');
Route::resource('user', 'UserController');
Route::resource('fav', 'FavController');


//パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Auth::routes();   /* AUth user登録有 */

Route::group(['middleware' => 'auth'],function() {
    // いいね　route
    Route::post('ajaxlike', 'PostController@ajaxlike')->name('posts.ajaxlike');
    // フォロー　route
    Route::post('ajaxfollow', 'PostController@ajaxfollow')->name('users.ajaxlike');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
