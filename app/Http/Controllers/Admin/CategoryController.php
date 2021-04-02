<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
    const ITEM_PER_PAGE = 12;

    public function index()
    {
        $categories = Category::paginate(self::ITEM_PER_PAGE);

        return view('admin.category.index', compact('categories'));
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

        return back()->with('message', 'Create category successful');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();

        return view('admin.category.edit', compact('category', 'categories')); 
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->slug = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $category->image = save_image($request->image, $category->slug, 'category');
        }
        $category->save();
        $request->session()->flash('notice', 'Update category successful');

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        $request->session()->flash('notice', 'Delete category successful');

        return back(); 
    }
}
