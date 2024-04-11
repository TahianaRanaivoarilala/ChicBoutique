<?php

use App\Http\Controllers\Admin\Post\PostController as AdminPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index']);

/**
 * Route pour la partie Utilisateurs 😉.
 */
Route::prefix('/post')->name('post.')->group(function(){
    Route::get('/index',[PostController::class])->name('index');
});
/**
 * Route pour la partie administrateurs ✌.
 */
Route::prefix('/admin')->name('admin.')->group(function(){
    /**
     * Partie PostAdmin.
     */
    Route::prefix('/posts')->name('post.')->controller(AdminPostController::class)->group(function(){
        Route::get('/index','index')->name('index');
        Route::get('/new','create')->name('create');
        Route::post('/new','store');
    });

});
