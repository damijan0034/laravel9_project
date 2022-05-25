<?php

use App\Http\Controllers\Dashboard\PostController as DashboardPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::resource('/posts',PostController::class);

    Route::get('/posts/{post:slug}',[PostController::class,'show'])->name('posts.show');
    Route::get('/posts/{post:slug}/edit',[PostController::class,'edit'])->name('posts.edit');
});

Route::get('/',[DashboardPostController::class,'index'])->name('dashboard.index');
Route::get('/dashboard/posts/{post:slug}',[DashboardPostController::class,'show'])->name('dashboard.show');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
