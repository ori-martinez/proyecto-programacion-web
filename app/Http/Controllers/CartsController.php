<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Handle an incoming cart request.
     *
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
			'user_id' => 'required|numeric|exists:users,id',
            'product_id' => 'required|numeric|exists:products,id',
            'quantity' => 'required|numeric'
		]);

        $cart = Cart::where('user_id', '=', $request->get('user_id'));

        if ($cart->isEmpty()) {
            $newCart = new Cart();
            $newCart->user_id = $request->get('user_id');
            $newCart->save();

            $cart = Cart::where('user_id', '=', $request->get('user_id'));
        }

        $cartProduct = new CartProduct();
        $cartProduct->cart_id = $cart->id;
        $cartProduct->product_id = $request->get('product_id');
        $cartProduct->quantity = $request->get('quantity');
        $cartProduct->save();

        return redirect()->route('products.product', ['id' => $request->product_id]);
    }
}
