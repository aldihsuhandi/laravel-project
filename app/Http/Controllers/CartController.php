<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();

        return view('cart.view', ["carts" => $carts]);
    }

    public function add(Request $request)
    {
        $rules = [
            "quantity" => "required|min:1"
        ];

        $request->validate($rules);

        $user = Auth::user();

        $cart = Cart::where('user_id', $user->id)->where('product_id', $request->product_id)->first();
        if ($cart == null) {
            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->user_id = $user->id;
            $cart->quantity = $request->quantity;
            $cart->save();
        } else {
            $quantity = $cart->quantity + $request->quantity;
            Cart::where('user_id', $user->id)->where('product_id', $request->product_id)
                ->update(['quantity' => $quantity]);
        }
        return redirect()->back();
    }

    public function deleteWholeCart(Request $request){
        
    }
}
