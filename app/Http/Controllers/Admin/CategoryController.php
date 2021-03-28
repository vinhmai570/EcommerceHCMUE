<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        $categories = Category::all();
        
        return view('admin.category.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->slug = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $category->image = save_image($request->image, $category->slug, 'category');
        }

        $category->save();

        return back()->withInput();
    }
}
