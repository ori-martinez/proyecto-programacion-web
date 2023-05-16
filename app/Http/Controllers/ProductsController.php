<?php

namespace App\Http\Controllers;

use App\Models\Commentary;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Show the view with all the products for men.
     */
    public function indexMen()
    {
        return view('products.men', ['products' => Product::all()->where('category_id', 1)]);
    }

    /**
     * Show the view with all the products for women.
     */
    public function indexWomen()
    {
        return view('products.women', ['products' => Product::all()->where('category_id', 2)]);
    }

    /**
     * Show the view with all the products for articles.
     */
    public function indexArticles()
    {
        return view('products.articles', ['products' => Product::all()->where('category_id', 3)]);
    }

    /**
     * Show the view for a given product.
     */
    public function show(string $id)
    {
        $commentaries = Commentary::orderBy('commentaries.id', 'desc')
            ->select('users.name', 'users.last_name', 'commentaries.description')
            ->join('users', 'users.id', '=', 'commentaries.user_id')
            ->where('commentaries.product_id', $id)
            ->get();
 
        if ($commentaries->isEmpty()) $commentaries = null;
 
        return view('products.product', [
            'product' => Product::findOrFail($id),
            'commentaries' => $commentaries,
        ]);
    }
}
