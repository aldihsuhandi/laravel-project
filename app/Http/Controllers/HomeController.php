<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $products = Product::paginate(6);
        return view('index', ["products" => $products]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name', "like", "%$search%")->paginate(6);
        return view('index', ["products" => $products]);
    }
}
