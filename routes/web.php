<?php

use App\Http\Controllers\CartsController;
use App\Http\Controllers\CommentaryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewsController;
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
})->name('welcome');

Route::get('/productos/hombres', [ProductsController::class, 'indexMen'])->name('products.men');
Route::get('/productos/mujeres', [ProductsController::class, 'indexWomen'])->name('products.women');
Route::get('/productos/articulos', [ProductsController::class, 'indexArticles'])->name('products.articles');
Route::get('/productos/{id}', [ProductsController::class, 'show'])->name('products.product');
Route::get('/productos', [ProductsController::class, 'search'])->name('products.search');
Route::post('/productos', [ProductsController::class, 'search'])->name('products.search');
Route::get('/producto/create', [ProductsController::class, 'create'])->middleware(['auth', 'verified'])->name('products.register');
Route::get('/producto/{id}', [ProductsController::class, 'update'])->middleware(['auth', 'verified'])->name('products.update');

Route::post('/productos/comentario', [CommentaryController::class, 'store'])->name('commentary');

Route::post('/compra', [CartsController::class, 'store'])->name('shop');
Route::post('/compra/delete', [CartsController::class, 'delete'])->name('shop.delete');

Route::get('/blog', [ViewsController::class, 'indexBlog'])->name('extras.blog');
Route::get('/contacto', [ViewsController::class, 'indexContact'])->name('extras.contact');
Route::get('/ayuda', [ViewsController::class, 'indexHelp'])->name('extras.help');
Route::get('/terminos', [ViewsController::class, 'indexTerms'])->name('extras.terms');
Route::get('/politicas', [ViewsController::class, 'indexPolicies'])->name('extras.policies');

Route::get('/dashboard', ViewsController::class, '__invoke')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
