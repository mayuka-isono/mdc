<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;


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

Route::get('/', function () {  /* top画面 */
    return view('top');
});

Route::resource('post', 'PostController');

// Route::get('post', function () {  /* 詳細画面 */
//     return view('detail_post');
// });



Auth::routes();   /* AUth user登録有 */
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['middleware' => 'auth'],function() {



});



