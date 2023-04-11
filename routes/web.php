<?php

use App\Http\Controllers\CommentaryController;
use App\Http\Controllers\ProductArticlesController;
use App\Http\Controllers\ProductMenController;
use App\Http\Controllers\ProductWomenController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/productos/hombres', [ProductMenController::class, 'index'])->name('products.men');
Route::get('/productos/hombres/{id}', [ProductMenController::class, 'show'])->name('products.product');
Route::get('/productos/mujeres', [ProductWomenController::class, 'index'])->name('products.women');
Route::get('/productos/mujeres/{id}', [ProductMenController::class, 'show'])->name('products.product');
Route::get('/productos/articulos', [ProductArticlesController::class, 'index'])->name('products.articles');
Route::get('/productos/articulos/{id}', [ProductArticlesController::class, 'show'])->name('products.product');


Route::post('/productos/comentario', [CommentaryController::class, 'store'])->name('commentary');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
