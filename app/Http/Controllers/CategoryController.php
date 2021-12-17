<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view(
            'category.category',
            [
                "categories" => $categories
            ]
        );
    }

    public function addIndex()
    {
        return view(
            'category.template',
            [
                "action" => "insert",
                "titles" => "Insert New Category"
            ]
        );
    }

    public function addCategory(Request $request)
    {
        $rules = [
            'name' => 'required|min:2|unique:categories,name'
        ];

        $request->validate($rules);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect('/category');
    }

    public function updateIndex($id)
    {
        $category = Category::find($id);

        return view(
            'category.template',
            [
                "category" => $category,
                "action" => "update",
                "titles" => "Update Category"
            ]
        );
    }
    public function updateCategory(Request $request)
    {
        $rules = [
            'name' => 'required|min:2|unique:categories,name'
        ];

        $request->validate($rules);

        Category::where('id', $request->id)
            ->update([
                'name' => $request->name,
            ]);

        return redirect('/category');
    }
}
