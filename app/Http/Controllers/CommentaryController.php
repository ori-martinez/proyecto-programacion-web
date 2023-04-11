<?php

namespace App\Http\Controllers;

use App\Models\Commentary;
use Illuminate\Http\Request;

class CommentaryController extends Controller
{
    /**
     * Handle an incoming comentary request.
     *
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
			'user_id' => 'required|numeric|exists:users,id',
            'product_id' => 'required|numeric|exists:products,id',
            'description' => 'required'
		]);

        $comment = new Commentary();
		$comment->user_id = $request->get('user_id');
        $comment->product_id = $request->get('product_id');
        $comment->description = $request->get('description');
        $comment->save();

        return redirect()->route('products.product', ['id' => $request->product_id]);
    }
}
