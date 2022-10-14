<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

use App\User;
Use App\Post;


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

    $id = Auth::id();
    $post = User::find($id);

    return view('top',[
        'post' => $post,
    ]);
});

Route::resource('post', 'PostController');
Route::resource('user', 'UserController');



Auth::routes();   /* AUth user登録有 */
Route::group(['middleware' => 'auth'],function() {



});



