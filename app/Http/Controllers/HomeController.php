<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Order;


class HomeController extends Controller
{
    private $product_service;

    const NUMBER_OF_ITEM_POPULAR_PRODUCT = 7;
    const NUMBER_OF_ITEM_BOTTOM_PRODUCT = 3;

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }

    public function index()
    {
        $popular_product_represent;
        $popular_products = $this->product_service->popularProducts(Product::MAIN_CATEGORIES,self::NUMBER_OF_ITEM_POPULAR_PRODUCT);
        $main_categories = Category::whereIn('name', array_values(Product::MAIN_CATEGORIES))->get();
        $banners = Banner::where('status', 1)->get();

        $bottom_products_featured = $this->product_service->featuredProducts(self::NUMBER_OF_ITEM_BOTTOM_PRODUCT);
        $bottom_products_best_seller = $this->product_service->bestSellerProducts(self::NUMBER_OF_ITEM_BOTTOM_PRODUCT);
        $bottom_products_newest = $this->product_service->newestProducts(self::NUMBER_OF_ITEM_BOTTOM_PRODUCT);

        return view('frontend.home.index', compact('main_categories', 'popular_products','banners', 'bottom_products_featured', 'bottom_products_best_seller', 'bottom_products_newest'));
    }
}
