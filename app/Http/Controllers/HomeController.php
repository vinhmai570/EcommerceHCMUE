<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Models\Category;

class HomeController extends Controller
{
    private $product_service;

    const NUMBER_OF_ITEM_POPULAR_PRODUCT = 7;
    const MAIN_CATEGORIES = array(
        2 => 'Headphone',
        3 => 'Watch',
        4 => 'Phone',
        5 => 'Game',
        6 => 'Laptop',
        7 => 'Televison'
    );

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }
    public function index()
    {
        $popular_product_represent;
        // $popular_products = $this->product_service->paginate(self::NUMBER_OF_ITEM_POPULAR_PRODUCT);
        $popular_products = $this->product_service->popularProducts(self::MAIN_CATEGORIES,self::NUMBER_OF_ITEM_POPULAR_PRODUCT);
        $main_categories = Category::whereIn('name', array_values(self::MAIN_CATEGORIES))->get();

        return view('frontend.home.index', compact('main_categories', 'popular_products'));
    }
}
