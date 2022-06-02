<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Dashboard\PostController as DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

    //profile routes
Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::put('/profile/{user}/update',[ProfileController::class,'update'])->name('profile.update');
});

Route::get('/',[DashboardPostController::class,'index'])->name('dashboard.index');
Route::get('/dashboard/posts/{post:slug}',[DashboardPostController::class,'show'])->name('dashboard.show');

//admin routes
Route::middleware(['auth','checkAdmin'])->group(function(){
    Route::get('/admin',[AdminPostController::class,'index'])->name('admin.index');
    Route::delete('/admin/destroy/{id}',[AdminPostController::class,'destroy'])->name('admin.destroy');
    Route::put('/admin/restore/{id}',[AdminPostController::class,'restore'])->name('admin.restore');
});






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
