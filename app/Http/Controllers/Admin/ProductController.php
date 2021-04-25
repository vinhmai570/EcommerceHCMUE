<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    const ITEM_PER_PAGE = 12;

    private $product_service;

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }

    public function index()
    {
        $products = $this->product_service->paginate(self::ITEM_PER_PAGE);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->product_service->getAllCategories();
        $attributes = $this->product_service->getAllAttributes();
        return view('admin.product.create', compact('categories', 'attributes'));
    }

    public function edit($id)
    {
        $categories   = $this->product_service->getAllCategories();
        $attributes   = $this->product_service->getAllAttributes();
        $product      = $this->product_service->find($id);
        $product_skus = $product->product_skus;
        return view('admin.product.edit', compact('categories', 'attributes', 'product', 'product_skus'));
    }

    public function store(CreateProductRequest $request)
    {
        if ($this->product_service->store($request)) {
            return back()->with('message', 'Create product successful');
        } else {
            return back()->with_input()->with('alert-type', 'error')->with('message', 'Create product failed');
        }
    }

    public function update(UpdateProductRequest $request, $id)
    {
        if ($this->product_service->update($request, $id)) {
            return redirect()->route('admin.products.index')->with('message', 'Update product successful');
        } else {
            return back()->with('message', 'Update product failed');
        }
    }

    public function delete($id)
    {
        if ($this->product_service->delete($id)) {
            return back()->with('message', 'Delete product successful');
        } else {
            return back()->with('alert-type', 'error')->with('message', 'Delete product Failed');
        }
    }
}
