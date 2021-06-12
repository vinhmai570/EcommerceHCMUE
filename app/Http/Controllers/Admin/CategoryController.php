<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    const ITEM_PER_PAGE = 12;

    public function index()
    {
        $categories = Category::sortable()->paginate(self::ITEM_PER_PAGE);

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

        if ($request->hasFile('image')) {
            $category->image = save_image($request->image, $category->slug, 'category');
        }
        $category->save();

        return redirect()->route('admin.categories.index')->with('message', 'Update category successful');;
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        delete_image($category->image, 'category');

        return back()->with('message', 'Delete category successful');
    }
}
