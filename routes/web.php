<?php

use App\Http\Controllers\BlogController;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function (Request $request) {
    $where = [];

    if (trim($request->term) != '') {
        $where[] = ["title", 'like', '%' . $request->term . '%'];
    }

    $blogs = DB::table("blogs")->where($where)->orderBy('id', 'DESC')->paginate(5);
    return view('welcome',['blogs' =>$blogs]);
})->name("welcome");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/blogs/index', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blogs/show/{blog}', [BlogController::class,'show'])->name('blog.show');

    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blogs/create', [BlogController::class, 'store'])->name('blog.store');

    Route::get('/blogs/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::patch('/blogs/edit/{blog}', [BlogController::class, 'update'])->name('blog.update');

    Route::delete('/blogs/delete/{blog}', [BlogController::class, 'destroy'])->name('blog.delete');
});

Route::get('/blogs/detail/{blog}', function(Blog $blog){
    return view("blog-detail",['blog' => $blog]);
})->name('blog.detail');
