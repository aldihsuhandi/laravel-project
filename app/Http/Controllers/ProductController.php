<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function view($product_id)
    {
        $product = Product::find($product_id);
        return view('product.view', ["product" => $product]);
    }

    public function index()
    {
        $products = Product::all();
        return view('product.products', ["products" => $products]);
    }

    public function addIndex()
    {
        $categories = Category::all();
        return view(
            'product.template',
            [
                "categories" => $categories,
                "titles" => "Insert New Product",
                "action" => "insert",
            ]
        );
    }

    public function addProduct(Request $request)
    {
        $rules = [
            "name" => "required|min:5",
            "description" => "required|min:50",
            "price" => "required|numeric|min:1",
            "category" => "required",
            "image" => "mimes:jpg,jpeg|nullable",
        ];

        $request->validate($rules);


        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image = Storage::put('public/product', $image, 'public');
            $image = explode('/', $image)[2];
            $image = 'storage/product/' . $image;
            $product->image = $image;
        } else {
            $product->image = "";
        }
        $product->save();

        return redirect('/product');
    }

    public function updateIndex($id)
    {
        $product = Product::find($id);

        if ($product == NULL) {
            return redirect('/product');
        }

        $categories = Category::all();
        return view(
            'product.template',
            [
                "product" => $product,
                "categories" => $categories,
                "titles" => "Update Product",
                "action" => "update",
            ]
        );
    }

    public function updateProduct(Request $request, $id)
    {
        $rules = [
            "name" => "required|min:5",
            "description" => "required|min:50",
            "price" => "required|numeric|min:1",
            "category" => "required",
            "image" => "mimes:jpg,jpeg|nullable",
        ];

        $request->validate($rules);

        Product::where('id', $id)
            ->update(
                [
                    "name" => $request->name,
                    "description" => $request->description,
                    "price" => $request->price,
                    "category_id" => $request->category,
                ]
            );

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image = Storage::put('public/product', $image, 'public');
            $image = explode('/', $image)[2];
            Product::where('id', $id)
                ->update(
                    [
                        "image" => $image
                    ]
                );
        }

        return redirect('/product');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        // dd($product->image);
        if ($product->image != "") {
            Storage::delete('public/product/' . $product->image);
        }
        $product->delete();
        return back();
    }
}
