<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use Carbon\Carbon;
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
            'quantity' => 'required|numeric',
            'size' => 'required',
            'delivery' => 'required|numeric'
		]);

        $cart = Cart::where('user_id', $request->get('user_id'))->first();
        $date = Carbon::now();

        if ($cart === null) {
            $newCart = new Cart();
            $newCart->user_id = $request->get('user_id');
            $newCart->save();

            $cart = Cart::where('user_id', $request->get('user_id'))->first();
        }
            
        $cartProduct = new CartProduct();
        $cartProduct->cart_id = $cart->id;
        $cartProduct->product_id = $request->get('product_id');
        $cartProduct->quantity = $request->get('quantity');
        $cartProduct->size = $request->get('size');
        $cartProduct->delivery = $date->addDays($request->get('delivery') - 1)->format('Y-m-d');
        $cartProduct->save();

        return redirect()->route('products.product', ['id' => $request->product_id]);
    }

    /**
     * Handle cart cancellation
     *
     */
    public function delete(Request $request)
    {
        $data = $this->validate($request, [
            'cart_product_id' => 'required|numeric|exists:cart_products,id',
		]);

        $cartProduct = CartProduct::where('id', '=', $request->get('cart_product_id'))->delete();

        return redirect()->route('dashboard', ['message' => 'Compra cancelada con éxito']);
    }
}
