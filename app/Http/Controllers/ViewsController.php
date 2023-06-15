<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewsController extends Controller
{
    /**
     * Show the dashboard.
     */
    public function __invoke()
    {
        if (Auth::user()->rol_id === 1) {
            $products = Product::all();
        
            if ($products->isEmpty()) $products = null;

            return view('dashboard', ['products' => $products]);
        }
        else {
            $products = array();
            $cartId = Cart::where('user_id', Auth::user()->id)->value('id');

            if ($cartId !== null) {
                $shops = CartProduct::where('cart_id', $cartId)->get();

                if ($shops->isEmpty()) $products = null;
                else {
                    for ($i = 0; $i < count($shops); $i ++) {
                        $data = Product::where('id', $shops[$i]->product_id)->first();
                        $products[$i] = [ $shops[$i], $data ];
                    }
                }
            }
            else $products = null;

            return view('dashboard', ['products' => $products]);
        }
    }

    /**
     * Show the view with FAQ.
     */
    public function indexHelp()
    {
        return view('extras.help');
    }

    /**
     * Show the view with the terms of use.
     */
    public function indexTerms()
    {
        return view('extras.terms');
    }

    /**
     * Show the view with privacy policies.
     */
    public function indexPolicies()
    {
        return view('extras.policies');
    }

    /**
     * Show the view with contact form.
     */
    public function indexContact()
    {
        return view('extras.contact');
    }

    /**
     * Show the view with the blog
     */
    public function indexBlog()
    {
        return view('extras.blog');
    }
}
