<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailTransaction;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();

        return view('cart.view', ["carts" => $carts]);
    }

    public function update($product_id)
    {
        $product = Product::find($product_id);
        $action = "update";
        $quantity = Cart::where('product_id', $product_id)
            ->where('user_id', Auth::user()->id)
            ->first()->quantity;
        return view('product.view', [
            "product" => $product,
            "action" => $action,
            "quantity" => $quantity,
        ]);
    }

    public function add(Request $request)
    {
        $rules = [
            "quantity" => "required|min:1"
        ];

        $request->validate($rules);

        $action = $request->action;

        $user = Auth::user();

        $cart = Cart::where('user_id', $user->id)->where('product_id', $request->product_id)->first();
        if ($action == "update") {
            Cart::where('user_id', $user->id)->where('product_id', $request->product_id)
                ->update([
                    'quantity' => $request->quantity
                ]);

            return redirect('/cart');
        } else if ($cart == null) {
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

    public function checkout()
    {
        $user = Auth::user();
        $carts = $user->cart;

        if ($carts->isEmpty()) {
            return redirect()->back();
        }

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->save();

        foreach ($carts as $cart) {;
            $detail = new DetailTransaction();
            $detail->transaction_id = $transaction->id;
            $detail->product_id = $cart->product_id;
            $detail->quantity = $cart->quantity;
            $detail->save();
        }

        Cart::where('user_id', $user->id)->delete();

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $user_id = $request->user_id;
        $product_id = $request->product_id;
        Cart::where('user_id', $user_id)->where('product_id', $product_id)
            ->delete();
        return redirect()->back();
    }
}
