<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\AttributeValue;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $attributes = Attribute::all();
        return view('admin.product.create', compact('categories', 'attributes'));
    }
}
