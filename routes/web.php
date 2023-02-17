<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\userController;
use App\Http\Controllers\kaprogController;
use App\Http\Controllers\ruanganController;

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

// Route::get('/', function () {
//     return view('home', ['title' => 'home']);
// });

// Route::get('/about', function () {
//     return view('about', ['title' => 'about']);
// });

// Route::get('/blog', function () {
//     return view('posts', ['title' => 'blog']);
// });

Route::get('/', function () {
    return view('dashboard.index');
});

Route::resource('role', roleController::class);

Route::resource('user', userController::class);

// kaprog
Route::get('/kaprog', [kaprogController::class, 'index']);
Route::get('/kaprog/create', [kaprogController::class, 'create']);
Route::post('/kaprog/store', [kaprogController::class, 'store']);
Route::get('/kaprog/{id}/edit', [kaprogController::class, 'edit']);
Route::post('/kaprog/edit/update', [kaprogController::class, 'update']);
Route::get('/kaprog/destory/{id}', [kaprogController::class, 'destory']);

Route::resource('ruangan', ruanganController::class);
