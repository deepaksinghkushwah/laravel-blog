<?php

use App\Http\Controllers\BlogController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/blogs/index', [BlogController::class,'index'])->name('blog.index');
    Route::get('/blogs/show/{blog}', [BlogController::class,'show'])->name('blog.show');

    Route::get('/blogs/create', [BlogController::class,'create'])->name('blog.create');
    Route::post('/blogs/create', [BlogController::class,'store'])->name('blog.store');

    Route::get('/blogs/edit/{blog}', [BlogController::class,'edit'])->name('blog.edit');
    Route::patch('/blogs/edit/{blog}', [BlogController::class,'update'])->name('blog.update');

    Route::delete('/blogs/delete/{blog}', [BlogController::class,'destroy'])->name('blog.delete');



});
