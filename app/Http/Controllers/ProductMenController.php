<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductMenController extends Controller
{
    /**
     * Show the view with all the products for men.
     */
    public function index()
    {
        return view('products.men', ['products' => Product::all()->where('category_id', 1)]);
    }

    /**
     * Show the view for a given product.
     */

    public function show(string $id)
    {
        return view('products.product', ['product' => Product::findOrFail($id)]);
    }
}
